<?php

use App\Http\Controllers\ConslutationController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/contact-data', [ContactController::class, 'store']);
Route::post('/free-conslutation', [ConslutationController::class, 'getConsultant']);
