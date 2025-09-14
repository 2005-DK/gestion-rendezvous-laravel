<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rendez-vous Notarial</title>
</head>
<body>
    <h2>Bonjour {{ $client['nom'] }} {{ $client['prenom'] }},</h2>
    <p>Votre rendez-vous avec Me Tcha Plinga EBEZOU a bien été enregistré.</p>

    <p><strong>Date :</strong> {{ $client['date'] }}</p>
    <p><strong>Heure :</strong> {{ $client['heure'] }}</p>
    <p><strong>Objet :</strong> {{ $client['objet'] }}</p>

    <p>Lieu : Étude Notariale - Lomé, Togo</p>
    <p>Merci pour votre confiance.</p>
    <br>
    <p>--</p>
    <p><em>Étude de Me Tcha Plinga EBEZOU</em></p>
</body>
</html>
