<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(){
        $search_text = $_GET['search'];
        $post = DB::table('posts')
                ->where('artist','LIKE', '%' .$search_text. '%')
                ->orWhere('title','LIKE', '%' .$search_text. '%')
                ->orWhere('lyrics','LIKE', '%' .$search_text. '%')
                ->get();

        return view('search', compact('post'));
    }
}
