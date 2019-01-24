<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $novels = Novel::orderBy('created_at', 'DESC')->get();
        return view('home')->with('novels', $novels);
    }
}
