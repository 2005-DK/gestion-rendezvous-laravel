<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
