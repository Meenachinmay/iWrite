<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function posts(){
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function comments(){
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));
    }


    // delete a comment by admin
    public function deleteComment($id)
    {
        // getting the comment from comment table
        $comment = Comment::where('id', $id)->first();

        // delete the comment
        $comment->delete();

        return back()->with('success', 'Comment is deleted successfully');
    }

    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // delete a user by admin
    public function deleteUser($id){
        $user = User::where('id', $id)->first();

        $user->delete();

        // getting all the posts created by this user
        $allPosts = Post::where('user_id', $id)->pluck('id')->toArray();

        $postsToDeleteNow = Post::whereIn('id', $allPosts)->get();

        // deleting all the posts of this user
        foreach ($postsToDeleteNow as $post){
            $post->delete();
        }

        // getting all the comments of this user
        $allComments = Comment::where('user_id', $id)->pluck('id')->toArray();

        $commentsToDeleteNow = Comment::whereIn('id', $allComments)->get();

        // deleting all the comments of this user
        foreach ($commentsToDeleteNow as $comment){
            $comment->delete();
        }

        return back()->with('success', 'User deleted successfully');
    }

    // edit a post by admin
    public function editPost($id){

        $post = Post::where('id', $id)->first();
        return view('admin.editPost', compact('post'));
    }


    // edit a post admin
    public function editPostSave(CreatePost $request, $id){

        $post = Post::where('id', $id)->first();

        $post->title = $request['title'];
        $post->sub_title = $request['sub_title'];
        $post->content = $request['content'];

        $post->save();

        return redirect()->route('adminPosts')->with('success', 'Post updated successfully');
    }

    // delete a post admin
    public function deletePost($id)
    {
        // getting the post from post table
        $post = Post::where('id', $id)->first();

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



    // setting user's permission

    public function makeAuthor($id){

        $user = User::where('id', $id)->first();

        $user->author = true;
        $user->save();

        return back()->with('success', 'Made author successfully');
    }


    public function removeAuthor($id){

        $user = User::where('id', $id)->first();

        $user->author = false;
        $user->save();

        return back()->with('success', 'Made user successfully');
    }
}
