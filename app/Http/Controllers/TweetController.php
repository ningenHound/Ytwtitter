<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function create(Request $request) {
        
        $request->validate([
            'content' => ['required', 'string', 'max:280'],
        ]);

        $user = Auth::user();

        $newTweet = Tweet::create([
            'content' => $request->content,
            'author_id' => $user->id,
        ]);

        return response()->json($newTweet);
    }
}
