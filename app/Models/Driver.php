<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model {

    public $timestamps  = false;
    protected $table    = "driver";
    protected $fillable = ["display_name"];

}
