<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    public static $statusList = ["Pending", "Ongoing", "Complete", "Incomplete"];
    public $incrementing  = false;
    public $timestamps    = false;
    protected $table      = "task";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "name", "estimated_hour_completion"
    ];

}
