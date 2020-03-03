<?php

namespace App;

/**
 * @property int $id_reparation
 * @property int $id_utilisateur
 * @property int $id_produit
 * @property boolean $estvalidee
 * @property float $prix
 * @property string $date
 * @property Produit $produit
 * @property User $utilisateur
 */
class Reparation extends BaseModel
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_reparation';

    /**
     * @var array
     */
    protected $fillable = ['id_utilisateur', 'id_produit', 'estvalidee', 'prix', 'date'];

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
