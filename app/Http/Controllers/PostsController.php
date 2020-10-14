<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;

class PostsController extends Controller
{

	public function __construct(){
		$this->Middleware('CheckUser');
	}
    public function index()
    {
    	return view("post.index", ["posts"=>Posts::get()]);
    }

    public function create()
    {
    	return view("post.create");
    }

    public function store(Request $request)
    {
    	// $post = new Posts;
    	// $post->title=$request->input("title");
    	// $post->text=$request->input("text");
    	// $post->description=$request->input("description");
    	// $post->save();
    	Posts::create([
    		"title"=>$request->input("title"),
    		"text"=>$request->input("text"),
    		"description"=>$request->input("description")
    	]);
    }
}
