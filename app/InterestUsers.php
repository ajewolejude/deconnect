<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestUsers extends Model
{
    //Table Name
    protected $table = 'interestusers';

    //Primary Key
    public $primaryKey = 'id';

    //user_id
    public  $usersId = 'user_id';

    //interest_name
    public $interestId = 'interest_id';



    //Timestamps
    public $timestamps= true;

    protected $fillable = ['user_id', 'interest_id'];
}
