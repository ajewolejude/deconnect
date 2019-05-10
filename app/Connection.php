<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    //Table Name
    protected $table = 'connection';

    //Primary Key
    public $primaryKey = 'id';

    //user 1
    public $userId1 = 'user_id_1';

    //user 2
    public $userId2 = 'user_id_2';

    //Timestamps
    public $timestamps= true;

    protected $fillable = ['user_id_1', 'user_id_2'];
}
