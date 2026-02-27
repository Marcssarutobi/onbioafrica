<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Conference Badge</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --et-blue: #062d63;
        --et-blue-dark: #001B52;
        --et-blue-light: #0B3998;
        --et-pink: #F929BB;
        --et-purple: #550ECA;
        --et-gray: #707882;
        --et-gray-light: #8E8E93;
        --white: #ffffff;
        --cream: #faf9f7;
        --gold: #C9A227;
        --success: #10B981;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #fff;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    /* Badge Container with 3D effect */
    .badge-container {
        perspective: 1000px;
    }

    .badge-wrapper {
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.6s ease;
    }

    .badge-wrapper:hover {
        transform: rotateY(5deg) rotateX(5deg);
    }

    /* Main Badge */
    .badge {
        width: 340px;
        height: 520px;
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 
            0 25px 50px -12px rgba(0, 0, 0, 0.25),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    /* Decorative top stripe */
    .badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--et-blue) 0%, var(--et-purple) 50%, var(--et-pink) 100%);
        z-index: 10;
    }

    /* HEADER */
    .badge-header {
        background: linear-gradient(135deg, var(--et-blue) 0%, var(--et-blue-dark) 100%);
        padding: 30px 25px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    /* Subtle pattern overlay */
    .badge-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(255,255,255,0.03) 0%, transparent 50%);
        pointer-events: none;
    }

    .logo-container {
        position: relative;
        z-index: 1;
    }

    .badge-header img {
        height: 60px;
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
    }

    .event-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        padding: 6px 14px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(4px);
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        color: var(--white);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .event-tag::before {
        content: '';
        width: 6px;
        height: 6px;
        background: var(--success);
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    /* BODY */
    .badge-body {
        flex: 1;
        padding: 35px 28px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        gap: 0;
        position: relative;
    }

    /* Attendee Type Badge */
    .attendee-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin: 0 auto 20px;
        padding: 8px 16px;
        background: linear-gradient(135deg, #F2F6FE 0%, #E7EFFF 100%);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: var(--et-blue);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .attendee-type i {
        font-size: 14px;
    }

    /* Name Section */
    .name-section {
        margin-bottom: 20px;
    }

    .badge-name {
        font-size: 26px;
        font-weight: 800;
        color: var(--et-blue-dark);
        text-transform: uppercase;
        letter-spacing: -0.5px;
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .badge-name-sub {
        font-size: 14px;
        color: var(--et-gray);
        font-weight: 500;
    }

    /* Role Badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 0 auto 24px;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--et-blue) 0%, var(--et-purple) 100%);
        border-radius: 25px;
        color: var(--white);
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(6, 45, 99, 0.3);
    }

    .role-badge i {
        font-size: 14px;
    }

    /* Divider with icon */
    .badge-divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0 auto 24px;
        width: 100%;
    }

    .badge-divider::before,
    .badge-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, transparent, #E5E7EB, transparent);
    }

    .divider-icon {
        width: 32px;
        height: 32px;
        background: var(--cream);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--et-blue);
        font-size: 14px;
        border: 1px solid #E5E7EB;
    }

    /* Institution Info */
    .institution-section {
        margin-bottom: 20px;
    }

    .badge-institution {
        font-size: 16px;
        font-weight: 600;
        color: var(--et-black);
        margin-bottom: 4px;
    }

    .badge-country {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: var(--et-gray);
        font-weight: 500;
    }

    .badge-country::before {
        content: '📍';
        font-size: 12px;
    }

    /* QR CODE AREA */
    .qr-section {
        margin-top: auto;
        padding-top: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .qr-info {
        text-align: left;
        flex: 1;
    }

    .qr-label {
        font-size: 11px;
        font-weight: 600;
        color: var(--et-gray-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .qr-id {
        font-size: 13px;
        font-weight: 700;
        color: var(--et-blue);
        font-family: 'Courier New', monospace;
    }

    .badge-qr {
        width: 90px;
        height: 90px;
        background: var(--white);
        border: 2px solid #E5E7EB;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .badge-qr::before {
        content: '';
        position: absolute;
        inset: 4px;
        background: 
            repeating-linear-gradient(
                0deg,
                #000 0px,
                #000 3px,
                transparent 3px,
                transparent 6px
            ),
            repeating-linear-gradient(
                90deg,
                #000 0px,
                #000 3px,
                transparent 3px,
                transparent 6px
            );
        opacity: 0.1;
    }

    .qr-placeholder {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--et-blue) 0%, var(--et-purple) 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 24px;
        position: relative;
        z-index: 1;
    }

    .qr-scan-hint {
        position: absolute;
        bottom: 4px;
        font-size: 8px;
        color: var(--et-gray-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* FOOTER */
    .badge-footer {
        background: linear-gradient(90deg, var(--et-blue) 0%, var(--et-blue-dark) 100%);
        padding: 16px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .badge-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .footer-content {
        position: relative;
        z-index: 1;
    }

    .badge-footer .event-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--white);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 2px;
    }

    .badge-footer .event-date {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }

    /* Lanyard hole */
    .lanyard-hole {
        position: absolute;
        top: 40px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 12px;
        background: #f4f6f8;
        border-radius: 6px;
        box-shadow: 
            inset 0 2px 4px rgba(0,0,0,0.1),
            0 1px 2px rgba(255,255,255,0.5);
        z-index: 100;
    }

    /* PRINT */
    @media print {
        body { 
            background: white; 
            padding: 0;
        }
        .badge { 
            box-shadow: none; 
            border: 1px solid #ddd;
            page-break-inside: avoid;
        }
        .badge-wrapper:hover {
            transform: none;
        }
    }

    /* Mobile */
    @media (max-width: 400px) {
        .badge {
            width: 300px;
            height: 460px;
        }
        
        .badge-name {
            font-size: 22px;
        }
    }
</style>
</head>

<body>
<div class="badge-container">
    <div class="badge-wrapper">
        <div class="badge">
            <!-- Lanyard Hole -->
            <div class="lanyard-hole"></div>

            <!-- HEADER -->
            <div class="badge-header">
                <div class="logo-container">
                    <img src="https://cloudfilesdm.com/postcards/LogoW-cb3888b3.png" alt="OneBioAfrica Logo">
                </div>
                <div class="event-tag">
                    Verified Attendee
                </div>
            </div>

            <!-- BODY -->
            <div class="badge-body">
                <!-- Attendee Type -->
                <div class="attendee-type">
                    <i class="fa-solid fa-user-graduate"></i>
                    Early Career Researcher
                </div>

                <!-- Name -->
                <div class="name-section">
                    <h2 class="badge-name">John DOE</h2>
                    <p class="badge-name-sub">Dr. / PhD Candidate</p>
                </div>

                <!-- Role -->
                <div class="role-badge">
                    <i class="fa-solid fa-microphone-lines"></i>
                    Oral Presenter
                </div>

                <!-- Divider -->
                <div class="badge-divider">
                    <div class="divider-icon">
                        <i class="fa-solid fa-dna"></i>
                    </div>
                </div>

                <!-- Institution -->
                <div class="institution-section">
                    <p class="badge-institution">University of Abomey-Calavi</p>
                    <p class="badge-country">Cotonou, Benin</p>
                </div>

                <!-- QR Section -->
                <div class="qr-section">
                    <div class="qr-info">
                        <div class="qr-label">Registration ID</div>
                        <div class="qr-id">OBA-2026-0042</div>
                    </div>
                    <div class="badge-qr">
                        <div class="qr-placeholder">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <span class="qr-scan-hint">Scan Me</span>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="badge-footer">
                <div class="footer-content">
                    <div class="event-name">OneBioAfrica Symposium</div>
                    <div class="event-date">March 15-18, 2026 • Cotonou, Benin</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>