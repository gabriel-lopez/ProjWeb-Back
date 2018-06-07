<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    protected $fillable = [
        'type',
        'matiere_id',
        'senior_id'
    ];

    protected $rules = [
        'type' => 'required|in:"urgent","unique","repetitif"',
        'matiere_id' => 'required|exists:matieres,id',
        'soumis_par' => 'required|exists:seniors,id',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function plageHoraire()
    {
        return $this->belongsTo('\App\PlageHoraire', 'plageHoraire_id');
    }

    public function senior()
    {
        return $this->belongsTo('\App\Senior', 'soumis_par');
    }

    public function soumis_par()
    {
        return $this->belongsTo('\App\User', 'soumis_par');
    }

    public function matiere()
    {
        return $this->belongsTo('\App\matiere');
    }

    public function soumissions()
    {
        return $this->hasMany('\App\Soumission');
    }



    public function interventions()
    {
        return $this->belongsToMany('\App\Intervention');
    }
}
