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

Route::pattern('id','[0-9]+');

Route::group(['prefix' => 'admin'], function () {
	Route::group(['prefix' => 'categories'], function(){
		Route::get('/', ['as'=>'categories', 'uses' => 'CategoriesController@index']);
		Route::post('/', ['as'=>'categories.store', 'uses' => 'CategoriesController@store']);
		Route::get('create', ['as'=>'categories.create', 'uses' => 'CategoriesController@create']);
		Route::get('{id}/create', ['as'=>'categories.destroy', 'uses' => 'CategoriesController@destroy']);
		Route::get('{id}/edit', ['as'=>'categories.edit', 'uses' => 'CategoriesController@edit']);
		Route::post('{id}/update', ['as'=>'categories.update', 'uses' => 'CategoriesController@update']);
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('', ['as'=>'products', 'uses' => 'ProductsController@index']);
		Route::post('', ['as'=>'products.store', 'uses' => 'ProductsController@store']);
		Route::get('create', ['as'=>'products.create', 'uses' => 'ProductsController@create']);
		Route::get('{id}/create', ['as'=>'products.destroy', 'uses' => 'ProductsController@destroy']);
		Route::get('{id}/edit', ['as'=>'products.edit', 'uses' => 'ProductsController@edit']);
		Route::post('{id}/update', ['as'=>'products.update', 'uses' => 'ProductsController@update']);
	});
});

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
