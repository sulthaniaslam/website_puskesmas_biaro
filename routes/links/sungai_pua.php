<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sungai_pua'], function () {
    if (file_exists(__DIR__ . '/web_sungai_pua/R_sungai_pua.php')) {
        include 'web_sungai_pua/R_sungai_pua.php';
    }
});