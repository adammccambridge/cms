<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('pages', 'PagesController');

Route::get('/{slug}', array(
	'as' => 'public.show',
	function($slug) {

		$pages = App::make('PagesRepository');
		$page = is_numeric($slug)
			? $pages->findById($slug)
			: $pages->findBySlug($slug);

			return View::make('pages.show', compact('page'));
	}
));

Route::get('/', array(
	'as' => 'dashboard',
	'uses' => 'SiteController@index'
));