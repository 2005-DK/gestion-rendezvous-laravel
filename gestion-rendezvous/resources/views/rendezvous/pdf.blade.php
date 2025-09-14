<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .title { text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .item { margin: 10px 0; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="title">Détail du rendez-vous</div>

    <div class="item"><span class="label">Nom complet :</span> {{ $rendezvous->fullname }}</div>
    <div class="item"><span class="label">Téléphone :</span> {{ $rendezvous->phone }}</div>
    <div class="item"><span class="label">Ville :</span> {{ $rendezvous->ville }}</div>
    <div class="item"><span class="label">Date :</span> {{ $rendezvous->date }}</div>
    <div class="item"><span class="label">Type d'acte :</span> {{ $rendezvous->type_acte }}</div>
    <div class="item"><span class="label">Statut :</span> {{ ucfirst($rendezvous->status) }}</div>
    <div class="item"><span class="label">Créé le :</span> {{ $rendezvous->created_at->format('d/m/Y H:i') }}</div>
</body>
</html>
