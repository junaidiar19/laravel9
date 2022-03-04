<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::isUser()->paginate(5);

        // $users = User::select('users.*', 'people.phone', 'people.address')->where('role', 'user')
        //         ->join('people', 'people.user_id', '=', 'users.id')
        //         ->paginate(5);

        // return response()->json($users);

        return view('users.index', compact('users'));
    }

    // route model binding
    public function detail($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('users.detail', compact('user'));
    }
}
