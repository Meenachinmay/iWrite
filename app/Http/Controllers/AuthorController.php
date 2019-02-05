<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreatePost;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // adding middlewate for author routes
    public function __construct()
    {
        $this->middleware('checkRole:author');
        $this->middleware('auth');
    }


    public function dashboard(){

        // getting all the comments of a particular author
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $commentsAll = Comment::whereIn('post_id', $posts)->get();

        // getting all the comments of today
        $todayComments = $commentsAll->where('created_at', '>=', \Carbon\Carbon::today());

        return view('author.dashboard', compact('commentsAll', 'todayComments'));
    }


    // to view all the psot in the dashboard
    public function posts(){
        return view('author.posts');
    }


    // to view all the comments
    public function comments(){

        // getting all the posts
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id', $posts)->get();
        return view('author.comments', compact('comments'));
    }


    // to create an new post
    public function newPost(){
        return view('author.newPost');
    }


    // to create an new post
    public function createPost(CreatePost $request){

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->sub_title = $request['sub_title'];

        $post->save();

        return redirect()->route('authorPosts')->with('success', 'Post created successfully');
    }


    // edit a post
    public function editPost($id){

        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        return view('author.editPost', compact('post'));
    }


    // edit a post
    public function editPostSave(CreatePost $request, $id){

        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();

        $post->title = $request['title'];
        $post->sub_title = $request['sub_title'];
        $post->content = $request['content'];

        $post->save();

        return redirect()->route('authorPosts')->with('success', 'Post updated successfully');
    }

    // delete a post
    public function deletePost($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();

        // getting all the comments of this post
        $commentsIds = Comment::where('post_id', $id)->pluck('id')->toArray();

        $commentsAll = Comment::whereIn('id', $commentsIds)->get();

        // deleting all the comments associated with this post
        foreach ($commentsAll as $comment){
            $comment->delete();
        }

        // delete the post
        $post->delete();

        return back()->with('success', 'Post and all comments on that post is delete successfully');
    }

}
