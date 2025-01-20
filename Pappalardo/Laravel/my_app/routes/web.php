<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

Route::get('/ciao', function () {
    return '<h1>
    <center>
        Ciao Laravel! Molto meglio JDBC però
    </center>
</h1>';
});
