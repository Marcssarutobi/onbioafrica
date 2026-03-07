<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstracts Approuvés - ONEBIOAFRICA 2026</title>
    <style>
        @page {
            size: A4;
            margin-top: 20mm;
            margin-bottom: 20mm;
            margin-left: 20mm;
            margin-right: 20mm;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        /* ── HEADER ── */
        .header {
            border-bottom: 3px solid #1e3a5f;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header table {
            width: 100%;
        }

        /* ── TITRE DOCUMENT ── */
        .document-title {
            text-align: center;
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f0f4f8;
            border-left: 5px solid #1e3a5f;
            border-radius: 3px;
        }

        .document-title h1 {
            font-size: 16pt;
            margin-bottom: 5px;
            color: #1e3a5f;
        }

        .document-title p {
            font-size: 10pt;
            color: #666;
        }

        /* ── SESSION ── */
        .session-block {
            margin-bottom: 30px;
        }

        .session-title {
            background-color: #1e3a5f;
            color: #ffffff !important;
            padding: 8px 12px;
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 15px;
            border-radius: 3px;
        }

        /* ── ABSTRACT CARD ── */
        .abstract-card {
            border: 1px solid #d0dbe8;
            border-radius: 5px;
            padding: 15px 18px;
            margin-bottom: 18px;
            page-break-inside: avoid;
            background-color: #fafcff;
        }

        .abstract-card:last-child {
            margin-bottom: 0;
        }

        /* Numéro d'abstract */
        .abstract-number {
            display: inline-block;
            background-color: #1e3a5f;
            color: #fff;
            font-size: 9pt;
            padding: 2px 8px;
            border-radius: 10px;
            margin-bottom: 8px;
        }

        /* Titre */
        .abstract-title {
            font-size: 12pt;
            font-weight: bold;
            color: #1e3a5f;
            margin-bottom: 6px;
            line-height: 1.4;
        }

        /* Auteur */
        .abstract-author {
            font-size: 10pt;
            color: #555;
            margin-bottom: 10px;
        }

        .abstract-author span {
            font-weight: bold;
            color: #2c3e50;
        }

        /* Badge type présentation */
        .badge {
            display: inline-block;
            font-size: 8.5pt;
            padding: 2px 9px;
            border-radius: 10px;
            margin-left: 8px;
            font-weight: bold;
        }

        .badge-oral {
            background-color: #e8f4fd;
            color: #1a6fa8;
            border: 1px solid #aad4f0;
        }

        .badge-poster {
            background-color: #eaf7ea;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }

        /* Séparateur auteur / résumé */
        .divider {
            border: none;
            border-top: 1px dashed #c8d8e8;
            margin: 10px 0;
        }

        /* Texte résumé */
        .abstract-content {
            font-size: 10.5pt;
            color: #34495e;
            line-height: 1.8;
            text-align: justify;
        }

        /* ── FOOTER ── */
        .footer {
            border-top: 2px solid #1e3a5f;
            margin-top: 40px;
            padding-top: 10px;
            font-size: 9pt;
            color: #777;
            text-align: center;
        }

        /* ── PAGE BREAK ── */
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    {{-- ════ EN-TÊTE ════ --}}
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

    {{-- ════ TITRE DU DOCUMENT ════ --}}
    <div class="document-title">
        <h1>Recueil des Abstracts Approuvés</h1>
        <p>{{ $totalCount }} abstract(s) approuvé(s) &mdash; Généré le {{ $generatedAt }}</p>
    </div>

    {{-- ════ ABSTRACTS PAR SESSION ════ --}}
    @php $globalIndex = 1; @endphp

    @foreach ($abstractsBySession as $session => $abstracts)
        <div class="session-block">

            <div class="session-title">
                Session : {{ $session }} &nbsp;({{ $abstracts->count() }} abstract(s))
            </div>

            @foreach ($abstracts as $abstract)
                <div class="abstract-card">

                    {{-- Numéro --}}
                    <span class="abstract-number">#{{ str_pad($globalIndex, 3, '0', STR_PAD_LEFT) }}</span>

                    {{-- Titre du résumé --}}
                    <div class="abstract-title">
                        {{ $abstract->title_resume }}
                    </div>

                    {{-- Auteur + badge type présentation --}}
                    <div class="abstract-author">
                        <span>{{ strtoupper($abstract->nom) }} {{ ucfirst(strtolower($abstract->prenom)) }}</span>
                        @if($abstract->affiliation)
                            &mdash; {{ $abstract->affiliation }}
                        @endif
                        <span class="badge {{ $abstract->type_presentation === 'Oral' ? 'badge-oral' : 'badge-poster' }}">
                            {{ $abstract->type_presentation }}
                        </span>
                    </div>

                    <hr class="divider">

                    {{-- Contenu du résumé --}}
                    <div class="abstract-content">
                        {{ $abstract->content_resume }}
                    </div>

                </div>

                @php $globalIndex++; @endphp
            @endforeach

        </div>

        {{-- Saut de page entre sessions (sauf la dernière) --}}
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach

    {{-- ════ FOOTER ════ --}}
    <div class="footer">
        ONEBIOAFRICA 2026 &mdash; Cotonou, Bénin &mdash; Document généré automatiquement le {{ $generatedAt }}
    </div>

</body>
</html>