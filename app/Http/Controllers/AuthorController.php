<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreatePost;
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
    public function newPost(){
      return view('author.newPost');
    }
    public function createpost(CreatePost $request){
      $post = new Post();
      $post->title = $request['title'];
      $post->content = $request['content'];
      $post->user_id = Auth::id();
      $post->save();
      return back()->with('success', 'Post is succesfully created.');
    }
    public function postEdit($id){
      $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
      return view('author.editPost', compact('post'));
    }
    public function postEditPost(CreatePost $request, $id){
      $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
      $post->title = $request['title'];
      $post->content = $request['content'];
      $post->save();
      return back()->with('success', 'Post is updated succesfully.');
    }
    public function deletePost($id){
      $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
      $post->delete();
      return back();
    }
    public function comments(){
      $post = Post::where('user_id', Auth::id())->pluck('id')->toArray();
      $comments = Comment::whereIn('post_id', $post)->get();
      return view('author.comments', compact('comments'));
    }
}
