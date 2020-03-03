<?php

namespace App;

/**
 * @property int $id_produit
 * @property int $id_type
 * @property string $nom
 * @property string $description
 * @property string $etat
 * @property string $marque
 * @property string $annee
 * @property Type $type
 * @property Achat[] $achats
 * @property Annonce[] $annonces
 * @property Photo[] $photos
 * @property Reparation[] $reparations
 */
class Produit extends BaseModel
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_produit';

    /**
     * @var array
     */
    protected $fillable = ['id_type', 'nom', 'description', 'etat', 'marque', 'annee'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Type', 'id_type', 'id_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achats()
    {
        return $this->hasMany('App\Achat', 'id_produit', 'id_produit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function annonces()
    {
        return $this->hasMany('App\Annonce', 'id_produit', 'id_produit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo', 'id_produit', 'id_produit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparations()
    {
        return $this->hasMany('App\Reparation', 'id_produit', 'id_produit');
    }
}
