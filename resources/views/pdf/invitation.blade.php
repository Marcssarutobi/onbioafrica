<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <style>
        @page {
            size: A4;
            margin: 20mm 20mm;
        }

        body {
            font-family: DejaVu Sans, serif;
            font-size: 11pt;
            line-height: 1.7;
            color: #2c3e50;
        }

        h1, h2, h3 {
            color: #1e3a5f;
        }

        .header {
            border-bottom: 3px solid #1e3a5f;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .doc-type {
            background: #1e3a5f;
            color: #ffffff;
            padding: 8px 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
            display: inline-block;
        }

        .recipient {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .subject {
            font-style: italic;
            margin-bottom: 20px;
            font-size: 12pt;
        }

        .event-details {
            background: #f4f6f8;
            border-left: 4px solid #1e3a5f;
            padding: 12px 15px;
            margin: 20px 0;
            font-size: 10.5pt;
        }

        .signature {
            margin-top: 50px;
        }

        .footer {
            margin-top: 50px;
            font-size: 9pt;
            color: #777;
            text-align: center;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <table width="100%">
        <tr>
            <td width="60%">
                <table>
                    <tr>
                        <td width="90">
                            <img src="{{public_path('admin/assets/images/logos/logoA.png')}}" width="80">
                        </td>
                        <td>
                            <strong>ONEBIOAFRICA 2026</strong><br>
                            <span style="font-size:10pt;">
                                Regional Symposium on Molecular Biology and Bioinformatics in Africa
                            </span>
                        </td>
                    </tr>
                </table>
            </td>

            <td width="40%" align="right" style="font-size:10pt;">
                Cotonou, Bénin<br>
                Le 5 mars 2026
            </td>
        </tr>
    </table>
</div>

<!-- TYPE -->
<div class="doc-type">
    Lettre d'invitation officielle
</div>

<!-- CONTENT -->
<div class="recipient">
    À l'attention de : {{ $guest->prenom }} {{ $guest->nom }}
</div>

<div class="subject">
    Objet : Invitation à participer au Symposium OneBioAfrica 2026
</div>

<p>Madame, Monsieur,</p>

<p>
    Au nom du Comité d'Organisation, j'ai l'honneur de vous inviter officiellement
    à participer au <strong>OneBioAfrica 2026</strong>, symposium régional intitulé :
    <em>
        « Regional Symposium to Strengthen One Health Networks through Molecular
        Data Sharing and Bioinformatics in Africa »
    </em>.
</p>

<div class="event-details">
    <strong>Détails de l'événement :</strong><br>
    Dates : 13 au 16 juillet 2026<br>
    Lieu : Chant d’Oiseau, Cotonou, Bénin<br>
    Thème : One Health, Bioinformatique et Biologie Moléculaire
</div>

<p>
    Ce symposium régional, soutenu par la Society for Molecular Biology and Evolution (SMBE),
    vise à renforcer les capacités en biologie moléculaire et bioinformatique en Afrique,
    favoriser les collaborations interdisciplinaires et promouvoir le cadre One Health.
</p>

<p>
    L’événement réunira des scientifiques de renom, des chercheurs en début de carrière,
    des décideurs politiques et des praticiens travaillant à l’interface de la biologie
    moléculaire, la bioinformatique, la science évolutive, la conservation de la biodiversité
    et la santé mondiale.
</p>

<p>
    <strong>Visa et voyage :</strong> Cette lettre est délivrée à votre demande pour faciliter
    votre demande de visa et vos arrangements de voyage.  
    Plus d'informations : <strong>https://evisa.bj</strong>
</p>

<p>
    <strong>Financement :</strong> Les participants sont responsables de leurs frais de voyage
    et d’hébergement, sauf indication contraire des organisateurs.
</p>

<p>
    Dans l'attente de vous accueillir à OneBioAfrica 2026, veuillez agréer,
    Madame, Monsieur, l’expression de nos salutations distinguées.
</p>

<!-- SIGNATURE -->
<div class="signature">
    <table width="100%">
        <tr>
            <td width="70%">
                <strong>Dr Boris Armel Olou</strong><br>
                CEO, Fungi For Nature<br>
                Président du Symposium<br>
                Au nom du Comité d’Organisation OneBioAfrica 2026
            </td>
            
        </tr>
    </table>
</div>

<!-- FOOTER 
<div class="footer">
    OneBioAfrica 2026 – Symposium International  
    |  Ref: OBA-2026-{{ str_pad($guest->id, 4, '0', STR_PAD_LEFT) }}
</div>-->

</body>
</html>