<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RemoteController;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use DB;
use Log;

use App\Models\Post;

class RemotePostController extends Controller
{
    public function store(PostRequest $request)
    {   
        $model = new Post();

        try {
            DB::beginTransaction();
            $data = Post::create([
                'title' => $request->input('title'),
                'author_id' => $request->input('author_id'),
                'content' => $request->input('content'),
            ]);
            DB::commit();
            return response()->json(['message' => 'success post', 'data' => $data,]);
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}