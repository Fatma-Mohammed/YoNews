<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticlesController extends Controller
{
    function list(){
        //If no country provided then default country is egypt
        $country = request('country') ? request('country') : 'eg';
        $categories = ['sports','business'];
        $articles = [];
        //for each category in system fetch api data
        foreach ($categories as $category) {
            $response = Http::get('https://newsapi.org/v2/top-headlines', [
            
                'country' => $country,
                'category' => $category,
                'apiKey' => '0dda770125cf43f78af1759297137d30',
    
            ]);
            if($response->ok()){
                //insert request articles for each loop to our articles array
                $articles = array_merge($articles, $response['articles']);
                
            }
        }
        return $articles;


    }
}
