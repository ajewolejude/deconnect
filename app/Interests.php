<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    //Table Name
    protected $table = 'interests';

    //Primary Key
    public $primaryKey = 'id';

    //interest_name
    public $interestName = 'interest_name';

    //Timestamps
    public $timestamps= true;

    protected $fillable = ['interest_name'];
}
