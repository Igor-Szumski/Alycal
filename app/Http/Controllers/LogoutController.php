<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store():RedirectResponse
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
