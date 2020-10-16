<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticlesController extends Controller
{
    function list(){
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'country' => 'us',
            'apiKey' => '0dda770125cf43f78af1759297137d30',
        ]);
        if($response->ok()){
            return $response->json()['articles']; 
        }

    }
}
