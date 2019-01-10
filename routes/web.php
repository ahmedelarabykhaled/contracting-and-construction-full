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

// Route::get('/', function () {
    // return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');




Route::get('/stop', 'User\MainController@show');

Route::get('adminlogin','User\MainController@admin_login');
Route::get('adminlogout','User\MainController@admin_logout');
Route::post('adminlogin','User\MainController@admin_login_check');


Route::group(['prefix'=>'/','middleware'=>'user'],function(){
	// add to main info
	Route::get('add','User\MainController@add');

	Route::get('home','User\MainController@index_home');
	Route::get('mediacenter','User\MainController@index_mediacenter');
	Route::get('services','User\MainController@index_services');
	Route::get('projects','User\MainController@index_projects');
	Route::get('articles','User\MainController@index_articles');
	Route::get('contact','User\MainController@index_contact');
	Route::resource('about','User\AboutController');

	Route::get('userlogin','User\MainController@user_login');
	Route::get('userlogout','User\MainController@user_logout');
	Route::get('userregister','User\MainController@user_register');
	Route::post('userregister','User\MainController@user_register_check');
	Route::post('userlogin','User\MainController@user_check');

	Route::get('employeelogin','User\MainController@employee_login');
	Route::get('employeelogout','User\MainController@employee_logout');
	Route::get('employeeregister','User\MainController@employee_register');
	Route::post('employeeregister','User\MainController@employee_register_check');
	Route::post('employeelogin','User\MainController@employee_check');

	
});




Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	// main infornation page
	Route::resource('dashboard','Admin\DashboardController');
	Route::resource('maininfo','Admin\MainInfoController');
	Route::resource('sliderimages','Admin\SliderImagesController');
	Route::resource('news','Admin\NewsController');
	Route::resource('photos','Admin\PhotosAlbumController');
	Route::resource('events','Admin\EventsController');
	Route::resource('services','Admin\ServicesController');
	Route::resource('projects','Admin\ProjectsController');
	Route::resource('projectcategory','Admin\ProjectCategoryController');
	Route::resource('clients','Admin\ClientsController');
	Route::get('deleteicon/{id}','Admin\MainInfoController@delete_icon');

	// about page
	Route::resource('about','Admin\AboutPage\AboutController');

	//media center 
	Route::resource('mediacenter','Admin\MediaCenterController');
	
	// articles
	Route::resource('articles','Admin\ArticlesController');

	// admins and profile
	Route::resource('admins','Admin\AdminsController');

});
