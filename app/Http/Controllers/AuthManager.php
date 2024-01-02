<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return view('welcome');
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return view('welcome');
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('welcome'));
        }
        return redirect(route('login'))->with('error', 'login details are not valid');
    }

    function registrationPost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with('error', 'registration fiald, try again');
        }
        return redirect(route('login'))->with('success', 'registration successfully ');
    }

    function logout(){
        // Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    
    public function select(Request $request){
        if (Auth::check()) {
            $filters = $request->only([
                "id"
            ]);
            if (count($filters) == 0){
                $post = Post::all();
            } else {
                $post = Post::where($filters) -> get();
            }
    
            return Response()->json($post, 200);  
        }
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

}
