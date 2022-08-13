<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * List of posts
     *
     * @return View
     */
    public function list(): View
    {
        return view('post.list', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * View post
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('post.show', [
            'model' => Post::query()->find($id),
        ]);
    }

    /**
     * Create post
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function create(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(Post::rules());

            $post = new Post();
            $post->fill($request->all());
            $post->user_id = Auth::id();
            $post->save();

            return redirect('post/' . $post->id);
        }
        return view('post.edit');
    }

    /**
     * Update post
     *
     * @param int $id
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function update(int $id, Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(Post::rules());

            $post = new Post();
            $post->fill($request->all());
            $post->user_id = Auth::id();
            $post->save();

            return redirect('post/' . $post->id);
        }

        return view('post.edit', [
            'model' => Post::query()->find($id),
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        return Post::query()->find($id)->delete() ? redirect('posts') : abort(404);
    }
}
