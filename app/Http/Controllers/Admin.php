<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Str;

class Admin extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function addCategory(Request $req){
        $req->validate([
            'cat_title'=>'required'
        ]);
        //inserting data
        $c = new Category();
        $c->cat_title = $req->cat_title;
        $c->save();

        return redirect()->back();
    }
    public function addCourse(Request $req){
        $req->validate([
            'title'=>'required'
        ]);
        //inserting data

        $imageName = time().'.'.$req->image->extension();  

        $req->image->move(public_path('images'), $imageName);


        $c = new Course();
        $c->title = $req->title;
        $c->slug = Str::slug($req->title,'-');
        $c->price = $req->price;
        $c->discount_price = $req->discount_price;
        $c->description = $req->description;
        $c->instructor = $req->instructor;
        $c->category = $req->category;
        $c->image = $imageName;
        $c->save();

        return redirect()->back();
    }
}
