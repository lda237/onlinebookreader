<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    public function redirects()
	{
		$role=Auth::user()->role;
		//dd($role);
		if($role == "admin")
		{
			return redirect('/admin/dashboard');
		}
		else
		{
			return redirect('/auth_user/dashboard');
		}
	}
}
