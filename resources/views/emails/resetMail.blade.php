<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Code</title>
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

        .email-header {
            background-color: #0b3c6f;
            padding: 20px 30px;
        }

        .email-header img {
            height: 100px;
        }

        .email-content {
            padding: 35px 40px;
            color: #1f2937;
            font-size: 15px;
            line-height: 1.7;
        }

        .email-title {
            color: #2563eb;
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

        .code-box {
            background-color: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 18px;
            margin: 25px 0;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 4px;
            color: #1e40af;
        }

        .email-note {
            margin-top: 30px;
            font-size: 13px;
            color: #6b7280;
        }

        .email-signature {
            margin-top: 25px;
            font-weight: bold;
        }

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
                        <img src="https://cloudfilesdm.com/postcards/LogoW-cb3888b3.png" alt="OneBioAfrica">
                    </td>
                </tr>

                <!-- CONTENT -->
                <tr>
                    <td class="email-content">

                        <div class="email-title">
                            Password Reset Request
                        </div>

                        <h2>Hello {{ $user->fullname }},</h2>

                        <p>
                            We received a request to reset your account password.
                            Please use the verification code below to proceed with the password change.
                        </p>

                        <div class="code-box">
                            {{ $code }}
                        </div>

                        <p>
                            This code is valid for a limited time.
                            If you did not request a password reset, please ignore this email.
                        </p>

                        <p class="email-note">
                            This email was sent automatically. Please do not reply to this message.
                        </p>

                        <p class="email-signature">
                            Best regards,<br>
                            OneBioAfrica
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>