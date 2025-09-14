<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de rendez-vous</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px;">
    <div style="background-color: white; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto;">
        <h2 style="color: #2c3e50;">Bonjour {{ $name }},</h2>

        <p>Nous vous confirmons que votre rendez-vous a bien été pris en compte.</p>

        <ul>
            <li><strong>Date :</strong> {{ $date }}</li>
            <li><strong>Heure :</strong> {{ $time }}</li>
        </ul>

        <p>Nous vous remercions pour votre confiance.</p>

        <p style="margin-top: 30px;">Cordialement,<br>L'équipe notariale</p>
    </div>
</body>
</html>
