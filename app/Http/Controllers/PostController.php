<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Feed page
     *
     * @return View
     */
    public function list(): View
    {
        return view('post/list', [
            'posts' => Post::all(['id', 'title', 'likes']),
        ]);
    }
}
