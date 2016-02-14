<?php

namespace App\Models;

use App\Models\Traits\DateFormattable;
use Illuminate\Database\Eloquent\Model;

class AreaTask extends Model {

    use DateFormattable;

    public $timestamps  = false;
    protected $table    = "area_task";
    protected $fillable = [
        "area_code", "task_code", "assigned_to_username", "date_assigned", "status", "from", "to"
    ];

    //  utilities
    public static function EmployeeTasksToday($username) {
        return AreaTask::Employee($username)
                        ->with("area")
                        ->with("task")
                        ->assignedToday()
                        ->orderBy('from');
    }

    //  
    // <editor-fold defaultstate="collapsed" desc="Relationships">
    public function area() {
        return $this->belongsTo(Area::class, "area_code");
    }

    public function task() {
        return $this->belongsTo(Task::class, "task_code");
    }

    public function assignedTo() {
        return $this->belongsTo(User::class, "assigned_to_username");
    }

    // </editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="Scopes">

    public function scopeEmployee($query, $username) {
        return $query->where("assigned_to_username", $username);
    }

    public function scopeDateAssigned($query, $date) {
        return $query->where("date_assigned", $date);
    }

    public function scopeAssignedToday($query) {
        return $query->where("date_assigned", date("Y-m-d"));
    }

    // </editor-fold>
    //
    // <editor-fold defaultstate="collapsed" desc="Mutators">

    public function setDateAssignedAttribute($date) {
        $this->attributes['date_assigned'] = $this->toSystemDate($date);
    }

    public function setFromAttribute($time) {
        $this->attributes['from'] = $this->toSystemTime($time);
    }

    public function setToAttribute($time) {
        $this->attributes['to'] = $this->toSystemTime($time);
    }

    // </editor-fold>
}
