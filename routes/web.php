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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//dealer signup route
Route::get('dealersignup', 'Auth\RegisterController@dealersingnupform');
Route::post('registerdealer', 'Auth\RegisterController@registerdealer');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('approval', 'HomeController@approval');

//for admin dashboards
Route::group(['middleware'=>['auth','admin'], 'as' => 'admin.', 'namespace' => 'Admin'], function(){

	require __DIR__.'/admin.php';
});

Route::group(['namespace'=>'Frontend'], function(){
	Route::get('about-us', 'FrontendController@aboutus');
	Route::get('services', 'FrontendController@services');
	Route::get('service/{slug}','FrontendController@singleService');
	Route::post('/service/inquiry','FrontendController@serviceInquery');
	Route::get('contact-us', 'FrontendController@contact');
	Route::post('sendmail', 'MailController@send');
	Route::get('blogs','FrontendController@blog');
	Route::get('blog/{slug}','FrontendController@singleBlog');
	Route::any('/works','FrontendController@works');
	Route::get('/privacy-policy','FrontendController@privacy');
	Route::get('/terms-&-conditions','FrontendController@terms');
    //page not found
    Route::get('/page-not-found','FrontendController@pageNotFound');
});
//route for download pdf
Route::get('/brochurePdf/{id}','Admin\BrochureController@show');
Route::get('/aboutPdf/{id}','Admin\AboutController@download');
Route::get('/servicePdf/{id}','Admin\ServiceController@download');
Route::get('/productPdf/{id}','Admin\ProductController@download');

//route for category at frontend
Route::group(['namespace'=>'Frontend'], function()
	{
		Route::get('category/{slug}', 'CategoryController@category');
		Route::get('subcategory/{slug}','CategoryController@subcategory');

	});
//route for product at frontend
Route::group(['prefix' =>'all-product', 'namespace'=>'Frontend'], function()
{
    Route::get('view', 'ProductController@index');
    Route::get('details/{slug}', 'ProductController@show');
    //view product by subcategoryw
    Route::get('filter/{id}', 'ProductController@filterBySubcategory');
});

//routes for cart
Route::group(['middleware' =>['auth', 'approval'], 'namespace'=>'Frontend', 'prefix'=>'cart'], function(){

	Route::get('list', 'CartController@index');
	Route::post('add/{id}', 'CartController@addtocart');
	Route::get('remove/{rowId}', 'CartController@removeItem');
	Route::get('destroy', 'CartController@destroyCart');

	//Route for checkout
	Route::get('checkout','CheckoutController@index');
	Route::post('paymentmethod', 'CheckoutController@PaymentOption');

	//Route for payment methods
	Route::get('cashondelivery', 'CheckoutController@CashOnDelivery');
	Route::get('payByKhalti', 'CheckoutController@khaltipayment');

	//Route for viewing own order
	Route::get('myorders', 'CartController@myorders');
	Route::get('vieworder/{id}', 'CartController@viewOrder');
});

Route::get('thanku', function(){
	return view('frontend.pages.thanku');
});

Route::get('faqs', function(){
	return view('frontend.pages.faq');
});
Route::get('deliveryInfo', function(){
	return view('frontend.pages.deliveryinfo');
});
Route::get('privacy', function(){
	return view('frontend.pages.privacy');
});

// Search products by name
Route::group(['namespace'=>'Frontend', 'prefix'=>'search'], function(){
	Route::post('product', 'SearchController@searchProduct');
});


//test
Route::get('hello', function(){
	echo "hello khalti";
});

Route::get('/config-cache', function() {
				$status = Artisan::call('config:cache');
				return '<h1>Configured cached</h1>';
			});

Route::get('/config-clear', function() {
				$status = Artisan::call('config:clear');
				return '<h1>Configurations cache cleared</h1>';
			});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
