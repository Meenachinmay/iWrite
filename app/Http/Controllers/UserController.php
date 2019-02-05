<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\CommentTest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // show userdashboard and also code for showing the chart on user sashboard
    public function dashboard()
    {
        // creating new chart instance
        $chart = new DashboardChart();

        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());

        $comments = [];

        foreach ($days as $day){
            $comments[] = Comment::whereDate('created_at', $day)->where('user_id', Auth::id())->count();
        }

        $chart->dataset('comments', 'line', $comments);
        $chart->labels($days);

        return view('user.dashboard', compact('chart'));
    }

    // method to generate date range
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];

        for ($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
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

    // user profile view for data updating
    public function profile(){
        return view('user.profile');
    }

    // update user's data (password and email)
    public function profilePost(UserUpdate $request){
        // getting the user who requested this page data
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        if ($request['password'] != ""){

            if (!(Hash::check($request['password'], Auth::user()->password))){
                return back()->with('error', 'Please enter your correct current password');
            }

            if(strcmp($request['password'], $request['new_password']) == 0){
                return back()->with('error', 'Your new password cannot be same as current password, please enter a different password.');
            }

            $this->validate($request, [
                'password' => 'required',
                'new_password' => 'required|string|min:6|confirmed'
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return back()->with('success', 'Your password has changed successfully');

        }

        return back();
    }

    // creating new comment
    public function newComment(Request $request){

        $comment = new Comment;

        $comment->post_id = $request['post_id'];
        $comment->user_id = Auth::id();
        $comment->content = $request['comment'];

        $comment->save();

        return back();
    }
}
