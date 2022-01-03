<?php
Route::get('dashboard', 'DashboardController@index');


//for logo
Route::group(['prefix'=> 'logo'], function()
{
    Route::get('view', 'LogoController@index');
    Route::get('delete/{id}', 'LogoController@destroy');
    Route::get('add', 'LogoController@create');
    Route::post('store', 'LogoController@store');
    Route::get('edit/{id}', 'LogoController@edit');
    Route::put('update/{id}', 'LogoController@update');

});
//for logo
Route::group(['prefix'=> 'brochure'], function()
{
    Route::get('view', 'BrochureController@index');
    Route::get('delete/{id}', 'BrochureController@destroy');
    Route::get('add', 'BrochureController@create');
    Route::post('store', 'BrochureController@store');
    Route::get('edit/{id}', 'BrochureController@edit');
    Route::put('update/{id}', 'BrochureController@update');

});
//End users Route

Route::group(['prefix'=>'endusers'], function()
	{
		Route::get('view', 'EndUserController@index');
		Route::get('delete/{id}', 'EndUserController@destroy');
		Route::get('show/{id}', 'EndUserController@show');
		Route::get('approve-user/{id}', 'EndUserController@approveUser');
		Route::get('disapprove-user/{id}', 'EndUserController@disapproveUser');

	});

//for dealers route
Route::group(['prefix'=>'dealers'], function()
	{
		Route::get('view', 'DealersController@index');
		Route::get('delete/{id}', 'DealersController@destroy');
		Route::get('all-request', 'DealersController@allrequest');
		Route::get('approve-dealer/{id}', 'DealersController@approveDealer');
		Route::get('disapprove-dealer/{id}', 'DealersController@disapproveDealer');
		Route::get('view-details/{id}', 'DealersController@show');

	});
//for categories
Route::group(['prefix'=> 'category'], function()
	{
		Route::get('view', 'CategoryController@index');
		Route::get('delete/{id}', 'CategoryController@destroy');
		Route::get('add', 'CategoryController@create');
		Route::post('store', 'CategoryController@store');
		Route::get('edit/{id}', 'CategoryController@edit');
		Route::put('update/{id}', 'CategoryController@update');

	});

Route::group(['prefix'=> 'subcategory'], function()
	{
		Route::get('view', 'SubCategoryController@index');
		Route::get('delete/{id}', 'SubCategoryController@destroy');
		Route::get('add', 'SubCategoryController@create');
		Route::post('store', 'SubCategoryController@store');
		Route::get('edit/{id}', 'SubCategoryController@edit');
		Route::put('update/{id}', 'SubCategoryController@update');

        Route::get('/allsubcategory/{id}','SubCategoryController@subcategory')->name('subcategory');


    });
Route::group(['prefix'=>'admin-product'], function()
	{
		Route::get('view', 'ProductController@index');
		Route::get('delete/{id}', 'ProductController@destroy');
		Route::get('add', 'ProductController@create');
		Route::post('store', 'ProductController@store');
		Route::get('show/{id}', 'ProductController@show');
		Route::get('edit/{id}', 'ProductController@edit');
		Route::put('update/{id}', 'ProductController@update');
		Route::get('enable/{id}', 'ProductController@enableProduct');
		Route::get('disable/{id}', 'ProductController@disableProduct');
		Route::put('quickedit/{id}', 'ProductController@quickedit');

	});

//Route For Orders
Route::group(['prefix'=>'orders'], function()
{
	Route::get('all', 'OrdersController@index');
	Route::get('pending', 'OrdersController@pendingOrders');
	Route::get('delivered', 'OrdersController@deliveredOrders');
	Route::get('view/{id}', 'OrdersController@showDetails');
	Route::get('pdf/{id}', 'OrdersController@generatePDF');
	Route::get('markdelivered/{id}', 'OrdersController@markDelivered');
	Route::get('delete/{id}', 'OrdersController@destroy');
});

//Route for Form data
Route::group(['prefix'=>'form'], function()
	{
		Route::get('contact', 'FormController@contact');
		Route::get('view/{id}', 'FormController@viewmessage');
		Route::get('deletemsg/{id}', 'FormController@deletemsg');
	});
//about Us
Route::group(['prefix'=>'about-us'], function()
{
    Route::get('view', 'AboutController@index');
    Route::get('add', 'AboutController@create');
    Route::post('store', 'AboutController@store');
    Route::get('show/{id}', 'AboutController@show');
    Route::get('edit/{id}', 'AboutController@edit');
    Route::put('update/{id}', 'AboutController@update');
});
//gallery images
Route::group(['prefix'=>'gallery-image'], function()
{
    Route::get('view', 'GalleryController@index');
    Route::get('delete/{id}', 'GalleryController@destroy');
    Route::get('add', 'GalleryController@create');
    Route::post('store', 'GalleryController@store');
    Route::get('edit/{id}', 'GalleryController@edit');
    Route::put('update/{id}', 'GalleryController@update');
    Route::get('enable/{id}', 'GalleryController@enableGallery');
    Route::get('disable/{id}', 'GalleryController@disableGallery');
});
//services
Route::group(['prefix'=>'services'], function()
{
    Route::get('view', 'ServiceController@index');
    Route::get('delete/{id}', 'ServiceController@destroy');
    Route::get('add', 'ServiceController@create');
    Route::post('store', 'ServiceController@store');
    Route::get('show/{id}', 'ServiceController@show');
    Route::get('edit/{id}', 'ServiceController@edit');
    Route::put('update/{id}', 'ServiceController@update');
    Route::get('enable/{id}', 'ServiceController@enableService');
    Route::get('disable/{id}', 'ServiceController@disableService');
});

