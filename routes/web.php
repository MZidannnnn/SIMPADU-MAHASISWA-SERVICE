<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return redirect('/swagger-ui/index.html');
});

// Route::get('/', function () {
//     return view('welcome');
// });
