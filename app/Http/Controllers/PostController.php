<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = post::orderByDesc('ID')->paginate('12');
        return view('posts', [
            'post' => $posts
        ]);
    }
}
