<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Charts\DashboardChart;
use App\Http\Requests\CreatePost;
use App\Post;
use App\Comment;

class AuthorController extends Controller
{

    public function __construct(){
      $this->middleware('checkRole:author');
      $this->middleware('auth');
    }

    public function dashboard(){
      $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
      $allcomments = Comment::whereIn('post_id', $posts)->get();
      $todayComments = $allcomments->where('created_at', '>=', Carbon::today())->count();

      $chart = new DashboardChart;
      $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());
      $postsDate = [];
      foreach($days as $day){
        $postsDate[]= Post::whereDate('created_at', $day)->where('user_id', Auth::id())->count();
      }
      $chart->dataset('Post', 'line', $postsDate);
      $chart->labels($days);
      return view('author.dashboard', compact('chart', 'allcomments', 'todayComments'));
    }
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
      $dates = [];
      for($date = $start_date; $date->lte($end_date); $date->addDay()){
        $dates[] = $date->format('Y-m-d');
      }
      return $dates;
    }
    public function posts(){
      return view('author.posts');
    }
    public function newPost(){
      return view('author.newPost');
    }
    public function createpost(CreatePost $request){
      $post = new Post();
      if($request->hasFile('attachment')){
          $file = $request->file('attachment');
          $name = time(). $file->getClientOriginalName();
          $file -> move('images', $name);
      }
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
