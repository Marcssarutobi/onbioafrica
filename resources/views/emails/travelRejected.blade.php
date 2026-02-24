<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Grant Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-wrapper {
            width: 100%;
            padding: 30px 0;
            background-color: #f4f6f8;
        }

        .email-container {
            max-width: 620px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        }

        /* Header */
        .email-header {
            background-color: #0b3c6f;
            padding: 20px 30px;
        }

        .email-header img {
            height: 100px;
        }

        /* Content */
        .email-content {
            padding: 35px 40px;
            color: #1f2937;
            font-size: 15px;
            line-height: 1.7;
        }

        .email-title {
            color: #5bbd2a;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .email-content h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .email-content p {
            margin-bottom: 16px;
        }

        /* Footer note */
        .email-note {
            margin-top: 30px;
            font-size: 13px;
            color: #6b7280;
        }

        .email-signature {
            margin-top: 25px;
            font-weight: bold;
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-content {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<table class="email-wrapper" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">

            <table class="email-container" cellpadding="0" cellspacing="0">
                
                <!-- HEADER -->
                <tr>
                    <td class="email-header">
                        <!-- Remplace le src par ton logo -->
                        <img src="https://cloudfilesdm.com/postcards/LogoW-cb3888b3.png" alt="OneBioAfrica">
                    </td>
                </tr>

                <!-- CONTENT -->
                <tr>
                    <td class="email-content">
                        
                        <div class="email-title">
                            Result of your Travel Grant application
                        </div>

                        <h2>Hi {{ $travelGrant->nom }} {{ $travelGrant->prenom }},</h2>

                        <p>
                            Thank you for your interest in the Travel Grant program and for taking the time to submit your application.
                        </p>

                        <p>
                            After careful consideration by the selection committee, we regret to inform you that your application has not been selected for this edition.
                        </p>

                        <p>
                            The selection process was particularly competitive and was based on several criteria, including the scientific quality of the applications, financial needs, and regional representation.
                            We strongly encourage you to continue your work and apply again in future calls for applications.
                        </p>

                        <p>
                            We thank you again for your interest and wish you every success in your future academic and professional endeavors.
                        </p>

                        <p class="email-note">
                            This email was sent automatically. Please do not reply to this message.
                        </p>

                        <p class="email-signature">
                            Best regards,<br>
                            OneBioAfrica.
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>