<?php

namespace App\Http\Controllers;
use App\Products;
use App\comments;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
    	$products=Products::get();
    	return view("products.index", ["products"=>$products]);
    }

    public function create()
    {
    	return view("products.create");
    }

    public function store(Request $request)
    {
    	return Products::create([
    		"title"=>$request->input("title"),
    		"description"=>$request->input("description")
    	]);
    	return redirect()->route("adminIndex");
    }

    public function show($id)
    {
    	$product=Products::where("id", $id)->firstorfail();
        $comments=Comments::where("product_id", $id)->get();
    	return view("products.show", ["product"=>$product, "comments"=>$comments]);
    	// return Products::find($id)->first();
    }

    public function edit($id)
    {
        $product=Products::where("id", $id)->firstorfail();
        return view("products.edit", ["product"=>$product]);
    }

    public function update_form()
    {
        
    }

    public function update(Request $request)
    {
        Products::where("id", $request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description")
        ]);
    }

    public function delete(Request $request)
    {
    	Products::where("id", $request->input("id"))->delete();
    	return redirect()->back();
    }

    public function store_comments(Request $request)
    {
        return Comments::create([
            "comments"=>$request->input("comment"),
            "product_id"=>$request->input("id")
        ]);
    }
}
