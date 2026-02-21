<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nouveau Abstract soumis</title>
</head>
<body style="background-color: #f4f4f4; font-family:'Fira Sans', Arial, sans-serif;">
    <table align="center" width="600" style="background-color:#ffffff; padding: 40px;">
        <tr>
            <td style="text-align:center; padding-bottom:30px; padding-top:30px; background-color:#054072;">
                <img src="https://cloudfilesdm.com/postcards/Logo_5-fe9039d6.png" alt="Logo" width="192" style="display:block; margin:0 auto;" />
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:20px; color:#5aa236; font-weight:600; margin-top:20px; font-size:14px;">New abstract submission</td>
        </tr>
        <tr>
            <td style="font-size:24px; font-weight:700; color:#151515; padding-bottom:20px;">
                Bonjour {{ $admin->fullname }},
            </td>
        </tr>
        <tr>
            <td style="font-size:18px; line-height:28px; color:#4b4b4b; padding-bottom:15px;">
                A new abstract has been submitted by <strong>{{ $abstract->nom }} {{ $abstract->prenom }}</strong>.
            </td>
        </tr>
        <tr>
            <td style="font-size:16px; line-height:24px; color:#4b4b4b; padding-bottom:15px;">
                <strong>Email :</strong> {{ $abstract->email }}<br>
                <strong>Phone :</strong> {{ $abstract->phone ?? 'N/A' }}<br>
                <strong>Affiliation :</strong> {{ $abstract->affiliation ?? 'N/A' }}<br>
                <strong>Title :</strong> {{ $abstract->title_resume }}<br>
                <strong>Summary :</strong> {{ $abstract->content_resume }}
            </td>
        </tr>
        <tr>
            <td style="font-size:18px; line-height:28px; color:#4b4b4b; padding-bottom:15px;">
                Thank you for reviewing and validating this abstract in your dashboard.
            </td>
        </tr>
        <tr>
            <td style="font-size:16px; line-height:24px; color:#4b4b4b; padding-bottom:15px;">
                <em>This message was sent automatically. Please do not reply.</em>
            </td>
        </tr>
        <tr>
            <td style="font-size:18px; line-height:28px; color:#4b4b4b;">
                Best regards,<br>OneBioAfrica
            </td>
        </tr>
    </table>
</body>
</html>