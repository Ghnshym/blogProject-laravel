<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;


class HomeController extends Controller
{
    public function index(){

        if(Auth::id())
        {

            $usertype = Auth()->user()->usertype;

            if($usertype == 'user')
            {
                return view('dashboard');
            }
            else if($usertype == 'admin')
            {
                return view('admin.adminhome');
            }
        }
    }

    public function post(){

        return view('admin.post');
    }
}