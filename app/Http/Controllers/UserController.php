<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

class UserController extends Controller
{
    public function index(){
        $user = User::latest()->get();
        return view('users.index',[
            'users'=> $user
        ]);
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('users.index.');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index');
      }
}
