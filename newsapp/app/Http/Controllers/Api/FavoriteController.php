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


}
