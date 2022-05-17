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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
// });
*/

Route::post('/CreateItem','ItemController@createItem');
Route::get('/GetItem','ItemController@getItem');
Route::patch('/UpdateItem','ItemController@updateItem');
Route::delete('/DeleteItem','ItemController@deleteItem');
Route::get('/GetAllItems','ItemController@getAllItems');


Route::post('/CreateOffer','OfferController@createOffer');
Route::get('/GetOffer','OfferController@getOffer');
Route::patch('/UpdateOffer','OfferController@updateOffer');
Route::delete('/DeleteOffer','OfferController@deleteOffer');
Route::get('/GetAllOffers','OfferController@getAllOffers');

Route::post('/Checkout','OrderController@checkout');