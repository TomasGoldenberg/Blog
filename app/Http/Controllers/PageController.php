<?php

namespace App\Http\Controllers;

use App\Post; //el model el archivo de la tabla
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts(){
        return view("posts",[
            "posts" => Post::with("user")->latest()->paginate()
        ]);
    }

    public function post(Post $post){
        return view("post",[
            "post"=>$post
        ]);
    }
}
