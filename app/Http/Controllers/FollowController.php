<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request, string $username) {
        
        $usertofollow = User::where('name', $username)->first();

        if(!$usertofollow) {
            return redirect('/');
        }

        $loggeduser = Auth::user();

        $exist = DB::select('select id from followers
                                where id_follower=?
                                and id_following=?',[$loggeduser->id, $usertofollow->id]);
        
        if($exist) {
            return redirect('/');
        }

        if(!$existent) {
            Follower::create([
                'id_follower' => $loggeduser->id,
                'id_following' => $usertofollow->id,
            ]);
        }

        //return response->json(array("name"=>$usertofollow->name, "following"=>true));
        return redirect('/');
    }

    public function endFollow(Request $request, string $username) {
        
        $loggeduser = Auth::user();
        
        $userfollowing = User::where('name', $username)->first();
        
        Follower::where('id_follower', $loggeduser->id)
                ->where('id_following', $userfollowing->id)
                ->update(['end_follow' => today()]);

        //return response->json(array("name"=>$usertofollow->name, "following"=>false));
        return redirect('/');
    }
}
