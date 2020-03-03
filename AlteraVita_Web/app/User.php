<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $adresse1
 * @property string $adresse2
 * @property string $description
 * @property string $cp
 * @property string $ville
 * @property string $mail
 * @property string $email_verified_ad
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Achat[] $achats
 * @property Annonce[] $annonces
 * @property Reparation[] $reparations
 */
class User extends Authenticatable
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_utilisateur';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'adresse1', 'adresse2', 'cp', 'ville', 'email', 'password','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achats()
    {
        return $this->hasMany('App\Achat', 'id_utilisateur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function annonces()
    {
        return $this->hasMany('App\Annonce', 'id_utilisateur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparations()
    {
        return $this->hasMany('App\Reparation', 'id_utilisateur');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
