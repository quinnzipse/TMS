<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->beta) return view('home');
        return TaskController::index(); //TODO: this probably isn't good practice and should be changed.
    }

    public function profile(){
        return view('profile');
    }

    public function profileEdit(){
        return view('profileEdit');
    }

    public function profileEditProcess(){
        //TODO: put in some logic here
    }
}
