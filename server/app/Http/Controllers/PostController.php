<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    

    public function index(){
        $posts=Post::all();
    }
    public function store(Request $request){
        $request->validate([
            'user_id'=>'required',
            'title'=>'required',
            'content'=>'required',
            'image'=>'nullable|mimes:jpg,png',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('posts', 'public');
        }
        $post=Post::create([
            'user_id'=>$request->user_id, 
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$imagePath,
        ]);
        return response()->json($post, 201);
    }
    public function show(Request $request){
        $id=$request->id;
        $post=Post::find($id);
        return response()->json($post);
    }
    public function update(Request $request){
        $id=$request->id;
        $post=Post::find($id);
        return response()->json($post);
    }


    public function destroy(Request $request){
        $id=$request->id;
        $post=Post::findOrFail($id);
        $post->delete();
        return response()->json(['message'=>'bien supprimer']);
    }
}
