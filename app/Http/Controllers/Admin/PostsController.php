<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData(),$this->validationErrors());
        $data = $request->all();
        $new_post = new Post();
        $data['slug'] = Post::generateSlug($data['title']);
        $new_post->fill($data);
        $new_post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show',compact('post'));
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
        
            return view('admin.posts.edit',compact('post'));
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationData(),$this->validationErrors());
        $data = $request->all();

        $data['slug'] = Post::generateSlug($data['title']);
        $post->update($data);

        return redirect()->route('admin.posts.show' ,$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validationData(){
        return[
            'title' => 'required|max:50|min:2',
            'content' => 'required|max:255',
        ];
    }
    private function validationErrors(){
        return[
           'title.required' => 'il titolo è un campo obbligatorio',
           'title.max' => 'il numero di caratteri per il nome del fumetto consentito è di :max caratteri',
           'title.min' => 'il numero di caratteri per il nome del fumetto consentito è di :min caratteri',
           'content.required' => 'il contenuto è un campo obbligatorio',
           'content.required' => 'il numero di caratteri consentito è di :max caratteri'

        ];
    }
}
