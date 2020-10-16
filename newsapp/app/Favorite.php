<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'title','author','published_at','content','image','url'
    ];
    public function users(){

        return $this->belongsToMany(User::class);      
    }
}
