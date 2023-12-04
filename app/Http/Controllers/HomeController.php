<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $tweets = DB::select('select 
                                users.name,
                                tweets.content,
                                tweets.created_at
                                from tweets 
                                inner join users on users.id=tweets.author_id
                                where users.name=?', ['frangv']
                            );

        return view('index', compact('tweets'));
    }
}
