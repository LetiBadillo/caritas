<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Inicio';
        $view = '';
        if(\Auth::user()->user_type == 1) $view = 'home';
        if(\Auth::user()->user_type == 2) $view = 'other';
        return view($view, compact('title'));
    }
}
