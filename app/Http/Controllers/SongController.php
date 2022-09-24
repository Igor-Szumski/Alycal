<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Traits\SpotifyLogic;

class SongController extends Controller
{
    use SpotifyLogic;
    public function index()
    {
//
//        dd($test);
        $id = request()->segment(2);
        $post = post::find($id);
        $recommended = $this->getSpotifyStuff($post->artist,$post->title);
        if ($post) {
            return view('song', [
                'post' => $post,
                'recommended' => $recommended
            ]);
        } else {
            return view('error');
        }
    }
}

