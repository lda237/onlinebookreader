<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user=Auth::user();
        $readers=User::find($user->id)->readers()->orderBy('id','desc')->get();
        $read=User::find($user->id)->readers()->orderBy('id','desc')->first();
//dd($read);
        return view('/Auth_User/dashboard',compact('readers'));
    }
}
