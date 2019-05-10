<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //Table Name
    protected $table = 'interest';

    //Primary Key
    public $primaryKey = 'id';

    //interest_name
    public $interestName = 'interest_name';

    //user_id
    public  $users = 'users_id';

    //Timestamps
    public $timestamps= true;

    protected $fillable = ['interest_name', 'users_id'];


}
