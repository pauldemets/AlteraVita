<?php

namespace App;

/**
 * @property int $id_achat
 * @property int $id_produit
 * @property int $id_utilisateur
 * @property string $libelle
 * @property string $date
 * @property float $prix
 * @property Produit $produit
 * @property Utilisateur $utilisateur
 */
class Achat extends BaseModel
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_achat';

    /**
     * @var array
     */
    protected $fillable = ['id_produit', 'id_utilisateur', 'libelle', 'date', 'prix'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\Produit', 'id_produit', 'id_produit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur', 'id_utilisateur', 'id_utilisateur');
    }
}
