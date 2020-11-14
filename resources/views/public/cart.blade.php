@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
   <div class="container">
    Home/ <h2>Your Cart</h2>
   </div>
</div>
    <div class="container mt-3">
        
        <div class="row">
            <div class="col-lg-9">
                @if(session()->has('message'))
                <div class="alert mb-2 alert-dismissible fade show text-capitalize {{session('alert') ?? 'alert-success'}}">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
          @endif    
                <div class="row mb-3">
                    <h6 class="lead font-weight-bold">{{ count($orderitem)}} Courses in your carts</h6>
                </div>
                @if (count($orderitem)>0)
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                    if($order->coupon!=null){
                        $discountTotal -= $order->coupon_data->amount;
                    }
                ?>
                    
                @foreach ($orderitem as $oi)
                <?php 
                    $total += $oi->course->price;
                    $discountTotal += $oi->course->discount_price;

                   
                ?>
                <div class="card mb-2 border-0">
                    <div class="row">
                        <div class="col-lg-2">
                        <img src="{{ asset('images/'.$oi->course->image)}}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-0">
                                <div class='h6 mb-0'>{{$oi->course->title}}</div>
                                <div class="small mt-0 text-muted">by: {{$oi->course->instructor}}</div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                        <a href="{{ route('removeFromCart',['slug'=>$oi->course->slug])}}" class=" text-muted text-decoration-none small">Remove</a>
                        </div>
                        <div class="col">
                            <span class="d-block m-0 text-danger h5">₹{{$oi->course->discount_price}}/-</span>
                            <span class="d-block m-0 text-muted small"><del>₹{{$oi->course->price}}/-</del></span>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="col-lg-3">
                <h6 class="mb-0">Total: </h6>
            <div class="h1  font-weight-bolder">₹{{$discountTotal}}/-</div>
            <div class="h6 text-muted font-weight-lighter"><del>₹{{$total}}/-</del></div>
            <div class="h5 text-success">{{ round(($discountTotal / $total)*100)}}% off</div>
            <form action="{{ route('make.payment')}}" method="POST">
                @csrf
                <button type="submit" name="full" class="btn  btn-success bg-gradient btn-block btn-lg">Full Payment</button>
                <button type="submit" name="emi" class="btn  btn-danger bg-gradient btn-block btn-lg mt-4 ">
                   Pay ₹{{ ($discountTotal*0.40)}}/-<br> 
                        <small class="small font-weight-lighter">1st installment (40% of ₹{{$discountTotal}})</small>
        
                </button>
            </form>
               

        <form action="{{ route('Coupon')}}" method="POST" class="mt-4">
            @csrf
                    <div class="input-group">
                        <input type="text" class="form-control " placeholder="Enter Coupon" name="code">
                        <span class="input-group-append">
                            <input type="submit" class="btn btn-danger bg-gradient rounded-0" value="Apply">
                        </span> 
                    
                        @if($errors->has('code'))
                            <div class="text-danger small font-weight-bold">{{ $errors->first('code') }}</div>
                        @endif </div>
                </form>
                @if($order->coupon !== null)
            <p class="text-dark  mt-2 mb-0"> <a href='{{route('removeCoupon')}}' class=" font-weight-bolder text-decoration-none lead text-danger">&times;</a> <b class="small">{{$order->coupon_data->code}}</b> Coupon Applied  </p>
            <p class=" mt-0 pt-0 small text-success font-weight-bolder">(Flate ₹{{$order->coupon_data->amount}}/- Coupon Saved)</p>
            
                @endif
            </div>
            @else 
        <a href="{{ route('homepage')}}" class="btn btn-lg bg-gradient btn-primary">Explorer Courses</a>
            @endif 
        </div>
      
    </div>
@endsection