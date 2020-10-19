<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\userRegistered;
use App\User;
use App\Exceptions;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth:sanctum']);
    }

    public function index(){
        $favorites = Auth::user()->favorites;
        return $favorites;
    }
    public function show(Favorite $favorite){
        return $favorite;
    }

    public function store(Request $request){
        $article = $request->article;
        $favorite = Favorite::create([
            'title' => $article['title'],
            'content' => $article['description'],
            'image' => $article['urlToImage'],
            'url' => $article['url'],
            'author' => $article['author'] ? $article['author'] : "",
            'published_at' => $article['publishedAt'],

        ]);

        $favorite->users()->attach($request->user['id']);


    }

    public function destroy($favorite){
        return Favorite::findOrFail($favorite)->delete();
        
    }

}