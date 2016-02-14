<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

    public $incrementing  = false;
    protected $table      = "vehicle";
    protected $primaryKey = "asset_code";
    protected $fillable   = [
        "asset_code", "make", "model", "body_style", "capacity", "status", "image_url"
    ];

}
