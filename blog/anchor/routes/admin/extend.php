<?php

Route::get('admin/extend', array('before' => 'auth', 'do' => function($page = 1) {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();

	return View::make('extend/index', $vars)
		->nest('header', 'partials/header')
		->nest('footer', 'partials/footer');
}));