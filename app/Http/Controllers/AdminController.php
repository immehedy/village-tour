<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Charts\DashboardChart;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdate;
use App\Post;
use App\Comment;
use App\User;
use App\Contact;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('checkRole:admin');
      $this->middleware('auth');
    }
    public function dashboard(){
      $chart = new DashboardChart;
      $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());
      $postsDate = [];
      foreach($days as $day){
        $postsDate[]= Post::whereDate('created_at', $day)->count();
      }
      $chart->dataset('Post', 'line', $postsDate);
      $chart->labels($days);
      return view('admin.dashboard', compact('chart'));
    }
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
      $dates = [];
      for($date = $start_date; $date->lte($end_date); $date->addDay()){
        $dates[] = $date->format('Y-m-d');
      }
      return $dates;
    }
    public function users(){
      $users = User::all();
      return view('admin.users', compact('users'));
    }
    public function adminEditUser($id){
      $user = User::where('id', $id)->first();
      return view('admin.editUser', compact('user'));
    }
    public function adminUserEditUser(UserUpdate $request, $id){
      $user = User::where('id', $id)->first();
      $user->name = $request['name'];
      $user->email = $request['email'];
      if($request['author'] == 1){
        $user->author = true;
      }elseif($request['author'] == 0){
        $user->author = false;
      }elseif($request['admin'] == 1){
        $user->admin = true;
      }
      $user->save();
      return back()->with('success', "User updated succesfully");
    }
    public function adminDeleteUser($id){
      $user = User::where('id', $id)->first();
      $user->delete();
      return back();
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
    public function contacts(){
      $contacts = Contact::all();
      return view('admin.contacts', compact('contacts'));
    }
}
