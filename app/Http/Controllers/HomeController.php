<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {

        $view = 'admin.dashboard';
//        if(Auth::user()->user_type == 1){
//            $view = 'admin.dashboard';
//        }
//        elseif(Auth::user()->user_type == 2){
//            $view = 'president.dashboard';
//        }
//        elseif(Auth::user()->user_type == '3'){
//            $view = 'secretary.dashboard';
//        }
//        elseif(Auth::user()->user_type == 4){
//            $view = 'treasurer.dashboard';
//        }
//        elseif(Auth::user()->user_type == 5){
//            $view = 'staff.dashboard';
//        }
        //dd($view,Auth::user()->user_type);
        return view($view);
    }
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    public function getstaff () {
        $users = User::orderBy('id')->where('status', ['active'])->get();

        return view('staffdirectory', compact('users'));
    }

}
