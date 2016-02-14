<?php

namespace App\Models\Traits;

use Carbon\Carbon;

/**
 *
 * @author ervinne
 */
trait DateFormattable {

    public static $systemDateFormat  = "Y-m-d";
    public static $displayDateFormat = "m/d/Y";
    public static $systemTimeFormat  = "H:i:ss";
    public static $displayTimeFormat = "H:i a";

    protected function toDisplayDate($date) {
        return Carbon::createFromFormat(static::$systemDateFormat, $date)->format(static::$displayDateFormat);
    }

    protected function toSystemDate($date) {
        return Carbon::createFromFormat(static::$displayDateFormat, $date)->format(static::$systemDateFormat);
    }

    protected function toDisplayTime($time) {
        return Carbon::createFromFormat(static::$systemTimeFormat, $time)->format(static::$displayTimeFormat);
    }

    protected function toSystemTime($time) {
        return Carbon::createFromFormat(static::$displayTimeFormat, $time)->format(static::$systemTimeFormat);
    }

}
