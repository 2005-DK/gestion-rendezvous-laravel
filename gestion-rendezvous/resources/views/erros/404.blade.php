{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page non trouvée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 80px;
            background-color: #f5f5f5;
        }
        h1 {
            font-size: 48px;
            color: #d9534f;
        }
        p {
            font-size: 18px;
        }
        a {
            margin-top: 20px;
            display: inline-block;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>404 - Page non trouvée</h1>
    <p>La page que vous cherchez n'existe pas ou a été déplacée.</p>
    <a href="{{ url('/') }}">← Retour à l'accueil</a>
</body>
</html>
