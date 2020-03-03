<?php

namespace App;

/**
 * @property int $id_photo
 * @property int $id_produit
 * @property string $url
 * @property Produit $produit
 */
class Photo extends BaseModel
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_photo';

    /**
     * @var array
     */
    protected $fillable = ['id_produit', 'url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\Produit', 'id_produit', 'id_produit');
    }
}
