<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request) {

        $ismyprofile = false; $isuserprofile = false; $userexist = true;
        $user = Auth::user();
        $userfullname = null;
        $username = null;

        $tweets = DB::select('select 
                                users.name as author,
                                tweets.content,
                                tweets.created_at
                                from tweets, users
                                where users.id=tweets.author_id
                                order by tweets.created_at desc');

        $loggedusername = $user->name;
        $loggeduserfullname = $user->full_name;
        
        $followers = DB::select('select 
                                users.name as follower_name
                                from followers, users
                                where followers.id_following=users.id
                                and users.id=? order by followers.created_at desc', [$user->id]);

        $following = DB::select('SELECT name as following_name FROM users WHERE id=(SELECT id_following FROM followers WHERE id_follower=?)', [$user->id]);

                                //dd($following);

        return view('index', compact('tweets', 'loggedusername', 'ismyprofile', 'isuserprofile', 'userexist', 'loggeduserfullname', 'userfullname', 'username', 'followers', 'following'));
    }

    public function profile(Request $request, string $name) {
        
        $ismyprofile = false; $isuserprofile = false; $userexist = false;
        $user = Auth::user();

        $userfound = User::where('name', $name)->first();
        if($userfound) {
            $userexist = true;
        }
        
        if($name === $user->name) {
            $ismyprofile = true;
        } else {
            $isuserprofile = true;
        }

        $tweets = DB::select('select 
                                users.name as author,
                                tweets.content,
                                tweets.created_at
                                from tweets, users
                                where users.id=tweets.author_id
                                and users.name=? order by tweets.created_at desc',[$name]);

        $followers = DB::select('select 
                                users.name as follower_name
                                from followers, users
                                where followers.id_following=users.id
                                and users.id=? order by followers.created_at desc', [$user->id]);

        $following = DB::select('select 
                                users.name as following_name
                                from followers, users
                                where followers.id_follower=users.id
                                and users.id=? order by followers.created_at desc', [$user->id]);

        $loggedusername = $user->name;
        $loggeduserfullname = $user->full_name;
        $username = $name;
        $userfullname = $userfound->full_name;

        return view('index', compact('tweets', 'loggedusername', 'username', 'ismyprofile', 'isuserprofile', 'userexist', 'loggeduserfullname', 'userfullname', 'followers', 'following'));
    }
}
