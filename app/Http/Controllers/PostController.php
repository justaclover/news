<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::query()->create($request->validate([
            "title" => "required|string",
            "content" => "required|string",
            "image" => "required|string",
            "createdAt" => "required"
        ]));

        return response()->json([
            "status" => "success",
            "message" => "Пост успешно создан",
            "data" => [
                "title" => $post->title,
                'content' => $post->content,
                'image'=> $post->image,
                'createdAt'=> $post->createdAt
            ]
        ]);
    }

    public function show(Post $post)
    {
        return response()->json([
            "status" => "success",
            "message" => "Данные о посте успешно выданы",
            "data" => [
                'id' => $post->id,
                "title" => $post->title,
                'content' => $post->content,
                'image'=> $post->image,
                'createdAt'=> $post->createdAt
            ]
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $post->fill($request->validate([
            "title" => "nullable|string",
            "content" => "nullable|string",
            "image" => "nullable|string",
            "createdAt" => "nullable|YY-MM-DD HH:mm:ss"
        ]));

        $post->update();

        return response()->json([
            "status" => "success",
            "message" => "Пост успешно обновлён",
            "data" => [
                "title" => $post->title,
                'content' => $post->content,
                'image'=> $post->image,
                'createdAt'=> $post->createdAt
            ]
        ]);
    }

    public function destroy(Post $post) {
        $post->delete();
        return response()->noContent();
    }
}
