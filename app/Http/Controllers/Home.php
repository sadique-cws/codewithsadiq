<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class Home extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function singleCourse(Request $req,$slug){
        return view("public/courseView",["course"=>Course::find($slug),"category"=>Category::all()]);
    }

    
    public function cart(Request $req){
        $user_id = Auth::id();    

        $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
        if(!$order){
             return redirect()->route('homepage');
        }
        $data = [
            "category"=>Category::all(),
            "orderitem"=>Order::find($order->id)->orderitem
        ];
        return view('public/cart',$data);
    }
    public function myCourse(Request $req){
        $user_id = Auth::id();    

        $order = Order::where([['user_id',$user_id],['ordered',true]])->first();
        $data = [
            "category"=>Category::all(),
            "orderitem"=>Order::find($order->id)->orderitem
        ];
        return view('public/myCourse',$data);
    }
    public static function getDueAmount($order){
        $due = 0;
        foreach($order->paytm as $p):
            $due += $p->due_amount;
        endforeach;
        return $due;
    }
    public function myPayment(Request $req){
        $user_id = Auth::id();    

        $order = Order::where([['user_id',$user_id],['ordered',true]])->get();
        $data = [
            "category"=>Category::all(),
            "order"=>$order
        ];
        return view('public/myPayments',$data);
    }
    private function OrderItemCreation($user_id,$course,$order){
        $orderItem = OrderItem::where([['user_id',$user_id],['ordered',false],["course_id",$course->id]])->first();
        if(!$orderItem){
            $oi = new OrderItem();
            $oi->user_id = $user_id;
            $oi->course_id = $course->id;
            $oi->order_id = $order->id;
            $oi->save();
        }
    }
    public function addToCart(Request $req,$slug){
        
         $user_id = Auth::id();    
        $course = Course::find($slug);
        if($course){
            $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
            if($order){
                $this->OrderItemCreation($user_id,$course,$order);
            }
            else{
                $order = Order::create(['user_id'=>$user_id]);
                $this->OrderItemCreation($user_id,$course,$order);
            }
            return redirect('cart')->with(['message' => 'Course added successfully in your cart']);
        } 
        else{
            //msg this course not avaiable
            return redirect('cart')->with(['message' => 'Selected Course is Not Avaiable', 'alert' => 'alert-danger']);
        }
    }
    public function removeFromCart(Request $req,$slug){
        
         $user_id = Auth::id();    
        $course = Course::find($slug);
        if($course){
            $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
            if($order){
                
                $orderItem = OrderItem::where([['user_id',$user_id],['ordered',false],["course_id",$course->id]])->first();
                if($orderItem){
                    $orderItem->delete();
                }
            }
            return redirect('cart')->with(['message' => 'Course removed successfully from your cart','alert'=>'alert-danger']);

        }
        else{
            //msg this course not avaiable
            return redirect()->back();
        }
    }
}



