<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $courses = config('courses');
    return view('home', compact('courses'));
});
