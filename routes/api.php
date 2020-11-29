<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/question', QuestionController::class);
Route::apiResource('/category', CategoryController::class);