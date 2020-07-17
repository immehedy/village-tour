<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('checkRole:admin');
    }
    public function dashboard(){
      return view('admin.dashboard');
    }
    public function users(){
      return view('admin.users');
    }
    public function posts(){
      return view('admin.posts');
    }
    public function comments(){
      return view('admin.comments');
    }
}
