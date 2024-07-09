<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Route;

class PageHelper
{
    public static function bodyClass()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}