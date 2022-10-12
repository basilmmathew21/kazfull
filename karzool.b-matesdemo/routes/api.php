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

	Route::post('authenticate', 'API\UserController@authenticate');
	Route::post('login', 'API\UserController@login');
	Route::post('register', 'API\UserController@register');
	Route::post('registerDriver', 'API\UserController@registerDriver');
	Route::get('getCountry', 'API\CountryController@getCountry');
	Route::get('getCity/{id}', 'API\CityController@getCity');
	Route::post('userExists', 'API\UserController@userExists');
	Route::post('sentOtp', 'API\UserController@sentOtp');
	Route::post('varifyOtp', 'API\UserController@varifyOtp');
	Route::post('updateUserInfo', 'API\UserController@updateUserInfo');
	Route::get('getCarBodyType', 'API\CarBodyTypeController@getCarBodyType');
	Route::get('getCarBrands', 'API\CarBrandsController@getCarBrands');
	Route::get('getCarColor', 'API\CarColoursController@getCarColor');
	Route::get('getFuelType', 'API\FuelTypesController@getFuelType');
	Route::get('getCarFeature', 'API\CarFeaturesController@getCarFeature');
	Route::get('getCarType', 'API\CarTypeController@getCarType');
	
	
	Route::group(['middleware' => ['jwt.verify:api']],function () {
		
		Route::get('getCurrency', 'API\CurrencyController@getCurrency');
		Route::get('getBranches', 'API\BranchesController@Branches');
		Route::get('getTerms', 'API\TermsController@getTerms');
		Route::get('getPiracy', 'API\PiracyController@getPiracy');
		Route::get('getNotification', 'API\NotificationController@getNotification');
		Route::get('getTripHistory/{user_id}', 'API\TripController@getTripHistory');
		Route::get('getTripDetails/{trip_id}', 'API\TripController@getTripDetails'); 
		Route::get('getTotalRating/{trip_id}', 'API\RatingController@getTotalRating');
		Route::post('updateStatus', 'API\TripController@updateStatus');
		Route::get('totalEarnings/{driver_id}', 'API\TripController@totalEarnings');
		Route::post('loginCheck', 'API\UserController@loginCheck');
		Route::post('changePassword', 'API\UserController@changePassword');
		Route::post('updateProfile', 'API\UserController@updateProfile');
		Route::get('getProfile/{user_id}', 'API\UserController@getProfile');
		Route::get('getSettings', 'API\SettingController@getSetting');
		Route::post('changePassword', 'API\UserController@changePassword');
		Route::post('rating', 'API\RatingController@rating');
		Route::post('updateMobileOtpMethod', 'API\UserController@updateMobileOtpMethod');
		Route::post('updateMobileVarifyOtp', 'API\UserController@updateMobileVarifyOtp');
		Route::post('createContact', 'API\ContactController@createContact');
		Route::post('updateNotificationStatus', 'API\UserController@updateNotificationStatus');
		Route::post('updatePushToken', 'API\UserController@updatePushToken');
		Route::post('acceptJob', 'API\TripController@acceptJob');
		Route::post('cancelJob', 'API\TripController@cancelJob');
		Route::post('changeStatus', 'API\TripController@changeStatus');
		Route::get('getCurrentLiveJob', 'API\TripController@getCurrentLiveJob');
		Route::get('getNearestCar/{pickup_lat}/{pickup_long}', 'API\TripController@getNearestCar');
	}); 
