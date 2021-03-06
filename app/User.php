<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;



class User extends Authenticatable
{
    use HasRoles;
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

//    protected function consignataire()
//    {
//        return $this->hasMany('App/consignataire');
//
//    }
//
//    protected function transitaire()
//    {
//        return $this->hasMany('App/transitaire');
//
//    }
    protected function formulaire()
    {
        return $this->hasOne('App/formualaire');

    }
    protected function utilisateur_exterieur()
    {
        return $this->hasOne('App\Utilisateur_exterieur');
    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.User.'.$this->id;
    }

}
