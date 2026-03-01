<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge Participant</title>
    <link rel="stylesheet" href="output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .badge-container {
            perspective: 1000px;
        }

        .badge {
            width: 400px;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 
                        0 0 0 1px rgba(255, 255, 255, 0.1);
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
        }

        .badge:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }

        /* Header avec dégradé */
        .badge-header {
            background: linear-gradient(135deg, var(--color-etPurple, #550ECA) 0%, 
                                       var(--color-etBlue, #384BFF) 50%, 
                                       var(--color-etPink, #F929BB) 100%);
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .badge-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
        }

        .logo-container {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.25);
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .event-logo {
            width: 60px;
            height: auto;
            display: block;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        .event-name {
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 12px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Corps du badge */
        .badge-body {
            padding: 35px 30px 30px;
            position: relative;
        }

        .badge-type {
            position: absolute;
            top: -15px;
            right: 30px;
            background: var(--color-etBlue, #384BFF);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 4px 15px rgba(56, 75, 255, 0.4);
        }

        .participant-name {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 6px;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .participant-firstname {
            font-size: 22px;
            font-weight: 500;
            color: var(--color-etGray, #666);
            margin-bottom: 25px;
        }

        /* Affiliations */
        .affiliations {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 30px;
        }

        .affiliation-tag {
            background: linear-gradient(135deg, #f0f4ff 0%, #e8eeff 100%);
            color: var(--color-etBlue, #384BFF);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid rgba(56, 75, 255, 0.2);
            transition: all 0.2s ease;
        }

        .affiliation-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(56, 75, 255, 0.2);
        }

        /* Section QR et ID - MODIFIÉ POUR UNE SEULE LIGNE */
        .badge-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 25px;
            border-top: 2px dashed #e5e7eb;
            margin-top: 5px;
            gap: 20px;
        }

        .qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
        }

        .qr-code {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 12px;
            padding: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                        0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 2px solid #e5e7eb;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .qr-code::before {
            content: '';
            position: absolute;
            inset: 8px;
            background: 
                repeating-linear-gradient(0deg, #1a1a1a 0px, #1a1a1a 2px, transparent 2px, transparent 4px),
                repeating-linear-gradient(90deg, #1a1a1a 0px, #1a1a1a 2px, transparent 2px, transparent 4px);
            background-size: 4px 4px;
            opacity: 0.85;
            border-radius: 4px;
        }

        .qr-label {
            font-size: 10px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            line-height: 1.4;
        }

        .id-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            flex-grow: 1;
            justify-content: flex-end;
        }

        .id-label {
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-weight: 700;
            white-space: nowrap;
        }

        .id-number {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: 700;
            color: var(--color-etBlack, #1a1a1a);
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            padding: 10px 16px;
            border-radius: 10px;
            letter-spacing: 0.05em;
            border: 2px solid #e5e7eb;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
            white-space: nowrap;
        }

        /* Éléments décoratifs */
        .decoration-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
            pointer-events: none;
        }

        .circle-1 {
            width: 250px;
            height: 250px;
            background: var(--color-etPurple, #550ECA);
            top: -120px;
            right: -120px;
        }

        .circle-2 {
            width: 180px;
            height: 180px;
            background: var(--color-etPink, #F929BB);
            bottom: -90px;
            left: -90px;
        }

        /* Hologramme effect */
        .hologram {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, 
                rgba(255,255,255,0) 0%, 
                rgba(255,255,255,0.5) 50%, 
                rgba(255,255,255,0) 100%);
            border-radius: 50%;
            animation: hologram 2.5s infinite;
            pointer-events: none;
        }

        @keyframes hologram {
            0%, 100% { opacity: 0.2; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.9; transform: scale(1.15) rotate(180deg); }
        }

        /* Version imprimable */
        @media print {
            body {
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .badge {
                box-shadow: none;
                border: 1px solid #ddd;
                break-inside: avoid;
            }
            
            .badge:hover {
                transform: none;
            }

            .hologram,
            .badge-header::before {
                display: none;
            }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .badge {
                width: 100%;
                max-width: 350px;
            }
            
            .event-logo {
                width: 70px;
            }

            .participant-name {
                font-size: 26px;
            }
            
            .participant-firstname {
                font-size: 18px;
            }

            .badge-footer {
                flex-direction: row;
                gap: 15px;
            }

            .qr-section {
                flex-direction: row;
                gap: 10px;
            }

            .qr-code {
                width: 60px;
                height: 60px;
            }

            .id-section {
                flex-direction: column;
                align-items: flex-end;
                gap: 6px;
            }

            .id-number {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        /* Variantes de badge */
        .badge.vip .badge-type {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
        }

        .badge.speaker .badge-type {
            background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.4);
        }

        .badge.organizer .badge-type {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }
    </style>
</head>
<body>

    <div class="badge-container">
        <div class="badge">
            <!-- Éléments décoratifs -->
            <div class="decoration-circle circle-1"></div>
            <div class="decoration-circle circle-2"></div>
            
            <!-- Header -->
            <div class="badge-header">
                <div class="hologram"></div>
                <div class="logo-container">
                    <img src="https://cloudfilesdm.com/postcards/LogoW-cb3888b3.png" 
                         alt="Logo OneBioAfrica" 
                         class="event-logo">
                </div>
                <div class="event-name">Symposium OneBioAfrica 2026</div>
            </div>

            <!-- Corps -->
            <div class="badge-body">
                <span class="badge-type">Participant</span>
                
                <h1 class="participant-name">DUPONT</h1>
                <h2 class="participant-firstname">Jean-Marc</h2>
                
                <!-- Affiliations JSON -->
                <div class="affiliations">
                    <span class="affiliation-tag">Université Paris-Saclay</span>
                    <span class="affiliation-tag">Laboratoire LISN</span>
                    <span class="affiliation-tag">Doctorant</span>
                </div>

                <!-- Footer avec QR et ID sur une ligne -->
                <div class="badge-footer">
                    <div class="qr-section">
                        <div class="qr-code"></div>
                        <span class="qr-label">Scanner pour<br>vérifier</span>
                    </div>
                    
                    <div class="id-section">
                        <div class="id-label">Référence</div>
                        <div class="id-number">OBA-2026-0042</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</body>
</html>