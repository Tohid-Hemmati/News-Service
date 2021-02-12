<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Files;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
//        $posts = DB::table('posts')
//            ->join('users', 'users.id', '=', 'posts.author_id')
//            ->select('posts.*', 'users.name as author')
//            ->get();

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_header' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);
        if ($request['status'] == null) {
            $request['status'] = 0;
        }
        if ($request['image']) {
            $image = ImageUploader($request['image']);
        } else {
            $image = null;
        }
        $post = Post::create([
            'author_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'news_header' => $validated['news_header'],
            'description' => $validated['description'],
            'status' => $request->get('status'),
            'image' => $image,
            'time' => now(),
        ]);

        if ($request['files']) {
            foreach ($request['files'] as $file) {
                $url = FileUploader($file);
                Files::create([
                    'url' => $url,
                    'post_id' => $post->id,
                    'name' => $file->getClientOriginalName(),
                ]);
            }
        }
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request['image'] !== '') {
            unlink($post->image);
            $image =ImageUploader($request['image']);
        } else {
            $image = $post->image;
        }
        $post->update([
            'category_id' => $request['category_id'],
            'news_header' => $request['news_header'],
            'description' => $request['description'],
            'status' => $request->get('status'),
            'image' => $image,
            'time' => now(),
        ]);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            unlink($post->image);
        };
        foreach ($post->files as $file){
            unlink($file->url);
            $file->delete();
        }
        $post->delete();

        return redirect(route('posts.index'));
    }
}
