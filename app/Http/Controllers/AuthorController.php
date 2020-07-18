<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Post;
use App\Comment;

class AuthorController extends Controller
{

    public function __construct(){
      $this->middleware('checkRole:author');
    }

    public function dashboard(){
      $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
      $allcomments = Comment::whereIn('post_id', $posts)->get();
      $todayComments = $allcomments->where('created_at', '>=', Carbon::today())->count();
      return view('author.dashboard', compact('allcomments', 'todayComments'));
    }
    public function posts(){
      return view('author.posts');
    }
    public function comments(){
      return view('author.comments');
    }
}
