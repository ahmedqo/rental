<?php

namespace App\Functions;

use Illuminate\Support\Str;

class Core
{
    public static function formatNumber($num)
    {
        $formattedNumber = number_format($num);
        if (strpos($formattedNumber, '.') === false) {
            $formattedNumber .= '.000';
        } else {
            list($integerPart, $decimalPart) = explode('.', $formattedNumber);
            switch (strlen($decimalPart)) {
                case 1:
                    $formattedNumber .= '00';
                    break;
                case 2:
                    $formattedNumber .= '0';
                    break;
            }
        }
        return $formattedNumber;
    }

    public static function matchRoute($str)
    {
        return Str::contains(request()->path(), $str);
    }

    public static function subString($str, $max = 157)
    {
        if (strlen($str) > $max) {
            $output = substr($str, 0, $max);
            return $output . '...';
        } else {
            return $str;
        }
    }

    public static function lang($lang = null)
    {
        return $lang ? app()->getLocale() == $lang : app()->getLocale();
    }

    public static function genderList()
    {
        return ['male', 'female'];
    }

    public static function statusList()
    {
        return ['available', 'not available'];
    }

    public static function transmissionList()
    {
        return ['manual', 'automatic', 'semi automatic'];
    }

    public static function fuelList()
    {
        return ['gasoline', 'diesel', 'electric', 'hybrid', 'hydrogen'];
    }

    public static function promoteList()
    {
        return [[1, 'yes'], [0, 'no']];
    }
}
