<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
Route::match(['get','post'], '/exemplo2', function () {
	return 'oi';
});

Route::any('/exemplo2',function () {
	return 'oi any';
});

<form action="#"method="POST">
	<input type="hidden" name="_method" value="PUT"/>
	<input type="hidden" name="_token" value="{{}}"/>
</form>
Route::get('user/{id?}', function ($id = 123) {
	if ($id){
		return "Olá $id";
	}
		return "Não possui ID";
	}
)->where('id','[0-9]+');

Route::get('produtos', ['as' => 'produtos', function () {
	echo Route::currentRouteName();
	// return "Produtos";
}]);

// echo route('produtos');die;
*/


// Fase 4 do projeto
Route::get('categories', ['as'=>'categories', 'uses' => 'CategoriesController@index']);
Route::post('categories', ['as'=>'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('categories/create', ['as'=>'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('categories/{id}/create', ['as'=>'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::post('categories/{id}/update', ['as'=>'categories.update', 'uses' => 'CategoriesController@update']);


/*
// Fase 3 do projeto

Route::pattern('id','[0-9]+');

Route::group(['prefix' => 'admin'], function () {
	Route::get('teste', function () {
		return 'Products testes';
	});

	Route::get('categories/{action?}/{id?}', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

	Route::get('products/{action?}/{id?}', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
});
*/

Route::get('user/{id?}', function ($id = 123) {
	if ($id){
		return "Olá $id";
	}
		return "Não possui ID";
	}
);

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
