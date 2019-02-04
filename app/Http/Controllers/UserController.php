<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    // to show all comments of a user
    public function comments()
    {
        return view('user.comments');
    }

    // to delete a comment
    public function deleteComment($id)
    {
        // getting the comment with the authenticated user so only a logged in user can delete the comment
        $comment = Comment::where('id', $id)->where('user_id', Auth::id())->first();

        // deleting the comment
        if ($comment){
            $comment->delete();
        }

        return back();
    }

    public function profile(){
        return view('user.profile');
    }

    public function profilePost(UserUpdate $request){
        // getting the user who requested this page data
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return back();
    }
}
