<?php

namespace App\Models;

use App\Models\Traits\HasCompositeKeys;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleReservation extends Model {

    use HasCompositeKeys;

    public $timestamps    = false;
    public $incrementing  = false;
    protected $table      = "vehicle_reservation";
    protected $primaryKey = ["period_from", "period_to", "vehicle_asset_code"];
    protected $fillable   = [
        "period_from",
        "period_to",
        "driver_id",
        "vehicle_asset_code",
        "reserved_by_username",
        "reserve_to",
        "contact",
        "email",
        "destination_name",
        "destination_address",
        "purpose"
    ];

    public function scopeVehicle($query, $assetCode) {
        return $query->where("vehicle_asset_code", $assetCode);
    }

    public function scopePeriod($query, $periodFrom, $periodTo) {
        return $query
                        ->where("period_from", $periodFrom)
                        ->where("period_to", $periodTo);
    }

    public static function getAllAsCalendarEvents() {
        $columns = [
            "vehicle_asset_code",
            "make",
            "model",
            "destination_name",
            "purpose",
            "reserve_to",
            DB::raw("CONCAT(period_from, '|' ,period_to, '|', vehicle_asset_code) AS id"),
            DB::raw("display_name AS reserved_by_display_name"),
            DB::raw("CONCAT(make, ' ', model, ': ', destination_name) AS title"),
            DB::raw("period_from AS start"),
            DB::raw("period_to AS end"),
        ];

        return VehicleReservation::select($columns)
                        ->join('user', 'user.username', '=', 'reserved_by_username')
                        ->join('vehicle', 'vehicle_asset_code', '=', 'asset_code')
                        ->get();
    }

}
