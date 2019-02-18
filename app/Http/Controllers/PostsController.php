<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use BD; // PERMITE A UTILIZAÇÂO DE QUERYS SQL COMUNS

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Post::all(); = select * from ...
        // $posts = Post::all();
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('posts_title', 'desc')->take(1)->get();
        // $posts = Post::orderBy('posts_title', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CRIA REGRAS PARA A VALIDAÇÂO
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        // INSERE NO BANCO USANDO O TINKER
        $post->posts_title = $request->input('title');
        $post->posts_body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::where('posts_title', 'Post Two')->get();
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //CRIA REGRAS PARA A VALIDAÇÂO
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        // INSERE NO BANCO USANDO O TINKER
        $post->posts_title = $request->input('title');
        $post->posts_body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post removed!');
    }
}
