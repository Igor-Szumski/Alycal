<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required|max:20',
            'password' => 'required|confirmed'
        ]);
            // register account to db
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
            // log in user after registration
        auth()->attempt($request->only('username', 'password'));

        return redirect()->to('/');
    }
}
