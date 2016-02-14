<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentLocation extends Model {

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "equipment_location";
    protected $primaryKey = ["equipment_id", "area_code"];
    protected $fillable   = ["equipment_id", "area_code", "qty"];

    public function scopeEquipmentId($query, $id) {
        return $query->where("equipment_id", $id);
    }

    public function area() {
        return $this->belongsTo(Area::class, "area_code");
    }

}
