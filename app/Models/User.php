<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    public $incrementing  = false;
    protected $table      = "user";
    protected $primaryKey = "username";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'display_name', 'role_code', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class, "role_code");
    }

    public function scopeActive($query) {
        return $query->where("is_active", "1");
    }

    public function scopeEmployee($query) {
        return $query->where("role_code", "employee");
    }

}
