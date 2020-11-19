<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Paytm;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;


class PaytmController extends Controller{
    
    // display a form for payment
    public function initiate()
    {
        return view('paytm');
    }

    private function getTotalAmount($user,$order_id){
        $total = 0;
        $order = Order::find($order_id)->orderitem;
        foreach($order as $oi):
            $total += $oi->course->discount_price;
        endforeach;
        return $total;
    }

    public static function getDueAmount($order){
        $due = 0;
        if(isset($order->payment_due[0])):
            $due = $order->payment_due[0]->due_amount;
        endif;
        return $due;
    }
    public function pay(Request $request)
    {
        $user = Auth::user();    
        $amount = 0;
        $order = Order::where([['user_id',$user->id],['ordered',false]])->first();
        if(isset($_POST['full'])){
            $amount = $this->getTotalAmount($user->id,$order->id); 
            $due = $this->getTotalAmount($user->id,$order->id)-$amount;
        }
        elseif(isset($_POST['emi'])){
            $amount = $this->getTotalAmount($user->id,$order->id)*0.40; 
            $due = $this->getTotalAmount($user->id,$order->id)-$amount;       
        }
        else{
            $amount = $request->amount;
            $order = Order::where([['id',$request->order],['ordered',true]])->first();
            $due = $this->getDueAmount($order)-$amount;

        } 
    

        $userData = [
            'name' => $user->name, // Name of user
            'mobile' => 9546805580, //Mobile number of user
            'email' => $user->email, //Email of user
            'amount' => $amount,
            'due_amount'=>$due,
            'user_id'=>$user->id,
            'order_id' => $order->id,
            'order' => "9546805580"."_".rand(1,1000) //Order id
        ];

        
        $paytmuser = Paytm::create($userData); // creates a new database record


        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order'], 
            'user' => $paytmuser->id,
            'mobile_number' => $userData['mobile'],
            'email' => $userData['email'], // your user email address
            'amount' => $amount, // amount will be paid in INR.
            'callback_url' => route('status') // callback URL
        ]);
       return $payment->receive();  // initiate a new payment
    }

    public function paymentCallback(){   

        $transaction = PaytmWallet::with('receive');
        $user = Auth::user();    
        $response = $transaction->response();        
        $order_id = $transaction->getOrderId(); // return a order id
      
    
        // update the db data as per result from api call
        if ($transaction->isSuccessful() ) {
            $order = Order::where([['user_id',$user->id],['ordered',false]])->first();
            if($order):
                $orderitem = Order::find($order->id)->orderitem;
                foreach($orderitem as $o):
                    $o->where('order_id',$order->id)->update(['ordered'=>true]);
                endforeach;
                Order::where([['user_id',$user->id],['ordered',false]])->update(['ordered'=>true]);

            else:
                $order = Order::where([['user_id',$user->id],['ordered',true]])->first();
            endif;
                Paytm::where('order', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);

                return redirect(route('myPayment'))->with('message', "Your payment is successfull.");

        } else if ($transaction->isFailed()) {

            Paytm::where('order', $order_id)->update(['status' => 0]);
            return redirect(route('cart'))->with('message', "Your payment is failed.");
            
        } else if ($transaction->isOpen()) {
            Paytm::where('order', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('homepage'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        $transaction->getTransactionId(); // return a transaction id

        // $transaction->getOrderId(); // Get order id
    }
}