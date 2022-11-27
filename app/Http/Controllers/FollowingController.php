<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $following)
    {
        // if ($following == 'following') {
        //     $follows = $user->follows;
        // } else if ($following == 'follower') {
        //     $follows = $user->followers;
        // }

        // $follows = $following == 'following' ? $user->follows : $user->followers;

        if ($following !== 'following' && $following !== 'follower') {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $following == 'following' ? $user->follows : $user->followers,
        ]);
    }

    // public function following(User $user)
    // {
    //     return view('users.following', [
    //         'user' => $user,
    //         'following' => $user->follows
    //     ]);
    // }

    // public function follower(User $user)
    // {
    //     return view('users.following', [
    //         'user' => $user,
    //         'following' => $user->followers
    //     ]);
    // }

    public function store(Request $request, User $user)
    {
        // if (Auth::user()->hasFollow($user)) {
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }

        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);

        return back()->with("success", "You are follow the user.");
    }
}
