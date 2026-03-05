<?php

namespace App\Http\Controllers;

use App\Mail\AbstractAcceptedMsg;
use App\Mail\AbstractRejectedMsg;
use App\Mail\AbstractSubmittedAdmin;
use App\Models\Abstractdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AbstractSubmittedUser;
use App\Mail\GuestInvitation;
use App\Models\User;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use PhpOffice\PhpWord\TemplateProcessor;

class AbstractdataController extends Controller
{
    
    /**
     * Liste tous les abstracts
     */
    public function index()
    {
        $abstracts = Abstractdata::orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $abstracts
        ]);
    }

    /**
     * Créer un nouveau abstract
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'required|email|unique:abstractdatas,email',
            'phone'          => 'nullable|string|max:255',
            'type'           => 'nullable|string|max:255',

            // affiliation unique par abstract
            'affiliation'    => 'nullable|string|max:255',
            'session'        => 'nullable|string|max:255',
            'type_presentation'           => 'nullable|string|max:255',

            // authors : tableau de ['fullname' => ..., 'affiliation' => ...]
            'authors'        => 'nullable|array',
            'authors.*.fullname'    => 'required|string|max:255',
            'authors.*.affiliation' => 'nullable|string|max:255',

            'title_resume'   => 'required|string|max:255',
            'content_resume' => 'required|string',
            'status'         => 'nullable|string|in:pending,approved,rejected',
            'ispaid'         => 'nullable|string|in:pending,paid',
            'isinvite'       => 'nullable|string|in:nosent,sent',
        ]);

        // Valeurs par défaut
        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['ispaid'] = $validated['ispaid'] ?? 'pending';
        $validated['isinvite'] = $validated['isinvite'] ?? 'nosent';


        $abstract = Abstractdata::create($validated);

        Mail::to($abstract->email)->send(new AbstractSubmittedUser($abstract));

        $users = User::where('role','admin')->get();
        foreach ($users as $admin) {
            Mail::to($admin->email)->send(new AbstractSubmittedAdmin($abstract, $admin));
        }

        return response()->json([
            'success' => true,
            'message' => 'Abstract créé avec succès',
            'data' => $abstract
        ], 200);
    }

    /**
     * Afficher un abstract spécifique
     */
    public function show($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $abstract
        ]);
    }

    /**
     * Mettre à jour un abstract
     */
    public function update(Request $request, $id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'nom'            => 'sometimes|required|string|max:255',
            'prenom'         => 'sometimes|required|string|max:255',
            'email'          => 'sometimes|required|email|unique:abstractdatas,email,' . $id,
            'phone'          => 'nullable|string|max:255',
            'type'           => 'nullable|string|max:255',
            'affiliation'    => 'nullable|string|max:255',
            'session'        => 'nullable|string|max:255',
            'type_presentation'           => 'nullable|string|max:255',
            'authors'        => 'nullable|array',
            'authors.*.fullname'    => 'required|string|max:255',
            'authors.*.affiliation' => 'nullable|string|max:255',
            'title_resume'   => 'sometimes|required|string|max:255',
            'content_resume' => 'sometimes|required|string',
            'status'         => 'nullable|string|in:pending,approved,rejected',
            'ispaid'         => 'nullable|string|in:pending,paid',
            'isinvite'       => 'nullable|string|in:nosent,sent',
        ]);

        if (!empty($validated['authors'])) {
            $validated['authors'] = json_encode($validated['authors']);
        }

        $abstract->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Abstract mis à jour avec succès',
            'data' => $abstract
        ], 200);
    }

     /**
     * Supprimer un abstract
     */
    public function destroy($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        $abstract->delete();

        return response()->json([
            'success' => true,
            'message' => 'Abstract supprimé avec succès'
        ], 200);
    }

    /**
     * Filtrer par statut
     */
    public function byStatus($status)
    {
        $abstracts = Abstractdata::where('status', $status)->get();

        return response()->json([
            'success' => true,
            'data' => $abstracts
        ]);
    }

    /**
     * Accepter un abstract
     */
    public function accept($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        $abstract->update(['status' => 'approved']);

        Mail::to($abstract->email)->send(new AbstractAcceptedMsg($abstract));

        return response()->json([
            'success' => true,
            'message' => 'Abstract approuvé',
            'data' => $abstract
        ]);
    }

    /**
     * Rejeter un abstract
     */
    public function reject($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        $abstract->update(['status' => 'rejected']);

        Mail::to($abstract->email)->send(new AbstractRejectedMsg($abstract));

        return response()->json([
            'success' => true,
            'message' => 'Abstract rejeté',
            'data' => $abstract
        ]);
    }

    /**
     * Marquer comme payé
     */
    public function markAsPaid($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        $abstract->update(['ispaid' => 'paid']);

        return response()->json([
            'success' => true,
            'message' => 'Paiement confirmé',
            'data' => $abstract
        ]);
    }

    /**
     * Marquer comme invité
     */
    public function markAsInvited($id)
    {
        $abstract = Abstractdata::find($id);

        if (!$abstract) {
            return response()->json([
                'success' => false,
                'message' => 'Abstract non trouvé'
            ], 404);
        }

        /* =========================
        1️⃣ GÉNÉRER LE WORD
        ========================= */

        $templatePath = storage_path('app/templates/invitation.docx');
        $tmpDir = storage_path('app/tmp');
        $wordPath = storage_path("app/tmp/invitation_{$abstract->id}.docx");

        if (!is_dir($tmpDir)) {
            mkdir($tmpDir, 0755, true);
        }

        if (!file_exists($templatePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Template Word introuvable'
            ], 500);
        }

        $template = new TemplateProcessor($templatePath);
        $template->setValue('prenom', $abstract->prenom);
        $template->setValue('nom', $abstract->nom);
        $template->saveAs($wordPath);

        /* =========================
        2️⃣ CONVERTIR WORD → PDF
        ========================= */

        $outputDir = storage_path('app/tmp');

        exec(
            "libreoffice --headless --convert-to pdf --outdir {$outputDir} {$wordPath}"
        );

        $pdfPath = str_replace('.docx', '.pdf', $wordPath);

        if (!file_exists($pdfPath)) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la génération du PDF'
            ], 500);
        }

        /* =========================
        3️⃣ ENVOYER L’EMAIL
        ========================= */

        Mail::to($abstract->email)->send(new GuestInvitation($abstract, $pdfPath));

        /* =========================
        4️⃣ METTRE À JOUR LE STATUT
        ========================= */

        $abstract->update(['isinvite' => 'sent']);

        /* =========================
        5️⃣ NETTOYAGE (OPTIONNEL)
        ========================= */

        @unlink($wordPath);
        @unlink($pdfPath);

        return response()->json([
            'success' => true,
            'message' => 'Invitation envoyée',
            'data' => $abstract
        ]);
    }

    public function verifier(Request $request){
        FedaPay::setApiKey(config('services.fedapay.secret_key'));
        FedaPay::setEnvironment(config('services.fedapay.env')); // ou 'live'

        $transaction = Transaction::retrieve($request->transaction_id);

        if ($transaction->status === 'approved') {
            return response()->json([
                'status' => 'approved'
            ]);
        }

        return response()->json([
            'status' => 'failed'
        ], 400);
    }

}
