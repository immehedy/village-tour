<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

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
      $posts = Post::all();
      return view('admin.posts', compact('posts'));
    }
    public function adminPostEdit($id){
      $post = Post::where('id', $id)->first();
      return view('admin.editPost', compact('post'));
    }
    public function adminPostEditPost(CreatePost $request, $id){
      $post = Post::where('id', $id)->first();
      $post->title = $request['title'];
      $post->content = $request['content'];
      $post->save();
      return back()->with('success', 'Post is updated succesfully.');
    }
    public function adminDeletePost($id){
      $post = Post::where('id', $id)->first();
      $post->delete();
      return back();
    }
    public function comments(){
      $comments = Comment::all();
      return view('admin.comments', compact('comments'));
    }
    public function adminDeleteComment($id){
      $comment = Comment::where('id', $id)->delete();
      return back();
    }
}
