<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //All Posts
    function index(){
        $posts = Post::get();
        return view('posts/list',['posts'=>$posts]);
    }

    //each post
    function show($id){
        $post = Post::find($id);
        return view('posts/post',['post'=>$post]);
    }

    //Create Post view
    function create(){
        return view('posts/create',[]);
    }

    //store post in DB
    function store(Request $request){
        $validator = \Validator::make($request->all(),[
            'title'=>'required|min:3|max:50',
            'desc'=>'required|min:10|max:100',
            'image'=>'mimes:png,jpg,jpeg,webp,svg',
            'content'=>'required|min:15|max:255'
        ]);
        if($validator->fails()){
            return redirect('posts/create')
            ->withErrors($validator)
            ->withInput();
        }

        //image Code
        $image = $request->file('image');
        $name = time().'.'.\Str::random(15).'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('img');
        $image->move($destinationpath,$name);

        //store at DB
        $post = new Post;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->image = $name;
        $post->content = $request->content;
        $post->admin_id = \Auth::user()->id;
        $post->save();


        return redirect('posts/create');

    }


    //edit view
    function edit($id){
        $post = Post::find($id);
        return view('posts/edit',['post'=>$post]);
    }




    function update($id,Request $request){

        $validator = \Validator::make($request->all(),[
            'title'=>'required|min:3|max:50',
            'desc'=>'required|min:10|max:100',
            'image'=>'mimes:png,jpg,jpeg,webp,svg',
            'content'=>'required|min:15|max:255'
        ]);
        if($validator->fails()){
            return redirect('posts/edit')
            ->withErrors($validator)
            ->withInput();
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->desc = $request->desc;
        if($request->hasfile('image')){
             //image Code
        $image = $request->file('image');
        $name = time().'.'.\Str::random(15).'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('img');
        $image->move($destinationpath,$name);
            if(isset($post->image)){
                unlink("img/$post->image");
            }
            $post->image = $name;
        }

        $post->content = $request->content;
        $post->update();

        return redirect('posts/');
    }
    function delete($id){
        $post = Post::find($id);
        if(isset($post->image)){
            unlink("img/$post->image");
        }
        $post->delete();
        return redirect('posts/');
    }
}
