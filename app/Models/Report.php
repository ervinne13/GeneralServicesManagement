<?php

namespace App\Models;

use App\Models\Traits\DateFormattable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model {

    use DateFormattable;

    public $timestamps  = false;
    protected $table    = "report";
    protected $fillable = ["date", "issued_by_username", "issue"];

    public function reportedBy() {
        return $this->belongsTo(User::class, "issued_by_username");
    }

    // <editor-fold defaultstate="collapsed" desc="Accessors & Mutators">

    public function getDateAssignedAttribute($date) {
        $this->attributes['date'] = $this->toDisplayDate($date);
    }

    public function setDateAssignedAttribute($date) {
        $this->attributes['date'] = $this->toSystemDate($date);
    }

    // </editor-fold>
}
