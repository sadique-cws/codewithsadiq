<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Paytm;

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
        $c->cat_slug = Str::slug($req->cat_title,'-');
        $c->save();

        return redirect()->back();
    }
    public function addCoupon(Request $req){
        $req->validate([
            'code'=>'required',
            'amount'=>'required',
        ]);
        //inserting data
        $c = new Coupon();
        $c->code = $req->code;
        $c->amount= $req->amount;
        $c->save();

        return redirect()->back();
    }
    public function addCourse(Request $req){
        $req->validate([
            'title'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'instructor'=>'required',
            'category'=>'required',
            'image'=>'required',
            'description'=>'required',
            'duration' => 'required',
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
        $c->duration = $req->duration;
        $c->image = $imageName;
        $c->eligibility = $req->eligibility;
        $c->save();

        return redirect()->back();
    }

    public function students(Request $req){
        $data = ['students'=> User::all()];
        return view('admin.students',$data);
    }
    public function payments(Request $req){
        $data = ['payments'=> Paytm::all()];
        return view('admin.payments',$data);
    }

    public function couponAction(Request $req){
        $coupon = Coupon::find($req->coupon_id);

        if($coupon->status==0){
            $coupon->status = 1;
        }
        else{
            $order = Order::where('ordered',false)->get();
               
            foreach($order as $o){
                
                $o->coupon = NULL;
                $o->save();
            }
            $coupon->status = 0;

        }
        $coupon->save();
        return redirect()->back();
    }
}
