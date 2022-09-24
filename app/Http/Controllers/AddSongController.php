<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class addSongController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('addsong');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'lyrics' => 'required'
        ]);
        $request->User()->posts()->create([
            'artist' => $request->artist,
            'title' => $request->title,
            'lyrics' => $request->lyrics,
        ]);
        // maybe redirect to /song/{ID}, to show created post.
        return back();
    }
}
