<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/tassili/router',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'index'])->middleware('auth');
Route::get('/tassili/router/create',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'create'])->middleware('auth');
Route::get('/tassili/router/update/{id}',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'update'])->middleware('auth');
Route::post('/tassili/router/creator',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'creator'])->middleware('auth');
Route::post('/tassili/router/updator',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'updator'])->middleware('auth');
Route::post('/tassili/router/updateActive',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'updateActive'])->middleware('auth');
Route::post('/tassili/router/delete',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'delete'])->middleware('auth');
Route::post('/tassili/logout',[\Tassili\Free\Http\Controllers\TassiliRouter::class,'logout'])->middleware('auth');

