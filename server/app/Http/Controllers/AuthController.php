<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $profiles=Profile::all();
        return response()->json($profiles);
    }
    public function register(Request $request){
        $request->validate([
            'userName'=>'required',
            'email'=>'required|email|unique:profiles',
            'password'=>'required|min:8',
            'bio'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpg,png',
        ]);
        $cryptPassword=Hash::make($request->password);
        Profile::create([
            'userName'=>$request->userName,
            'email'=>$request->email,
            'password'=>$cryptPassword,
            'bio'=>$request->bio,
            'image'=>$request->image,
        ]);
    }
    public function show(Request $request){
        $id=$request->id;
        $profile=Profile::find($id);
        return response()->json($profile);
    }
    public function update(Request $request){
        $id=$request->id;
        $profile=Profile::find($id);
        return response()->json($profile);
    }


    public function destroy(Request $request){
        $id=$request->id;
        $profile=Profile::findOrFail($id);
        $profile->delete();
        return response()->json(['message'=>'bien supprimer']);
    }
}
