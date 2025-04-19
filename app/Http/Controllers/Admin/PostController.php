<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['user_id'] = auth()->id();

        Post::create($data);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Correcto!',
            'text'  => 'La categoría se ha creado correctamente.',
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug,'.$post->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:8192',
            'is_published' => 'required|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($request->is_published && !$post->published_at) {
            $data['published_at'] = now();
        }



        if ($request->hasFile('image')) {

            if ($post->image_path) {
                Storage::delete($post->image_path);
            }

            $data['image_path'] = Storage::put('images/posts', $request->file('image'));
        }

        $data['user_id'] = auth()->id();
        $post->update($data);

        $post->tags()->sync($data['tags'] ?? []);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Correcto!',
            'text'  => 'La publicación se ha actualizado correctamente.',
        ]);

        return redirect()->route('posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image_path) {
            Storage::delete($post->image_path);
        }

        $post->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Correcto!',
            'text'  => 'Publicación eliminada correctamente.',
        ]);

        return redirect()->route('posts.index');
    }
}
