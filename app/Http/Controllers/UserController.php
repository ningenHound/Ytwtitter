<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getTweetsByUserName(Request $request, string $name) {
        
        $tweets = DB::select('select 
                                users.name,
                                tweets.content,
                                tweets.created_at
                                from tweets, users
                                where users.id=tweets.author_id
                                and users.name=?', [$name]
                            );

        return response()->json($tweets);
    }

}
