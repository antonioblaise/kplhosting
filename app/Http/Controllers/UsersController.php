<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function getLogin(){
		return view('login');
	}

	public function postLogin(Requests $request){
		return $request->all();
	}

	public function getLogout(){}
}
