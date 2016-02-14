<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

    public $incrementing  = false;
    public $timestamps    = false;
    protected $table      = "area";
    protected $primaryKey = "code";
    protected $fillable   = ["code", "name"];

}
