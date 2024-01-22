<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;

class Helper
{
    public static function IDGenerator($model, $trow, $length = 4, $prefix = '') {
        $data = $model::orderBy('id', 'desc')->first();

        if (!$data) {
            $og_length = $length;
            $last_number = 0; // Initialize last_number as integer 0.
        } else {
            $code = (int)substr($data->$trow, strlen($prefix) + 1);
            $increment_last_number = $code + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }

        $zeros = str_repeat("0", $og_length);
        return $prefix . '-' . $zeros . $last_number;
    }
}








?>