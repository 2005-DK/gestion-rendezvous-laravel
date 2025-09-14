<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Rendezvous extends Model
{
    use HasFactory;

    protected $table = 'rendezvous';

    protected $fillable = [
        'fullname', 
        'email',
        'phone', 
        'ville', 
        'date', 
        'heure',
        'type_acte',
        'urgence',
        'notaire_id',
        'statut',
        'notes'
    ];

    protected $dates = ['date'];
    
    protected $casts = [
        'urgence' => 'boolean',
        'date' => 'date:Y-m-d',
    ];
    
    // Constantes pour les statuts
    const STATUT_EN_ATTENTE = 'en_attente';
    const STATUT_CONFIRME = 'confirmé';
    const STATUT_ANNULE = 'annulé';
    const STATUT_REPORTE = 'reporté';
    
    // Relation avec le notaire assigné
    public function notaire()
    {
        return $this->belongsTo(User::class, 'notaire_id');
    }
    
    // Relation avec le modèle Acte
    public function acte()
    {
        return $this->hasOne(\App\Models\Acte::class);
    }
    
    // Scope pour les rendez-vous à venir
    public function scopeProchains($query, $days = 7)
    {
        return $query->where('date', '>=', now()->toDateString())
                    ->where('date', '<=', now()->addDays($days)->toDateString())
                    ->orderBy('date')
                    ->orderBy('heure');
    }
    
    // Vérifier si le rendez-vous est pour aujourd'hui
    public function isToday()
    {
        return $this->date->isToday();
    }
    
    // Formater la date et l'heure pour l'affichage
    public function getFormattedDateTimeAttribute()
    {
        return $this->date->format('d/m/Y') . ' à ' . $this->heure;
    }
    
    // Vérifier si le rendez-vous est en retard
    public function isLate()
    {
        $now = now();
        $rdvDateTime = Carbon::parse($this->date->format('Y-m-d') . ' ' . $this->heure);
        
        return $now->gt($rdvDateTime) && $this->statut === self::STATUT_CONFIRME;
    }
}

class Acte extends Model
{
    use HasFactory;

    protected $fillable = [
        'rendezvous_id',
        'type',
        'contenu',
    ];

    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class);
    }
}