<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Models\Post;
use App\Models\Author;

use DB;
use Log;

class PostsController extends Controller
{
    public function index()
    {
        $model = new Post();
        $posts = $model->getPosts();
        return view('index', compact('posts'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('create', compact('authors'));
    }

    public function store(PostRequest $request)
    {
        $model = new Post();

        try {
            DB::beginTransaction();
            $model->storePost($request);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $authors = Author::all();

        return view('show', compact('post', 'authors'));
    }

    public function regist(PostRequest $request, $id)
    {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->updatePost($request, $id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }

    public function delete($id)
    {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->deletePost($id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }
}
