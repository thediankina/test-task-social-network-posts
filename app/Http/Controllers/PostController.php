<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $like = DB::table('likes')->where([
            'user_id' => Auth::id(),
            'post_id' => $id,
        ])->exists();

        return view('post.show', [
            'item' => Post::query()->find($id),
            'like' => $like,
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

            $item = new Post();
            $item->fill($request->all());
            $item->user_id = Auth::id();
            $item->save();

            return redirect(url('post', [
                'id' => $item->id,
            ]));
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
        $item = Post::query()->find($id);

        if ($request->isMethod('post')) {
            $request->validate(Post::rules());

            $item->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);

            return redirect(url('post', [
                'id' => $id,
            ]));
        }

        return view('post.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Delete post
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        return Post::query()->find($id)->delete() ? redirect('posts') : abort(404);
    }

    /**
     * Like post
     *
     * @param int $id
     * @return void
     */
    public function like(int $id): void
    {
        DB::table('likes')->insertOrIgnore([
            'user_id' => Auth::id(),
            'post_id' => $id,
        ]);
    }

    /**
     * Dislike post
     *
     * @param int $id
     * @return void
     */
    public function dislike(int $id): void
    {
        DB::table('likes')->where([
            'user_id' => Auth::id(),
            'post_id' => $id,
        ])->delete();
    }
}
