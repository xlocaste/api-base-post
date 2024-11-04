<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function store(StoreRequest $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return (new PostResource($post))->additional([
            'message' => 'Berhasil menambahkan data post'
        ]);
    }
}
