<?php

namespace App\Helpers;

class ControllerHelper {
public static function generateResponse($icon,$text,$status)
{
    return response()->json([
        'icon' => $icon,
        'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
        'text' => $text,
    ],$status);
}

}
