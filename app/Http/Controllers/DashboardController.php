<?php

namespace App\Http\Controllers;
use Auth;
use App\Novel;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    return view('dashboard.index')->with('user', Auth::user());
  }


  public function novels(){
    $novels = Novel::orderBy('created_at', 'DESC')->get();
    return view('dashboard.novels')->with('novels', $novels);
  }

  public function users(){
    $users = User::orderBy('created_at', 'DESC')->get();
    return view('dashboard.users')->with('users', $users);
  }

}
