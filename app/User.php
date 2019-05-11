<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //Table Name
    protected $table = 'users';

    //Primary Key
    public $primaryKey = 'id';

    //interest_name
    public $name = 'name';

    public $email = 'email';

    public $twitter = 'twitter';

    public $github = 'github';

    public $linkedin = 'linkedin';

    public $profile_pic = 'profile_pic';

    public $website = 'website';



    //Timestamps
    public $timestamps= true;


    protected $fillable = [
        'name', 'email', 'password','twitter','profile_pic','linkedin','github','website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
}
