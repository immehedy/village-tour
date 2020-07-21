<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contact;

class PublicController extends Controller
{
    //
    public function index(){
      $posts = Post::paginate(4);
      return view('welcome', compact('posts'));
    }

    public function singlePost($id){
      $post = Post::findOrFail($id);
      return view('singlePost', compact('post'));
    }

    public function about(){
      return view('about');
    }

    public function contact(){
      return view('contact');
    }

    public function contactPost(Request $request){
      $contact = new Contact;
      $contact->name = $request['name'];
      $contact->email = $request['email'];
      $contact->phone = $request['phone'];
      $contact->message = $request['message'];
      $contact->save();
      return back()->with('success', 'Your message has been submitted.');
    }
}
