<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($request->only('username', 'password'))){
            return back()->with('status', 'Invalid login credentials');
        }
        return redirect()->to('/');
    }
}
