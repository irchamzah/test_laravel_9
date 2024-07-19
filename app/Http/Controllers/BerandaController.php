<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    function index()
    {
        $posts = Post::all();
        return view('beranda/index', compact('posts'));
    }
}
