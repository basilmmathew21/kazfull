<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(Auth::check())
	{ 	
		return view('home');
	}else{
		return redirect('/login');
	}
});

Route::get('/logout', function(){
	
	Auth::logout();
	return redirect('/');
	
});

Auth::routes();

Route::get('/register',function(){
    return redirect('/');
});


	Route::get('/inviteFriend','InviteFriendController@inviteFriend');
	Route::post('/inviteFriend','InviteFriendController@inviteFriend');
	
	Route::group(['middleware' => ['auth:web']],function () {
		Route::post('/ajaxCountryCity', 'CountriesController@selectCity');
		Route::get('/ChangePassword', 'ChangePasswordController@index');
		Route::post('/ChangePassword', ['as' => 'ChangePassword', 'uses' => 'ChangePasswordController@edit']);
		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('/countries', 'CountriesController@index');
		Route::get('/addCountry', ['as' => 'addCountry', 'uses' => 'CountriesController@add']);
		Route::post('/addCountry', ['as' => 'addCountry','uses' => 'CountriesController@add']);
		Route::get('/editCountry/{id}', ['uses' =>'CountriesController@edit']);
		Route::post('/editCountry/{id}', ['uses' =>'CountriesController@edit']);
		Route::get('/deleteCountry/{id}', ['uses' =>'CountriesController@delete']);
		Route::post('/importCountry', 'CountriesController@import');
		Route::post('/ajaxdeleteAllCountries','CountriesController@ajaxdeleteAllCountries');
		
		Route::get('/city', 'CityController@index');
		Route::get('/addCity', ['as' => 'addCity', 'uses' => 'CityController@add']);
		Route::post('/addCity', ['as' => 'addCity','uses' => 'CityController@add']);
		Route::get('/editCity/{id}', ['uses' =>'CityController@edit']);
		Route::post('/editCity/{id}', ['uses' =>'CityController@edit']);
		Route::get('/deleteCity/{id}', ['uses' =>'CityController@delete']);
		Route::post('/importCity', 'CityController@import');
		Route::post('/ajaxdeleteAllCity','CityController@ajaxdeleteAllCity');
		
		
		Route::get('/CarBodytype', 'CarBodytypeController@index');
		Route::get('/addCarBodytype', ['as' => 'addCarBodytype', 'uses' => 'CarBodytypeController@add']);
		Route::post('/addCarBodytype', ['as' => 'addCarBodytype','uses' => 'CarBodytypeController@add']);
		Route::get('/editCarBodytype/{id}', ['uses' =>'CarBodytypeController@edit']);
		Route::post('/editCarBodytype/{id}', ['uses' =>'CarBodytypeController@edit']);
		Route::get('/deleteCarBodytype/{id}', ['uses' =>'CarBodytypeController@delete']);
		Route::post('/ajaxdeleteAllCarBody','CarBodytypeController@ajaxdeleteAllCarBody');
		
		Route::get('/Brand', 'BrandController@index');
		Route::get('/addCarBrand', ['as' => 'addCarBrand', 'uses' => 'BrandController@add']);
		Route::post('/addCarBrand', ['as' => 'addCarBrand','uses' => 'BrandController@add']);
		Route::get('/editCarBrand/{id}', ['uses' =>'BrandController@edit']);
		Route::post('/editCarBrand/{id}', ['uses' =>'BrandController@edit']);
		Route::get('/deleteCarBrand/{id}', ['uses' =>'BrandController@delete']);
		Route::post('/importBrands', 'BrandController@import');
		Route::post('/ajaxdeleteAllCarBrand','BrandController@ajaxdeleteAllCarBrand');
		
		
		Route::get('/FuelType', 'FuelTypeController@index');
		Route::get('/addCarFuelType', ['as' => 'addCarBrand', 'uses' => 'FuelTypeController@add']);
		Route::post('/addCarFuelType', ['as' => 'addCarBrand','uses' => 'FuelTypeController@add']);
		Route::get('/editCarFuelType/{id}', ['uses' =>'FuelTypeController@edit']);
		Route::post('/editCarFuelType/{id}', ['uses' =>'FuelTypeController@edit']);
		Route::get('/deleteCarFuelType/{id}', ['uses' =>'FuelTypeController@delete']);
		Route::post('/ajaxdeleteAllFuelType', ['uses' =>'FuelTypeController@ajaxdeleteAllFuelType']);
		

		Route::get('/CarFeatures', 'CarFeaturesController@index');
		Route::get('/addCarFeatures', ['as' => 'addCarFeatures', 'uses' => 'CarFeaturesController@add']);
		Route::post('/addCarFeatures', ['as' => 'addCarFeatures','uses' => 'CarFeaturesController@add']);
		Route::get('/editCarFeatures/{id}', ['uses' =>'CarFeaturesController@edit']);
		Route::post('/editCarFeatures/{id}', ['uses' =>'CarFeaturesController@edit']);
		Route::get('/deleteCarFeatures/{id}', ['uses' =>'CarFeaturesController@delete']);
		Route::post('/importFeatures', 'CarFeaturesController@import');
		Route::post('/ajaxdeleteAllCarFeatures', ['uses' =>'CarFeaturesController@ajaxdeleteAllCarFeatures']);
		
		
		Route::get('/CarType', 'CarTypeController@index');
		Route::get('/addCarType', ['as' => 'addCarType', 'uses' => 'CarTypeController@add']);
		Route::post('/addCarType', ['as' => 'addCarType','uses' => 'CarTypeController@add']);
		Route::get('/editCarType/{id}', ['uses' =>'CarTypeController@edit']);
		Route::post('/editCarType/{id}', ['uses' =>'CarTypeController@edit']);
		Route::get('/deleteCarType/{id}', ['uses' =>'CarTypeController@delete']);
		Route::post('/ajaxdeleteAllCarType', ['uses' =>'CarTypeController@ajaxdeleteAllCarType']);
		

		Route::get('/CarColor', 'CarColorController@index');
		Route::get('/addCarColor', ['as' => 'addCarColor', 'uses' => 'CarColorController@add']);
		Route::post('/addCarColor', ['as' => 'addCarColor','uses' => 'CarColorController@add']);
		Route::get('/editCarColor/{id}', ['uses' =>'CarColorController@edit']);
		Route::post('/editCarColor/{id}', ['uses' =>'CarColorController@edit']);
		Route::get('/deleteCarColor/{id}', ['uses' =>'CarColorController@delete']);
		Route::post('/ajaxdeleteAllCarColor','CarColorController@ajaxdeleteAllCarColor');

		Route::get('/Commision', 'CommisionController@index');
		Route::post('/editCommision', ['as' => 'editCommision','uses' => 'CommisionController@edit']);

		Route::get('/Branch', 'BranchController@index');
		Route::get('/addBranch', ['as' => 'addBranch', 'uses' => 'BranchController@add']);
		Route::post('/addBranch', ['as' => 'addBranch','uses' => 'BranchController@add']);
		Route::get('/editBranch/{id}', ['uses' =>'BranchController@edit']);
		Route::post('/editBranch/{id}', ['uses' =>'BranchController@edit']);
		Route::get('/deleteBranch/{id}', ['uses' =>'BranchController@delete']);
		Route::post('/ajaxdeleteAllBranches','BranchController@ajaxdeleteAllBranches');
		
		Route::get('/Driver', 'DriverController@index');
		Route::get('/DriverPending', 'DriverController@pending');
		Route::get('/addDriver', ['as' => 'addDriver', 'uses' => 'DriverController@add']);
		Route::get('/editDriver/{id}', ['uses' =>'DriverController@edit']);
		Route::get('/viewDriver/{id}', ['as' => 'viewDriver','uses' =>'DriverController@view']);
		Route::post('/editDriverDocs/{id}', ['uses' =>'DriverController@edit']);
		Route::get('/deleteDriver/{id}', ['uses' =>'DriverController@delete']);
		Route::post('/addDriverDocs','DriverController@add');
		Route::post('/ajaxChangeDriverStatus','DriverController@changeStatus');
		Route::post('/ajaxPhoneValidate','DriverController@ajaxPhoneValidate');
		
		Route::get('/Customers', 'CustomersController@index');
		Route::get('/addCustomers', ['as' => 'addCustomers', 'uses' => 'CustomersController@add']);
		Route::post('/addCustomers', ['as' => 'addCustomers','uses' => 'CustomersController@add']);
		Route::get('/editCustomers/{id}', ['uses' =>'CustomersController@edit']);
		Route::post('/editCustomers/{id}', ['uses' =>'CustomersController@edit']);
		Route::get('/deleteCustomers/{id}', ['uses' =>'CustomersController@delete']);
		Route::get('/viewCustomer/{id}', ['as' => 'viewDriver','uses' =>'CustomersController@view']);
		

		Route::get('/AdminUsers', 'AdminUsersController@index');
		Route::get('/addUsers', ['as' => 'addUsers', 'uses' => 'AdminUsersController@add']);
		Route::post('/addUsers', ['as' => 'addUsers','uses' => 'AdminUsersController@add']);
		Route::get('/editUsers/{id}', ['uses' =>'AdminUsersController@edit']);
		Route::post('/editUsers/{id}', ['uses' =>'AdminUsersController@edit']);
		Route::get('/deleteUsers/{id}', ['uses' =>'AdminUsersController@delete']);
		Route::get('/editUserPermission/{id}', ['uses' =>'AdminUsersController@userPermission']);
		Route::post('/addUserPermission/{id}', ['uses' =>'AdminUsersController@userPermission']);
		Route::post('/ajaxEmailValidate','AdminUsersController@ajaxEmailValidate');


		Route::get('/Promotion', 'PromotionController@index');
		Route::get('/addPromotion', ['as' => 'addPromotion', 'uses' => 'PromotionController@add']);
		Route::post('/addPromotion', ['as' => 'addPromotion','uses' => 'PromotionController@add']);
		Route::get('/editPromotion/{id}', ['uses' =>'PromotionController@edit']);
		Route::post('/editPromotion/{id}', ['uses' =>'PromotionController@edit']);
		Route::get('/deletePromotion/{id}', ['uses' =>'PromotionController@delete']);
		Route::post('/ajaxdeleteAllPromotion','PromotionController@ajaxdeleteAllPromotion');
		

		Route::get('/Jobslist', 'JoblistController@index');
		Route::post('/Joblist/jobview', 'JoblistController@jobview');

		Route::get('/TopupCards', 'TopupCardsController@index');
		Route::get('/addNewCoupon', 'TopupCardsController@add');
		Route::post('/addNewCoupon', 'TopupCardsController@add');
		Route::get('/editCoupon/{id}', ['uses' =>'TopupCardsController@edit']);
		Route::post('/editCoupon/{id}', ['uses' =>'TopupCardsController@edit']);
		Route::get('/deleteCoupon/{id}', ['uses' =>'TopupCardsController@delete']);
		Route::get('TopupCards/downloadExcel/{type}', 'TopupCardsController@downloadExcel');
		Route::post('/ajaxdeleteAllTopup','TopupCardsController@ajaxdeleteAllTopup');

		Route::get('/AllCards', 'AllCardsController@index');
		Route::get('/editAllCoupon/{id}', ['uses' =>'AllCardsController@edit']);
		Route::post('/editAllCoupon/{id}', ['uses' =>'AllCardsController@edit']);
		Route::get('/deleteAllCoupon/{id}', ['uses' =>'AllCardsController@delete']);
		Route::post('/ajaxdeleteAllCards','AllCardsController@ajaxdeleteAllCards');
		
		

		Route::get('/UsedCards', 'UsedCardsController@index');
		Route::get('/editUsedCoupon/{id}', ['uses' =>'UsedCardsController@edit']);
		Route::post('/editUsedCoupon/{id}', ['uses' =>'UsedCardsController@edit']);
		Route::get('/deleteUsedCoupon/{id}', ['uses' =>'UsedCardsController@delete']);
		Route::post('/ajaxdeleteAllUsed','UsedCardsController@ajaxdeleteAllUsed');


		Route::get('/UnUsedCards', 'UnUsedCardsController@index');
		Route::get('/editUnUsedCoupon/{id}', ['uses' =>'UnUsedCardsController@edit']);
		Route::post('/editUnUsedCoupon/{id}', ['uses' =>'UnUsedCardsController@edit']);
		Route::get('/deleteUnUsedCoupon/{id}', ['uses' =>'UnUsedCardsController@delete']);
		Route::post('/ajaxChangeStatus','UnUsedCardsController@changeStatus');

		Route::get('/PrintedCards', 'PrintedCardsController@index');
		Route::get('/editPrintedCoupon/{id}', ['uses' =>'PrintedCardsController@edit']);
		Route::post('/editPrintedCoupon/{id}', ['uses' =>'PrintedCardsController@edit']);
		Route::get('/deletePrintedCoupon/{id}', ['uses' =>'PrintedCardsController@delete']);
		Route::post('/ajaxdeleteAllPrinted','PrintedCardsController@ajaxdeleteAllPrinted');


		Route::get('/GeneralSetting', 'GeneralSettingController@index');
		Route::get('/editGeneralSettingAmount/{id}', ['uses' =>'GeneralSettingController@edit']);
		Route::post('/editGeneralSettingAmount/{id}', ['uses' =>'GeneralSettingController@edit']);
		Route::get('/editGeneralSettingPercentage/{id}', ['uses' =>'GeneralSettingController@editPercentage']);
		Route::post('/editGeneralSettingPercentage/{id}', ['uses' =>'GeneralSettingController@editPercentage']);
		Route::get('/viewAmountHistory', ['uses' =>'GeneralSettingController@viewAmountHistory']);
		Route::get('/viewPercenatageHistory', ['uses' =>'GeneralSettingController@viewPercenatageHistory']);

		Route::get('/Currency', 'CurrencyController@index');
		Route::get('/addCurrency', ['as' => 'addCurrency', 'uses' => 'CurrencyController@add']);
		Route::post('/addCurrency', ['as' => 'addCurrency','uses' => 'CurrencyController@add']);
		Route::get('/editCurrency/{id}', ['uses' =>'CurrencyController@edit']);
		Route::post('/editCurrency/{id}', ['uses' =>'CurrencyController@edit']);
		Route::get('/deleteCurrency/{id}', ['uses' =>'CurrencyController@delete']);
		Route::post('/importCurrency', 'CurrencyController@import');

		Route::get('/Notification', 'NotificationController@index');
		Route::get('/addNotification', ['as' => 'addNotification', 'uses' => 'NotificationController@add']);
		Route::post('/addNotification', ['as' => 'addNotification','uses' => 'NotificationController@add']);
		Route::get('/editNotification/{id}', ['uses' =>'NotificationController@edit']);
		Route::post('/editNotification/{id}', ['uses' =>'NotificationController@edit']);
		Route::get('/deleteNotification/{id}', ['uses' =>'NotificationController@delete']);
		Route::post('/ajaxdeleteAllNotification','NotificationController@ajaxdeleteAllNotification');

		Route::get('/TermsConditions', 'TermsConditionsController@index');						
		Route::get('/addTerms', ['as' => 'addTerms', 'uses' => 'TermsConditionsController@add']);
		Route::post('/addTerms', ['as' => 'addTerms','uses' => 'TermsConditionsController@add']);
		Route::post('/ajaxChangeTermsStatus','TermsConditionsController@changeStatus');
		Route::get('/editTerms/{id}', ['uses' =>'TermsConditionsController@edit']);
		Route::post('/editTerms/{id}', ['uses' =>'TermsConditionsController@edit']);
		Route::get('/deleteTerms/{id}', ['uses' =>'TermsConditionsController@delete']);


		Route::get('/PiracyPolicy', 'PiracyPolicyController@index');						
		Route::get('/addPiracy', ['as' => 'addPiracy', 'uses' => 'PiracyPolicyController@add']);
		Route::post('/addPiracy', ['as' => 'addPiracy','uses' => 'PiracyPolicyController@add']);
		Route::post('/ajaxChangePiracyPolicyStatus','PiracyPolicyController@changeStatus');
		Route::get('/editPiracy/{id}', ['uses' =>'PiracyPolicyController@edit']);
		Route::post('/editPiracy/{id}', ['uses' =>'PiracyPolicyController@edit']);
		Route::get('/deletePiracy/{id}', ['uses' =>'PiracyPolicyController@delete']);
		
		Route::get('/Contact', 'ContactController@index');
		Route::get('/deleteContact/{id}', ['uses' =>'ContactController@delete']);
		
		Route::get('/EmailTemplate', 'EmailTemplateController@index');
		Route::get('/addEmailTemplate', ['as' => 'addEmailTemplate', 'uses' => 'EmailTemplateController@add']);
		Route::post('/addEmailTemplate', ['as' => 'addEmailTemplate','uses' => 'EmailTemplateController@add']);
		Route::get('/editEmailTemplate/{id}', ['uses' =>'EmailTemplateController@edit']);
		Route::post('/editEmailTemplate/{id}', ['uses' =>'EmailTemplateController@edit']);
		Route::get('/deleteEmailTemplate/{id}', ['uses' =>'EmailTemplateController@delete']);
		
		Route::get('/Rating', 'RatingController@index');
		Route::get('/Rating/{trip_id}', 'RatingController@index');
		Route::get('/deleteRating/{id}', ['uses' =>'RatingController@delete']);
	}); 