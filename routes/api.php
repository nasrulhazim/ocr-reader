<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/ocr', function(){
	Auth::loginUsingId(1);
	$file = request()->file('ocr')->store('ocr');
	$result = \App\Ocr\Reader::read($file);
	return response()->json(['data' => $result]);
})->name('ocr');
