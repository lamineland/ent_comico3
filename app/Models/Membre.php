<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'telephone',
        'cite',
        'etat',
        'fonction',
        'numero_villa',
        'detail_logement',
        'date_amenagement',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class);
    }
}
