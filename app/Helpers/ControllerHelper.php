<?php

namespace App\Helpers;

class ControllerHelper {
public static function generateResponse($errors,$icon,$text,$status)
{
    return response()->json([
        'errors' => $errors,
        'icon' => $icon,
        'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
        'text' => $text,
    ],$status);
}

}
