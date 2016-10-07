<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('clear:cache', function(){
	$this->call('cache:clear');
	$this->call('config:cache');
	$this->call('view:clear');
	$this->call('optimize');
})->describe('Clear all cache and optimize class loader');

Artisan::command('clear:serve', function(){
	$this->call('clear:cache');
	$this->call('serve');
})->describe('Clear all cache, optimize class loader and serve the application');