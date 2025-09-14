<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Notification importante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fafc;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            font-size: 16px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>Bonjour {{ $name }},</h1>
    <p>Nous vous informons que votre rendez-vous a bien été enregistré.</p>
    <p>Date : {{ $date }}</p>
    <p>Heure : {{ $time }}</p>

    <div class="footer">
        <p>Étude notariale - Tous droits réservés © {{ date('Y') }}</p>
    </div>
</body>
</html>
