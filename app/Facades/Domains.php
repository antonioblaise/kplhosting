<?php namespace Facades;

use Illuminate\Support\Facades\Facade;

class Domains extends Facade{
	protected static function getFacadeAccessor(){
		return 'domains';
	}
}
?>