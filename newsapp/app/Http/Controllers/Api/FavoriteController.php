<?php

namespace App\Http\Controllers\Api;

use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(){
        $favorites = \Auth::user()->favorites;
        return $favorites;
    }

    public function show(Favorite $favorite){
        return $favorite;
    }

    public function store(Request $request){
        Favorite::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->urlToImage,
            'url' => $request->url,
            'author' => $request->author,
            'published_at' => $request->publishedAt,

        ]);
    }

    public function destroy(Favorite $favorite){
        return Favorite::destroy($favorite);
    }
}