//blogs
Route::group(['prefix'=>'blog'], function()
{
    Route::get('view', 'BlogController@index');
    Route::get('delete/{id}', 'BlogController@destroy');
    Route::get('add', 'BlogController@create');
    Route::post('store', 'BlogController@store');
    Route::get('show/{id}', 'BlogController@show');
    Route::get('edit/{id}', 'BlogController@edit');
    Route::put('update/{id}', 'BlogController@update');
});
//testimonials
Route::group(['prefix'=>'testimonial'], function()
{
    Route::get('view', 'TestimonialController@index');
    Route::get('delete/{id}', 'TestimonialController@destroy');
    Route::get('add', 'TestimonialController@create');
    Route::post('store', 'TestimonialController@store');
    Route::get('show/{id}', 'TestimonialController@show');
    Route::get('edit/{id}', 'TestimonialController@edit');
    Route::put('update/{id}', 'TestimonialController@update');
    Route::get('enable/{id}', 'TestimonialController@enableTestimonial');
    Route::get('disable/{id}', 'TestimonialController@disableTestimonial');
});
//social links
Route::group(['prefix'=>'social-link'], function()
{
    Route::get('view', 'SocialController@index');
    Route::get('delete/{id}', 'SocialController@destroy');
    Route::get('add', 'SocialController@create');
    Route::post('store', 'SocialController@store');
    Route::get('show/{id}', 'SocialController@show');
    Route::get('edit/{id}', 'SocialController@edit');
    Route::put('update/{id}', 'SocialController@update');
});
//contact info of company
Route::group(['prefix'=>'contact-info'], function()
{
    Route::get('view', 'InfoController@index');
    Route::get('add', 'InfoController@create');
    Route::post('store', 'InfoController@store');
    Route::get('show/{id}', 'InfoController@show');
    Route::get('edit/{id}', 'InfoController@edit');
    Route::put('update/{id}', 'InfoController@update');
});
//why choose us
Route::group(['prefix'=>'why-choose-us'], function()
{
    Route::get('view', 'ChooseController@index');
    Route::get('delete/{id}', 'ChooseController@destroy');
    Route::get('add', 'ChooseController@create');
    Route::post('store', 'ChooseController@store');
    Route::get('edit/{id}', 'ChooseController@edit');
    Route::put('update/{id}', 'ChooseController@update');
});
//Banner images
Route::group(['prefix'=>'banner-image'], function()
{
    Route::get('view', 'BannerController@index');
    Route::get('delete/{id}', 'BannerController@destroy');
    Route::get('add', 'BannerController@create');
    Route::post('store', 'BannerController@store');
    Route::get('edit/{id}', 'BannerController@edit');
    Route::put('update/{id}', 'BannerController@update');
    Route::get('enable/{id}', 'BannerController@enableBanner');
    Route::get('disable/{id}', 'BannerController@disableBanner');
});
//VIdeo Gallery
Route::group(['prefix'=>'video-gallery'], function()
{
    Route::get('view', 'VideoController@index');
    Route::get('delete/{id}', 'VideoController@destroy');
    Route::get('add', 'VideoController@create');
    Route::post('store', 'VideoController@store');
    Route::get('edit/{id}', 'VideoController@edit');
    Route::put('update/{id}', 'VideoController@update');
    Route::get('enable/{id}', 'VideoController@enableVideo');
    Route::get('disable/{id}', 'VideoController@disableVideo');
});
//inquiry data
Route::group(['prefix'=>'inquiry'], function()
{
    Route::get('view', 'InquiryController@index');
    Route::get('delete/{id}', 'InquiryController@destroy');
    Route::get('add', 'InquiryController@create');
    Route::post('store', 'InquiryController@store');
    Route::get('show/{id}', 'InquiryController@show');
    Route::get('edit/{id}', 'InquiryController@edit');
    Route::put('update/{id}', 'InquiryController@update');
    Route::get('enable/{id}', 'InquiryController@enableInquiry');
    Route::get('disable/{id}', 'InquiryController@disableInquiry');
});
//policy pages
Route::group(['prefix'=>'pages'], function()
{
    Route::get('view', 'PageController@index');
    Route::get('delete/{id}', 'PageController@destroy');
    Route::get('add', 'PageController@create');
    Route::post('store', 'PageController@store');
    Route::get('show/{id}', 'PageController@show');
    Route::get('edit/{id}', 'PageController@edit');
    Route::put('update/{id}', 'PageController@update');
});
