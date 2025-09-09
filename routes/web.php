<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // ✅ ต้องเป็นตัวเล็กทั้งหมด
})->where('any', '.*');
