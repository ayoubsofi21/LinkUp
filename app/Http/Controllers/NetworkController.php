<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NetworkController extends Controller
{
    // public function index(){
    //     $users=User::all();
    //     return view('network.index',compact('users'));
    // }
    public function toggleFollow(User $user)
    {
        auth()->user()->following()->toggle($user->id);
        return back();
    }
}
