<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PublicController extends Controller
{
    // display the landing page
    public function index(){

        // fetching and passing all the posts to the welcome.blade.php for all the users
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    // displaying the single post
    public function singlePost(Post $post){
        return view('singlePost', compact('post'));
    }

    // displaying the contact page of admin
    public function contact(){
        return view('contact');
    }

    // displaying the about page of admin and the iWrite
    public function about(){
        return view('about');
    }


}
