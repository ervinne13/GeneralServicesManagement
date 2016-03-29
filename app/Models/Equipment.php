<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {

    protected $fillable = [
        "name", "stock"
    ];

    public function getOnHandQty() {
        $totalBorrowedStocks = $this->getTotalBorrowedStocks();
        return $this->stock - $totalBorrowedStocks;
    }

    public function getTotalBorrowedStocks() {
        $totalBorrowedStocks = EquipmentLocation::EquipmentId($this->id)
                ->sum('qty');

        return $totalBorrowedStocks;
    }

    public function borrowEquipment($area, $qty) {

        $equipmentLocation = EquipmentLocation::EquipmentId($this->id)
                ->area($area)
                ->first();

        if (!empty($equipmentLocation)) {
            $equipmentLocation->qty += $qty;

            $equipmentLocation->update();
        } else {
            $equipmentLocation = new EquipmentLocation();

            $equipmentLocation->equipment_id = $this->id;
            $equipmentLocation->area_code    = $area;
            $equipmentLocation->qty          = $qty;

            $equipmentLocation->save();
        }

        return $equipmentLocation;
    }

    public function returnEquipment($area, $qty) {
        $equipmentLocation = EquipmentLocation::EquipmentId($this->id)
                ->area($area)
                ->first();

        if (!empty($equipmentLocation)) {
            $equipmentLocation->qty -= $qty;

            if ($equipmentLocation->qty > 0) {
                $equipmentLocation->update();
            } else {
                $equipmentLocation->delete();
            }
        } else {
            throw new Exception("No equipments borrowed in this location");
        }

        return $equipmentLocation;
    }

}
