<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotisation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'moyen_paiement',
        'created_by',
        'updated_by',
        'deleted_by',
        'membre_id',
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
