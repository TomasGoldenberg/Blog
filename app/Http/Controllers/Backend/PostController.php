<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage; //para eliminar img

class PostController extends Controller
{
    

    public function index()
    {
        $posts = Post::latest()->get();
        return view("posts.index", compact('posts')) ;//envia los datos a la vista //compact es lo mismo que ||return view("post",["post"=>$post]);||
    }



    public function create()
    {
        //carpeta/archivo
        return view("posts.create");
    }



    public function store(PostRequest $request)
    {
        
        $post = Post::create([
            "user_id" => auth()->user()->id //obtener el campo user_id de post ||lo buscamos en autenticados/usuarios/id
        ]+ $request->all() );//guardar el body de la peticion



        //img          "name del input"
        if($request->file("file")){

            $post->image= $request->file("file")->store("posts","public");
            $post->save();
        }
        
        return back()->with("status","Creado con exito");
                        //status?: crate.blade.php line11
        
    }




    public function edit(Post $post)
    {
        return view("posts.edit", compact('post'));
    }





    public function update(PostRequest $request, Post $post)
    {   

      
        $post->update(($request)->all()); //actualizamos todos los campos


        Storage::disk('public')->delete($post->image);
        if($request->file("file")){
            //si viene imagen eliminamos la anterior y guardamos la nueva
            $post->image= $request->file("file")->store("posts","public");
            $post->save();
        };

        return back()->with('status',"Actualizado con exito !");
    }





    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);

       $post->delete();

       return back()->with('status',"Eliminado con exito!");
    }
}
