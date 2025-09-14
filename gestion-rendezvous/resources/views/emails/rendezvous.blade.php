@component('mail::message')
# Bonjour {{ $rendezvous->fullname }},

Votre rendez-vous a bien été **{{ $rendezvous->status == 'validé' ? 'validé' : 'enregistré' }}**.

## 📄 Détails :
- **Date :** {{ $rendezvous->date }}
- **Ville :** {{ $rendezvous->ville }}
- **Type d’acte :** {{ $rendezvous->type_acte }}
- **Téléphone :** {{ $rendezvous->phone }}

Nous vous remercions pour votre confiance.

À très bientôt,  
**L’étude notariale**
@endcomponent
