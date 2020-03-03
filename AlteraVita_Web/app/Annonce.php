<?php

namespace App;

/**
 * @property int $id_annonce
 * @property int $id_produit
 * @property int $id_utilisateur
 * @property string $date
 * @property string $description
 * @property string $type_annonce
 * @property float $prix
 * @property Produit $produit
 * @property User $utilisateur
 */
class Annonce extends BaseModel
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_annonce';

    /**
     * @var array
     */
    protected $fillable = ['id_produit', 'id_utilisateur', 'date', 'description', 'type_annonce', 'prix'];

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
        return $this->belongsTo('App\User', 'id_utilisateur', 'id_utilisateur');
    }
}
