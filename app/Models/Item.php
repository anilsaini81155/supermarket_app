<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = "item";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

}