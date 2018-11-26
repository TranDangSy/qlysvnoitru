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
	return view('welcome');
});

Route::get('admin/login','useradController@getlogin');
Route::post('admin/login','useradController@postlogin')->name('admin/login');

Route::post('admin/postlogout','UseradController@postlogout');

Route::get('create','useradController@create');
Route::post('create', 'useradController@store')->name('create');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	// Route::get('/','useradController@getadmin');
	Route::get('/',function(){
		$totaladmin = DB::table('users')->where('status',1)->count();
		$totalstudent = DB::table('students')->where('status',1)->count();
		// $totalroom = DB::table('rooms')->where('status',1)->count();
		$totalroom = DB::table('rooms')->count();
		$totalmoney = DB::table('payments')->sum('price');
		return view('admin.home.home',['totaladmin'=>$totaladmin,'totalstudent'=>$totalstudent,'totalroom'=>$totalroom,'totalmoney'=>$totalmoney]);
	});

	Route::group(['prefix' => 'user'], function()
	{
		Route::get('/','useradController@index');

		Route::get('info/{id}','useradController@info');

		Route::get('on/{id}','useradController@on');
		Route::get('off/{id}','useradController@off');

		Route::get('edit/{id}','useradController@edit');
		Route::post('update/{id}','useradController@update');
		Route::post('updateimage/{id}','useradController@updateimage');
		Route::post('repass/{id}','useradController@repass');

		Route::get('delete/{id}','useradController@delete');
	});

	Route::group(['prefix'=>'student'], function () 
	{
		Route::get('/','StudentController@index');

		Route::get('createsv','StudentController@create');
		Route::post('createsv','StudentController@store');

		Route::get('detail/{id}','StudentController@detail');

		Route::get('destroy/{id}','StudentController@destroy');

		Route::get('on/{id}','StudentController@on');
		Route::get('off/{id}','StudentController@off');

		Route::get('getupdate/{id}','StudentController@getupdate');
		Route::post('postupdate/{id}','StudentController@postupdate');

		Route::get('editimage/{id}','StudentController@getedit');
		Route::post('posteditimage/{id}','StudentController@postedit');
	});

	Route::group(['prefix'=>'room'], function () 
	{
		Route::get('/','RoomController@index');

		Route::get('createroom','RoomController@createroom');
		Route::post('store','RoomController@store');

		Route::get('on/{id}','RoomController@on');
		Route::get('off/{id}','RoomController@off');

		Route::get('detail/{id}','RoomController@detail');

		Route::get('getupdate/{id}','RoomController@detail');
		Route::post('postupdate/{id}','RoomController@update');

		Route::get('search','RoomController@search');

		Route::post('update/{id}','RoomController@update');

		Route::get('destroy/{id}','RoomController@destroy');
	});

	Route::resource('payment', 'PaymentController');

	Route::group(['prefix'=>'payment'], function(){
		Route::get('/','PaymentController@index');

		Route::get('edit/{id}','PaymentController@edit');
		Route::post('postupdate/{id}','PaymentController@postupdate');
	});
});