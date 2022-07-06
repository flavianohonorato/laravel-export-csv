<?php

namespace App\Support;

use Carbon\Carbon;

class Util
{
    /**
     * @param $date
     * @param bool $hours
     * @return string
     */
    public static function dateToBr($date, $hours = false)
    {
        if (!$date) {
            return '-';
        }

        if ($hours) {
            return Carbon::parse($date)->format('d/m/Y H:i');
        }

        return Carbon::parse($date)->format('d/m/Y');
    }
}
