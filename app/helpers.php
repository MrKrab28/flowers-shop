<?php

if (!function_exists('convertToNumeric')) {
    function convertToNumeric($num)
    {
        return str_replace([',', '.'], '', $num);
    }
}
