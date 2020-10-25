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
                            <span class="d-block m-0 text-danger h5">₹{{$oi->course->discount_price}}</span>
                            <span class="d-block m-0 text-muted small"><del>₹{{$oi->course->price}}</del></span>
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
                <a href="" class="btn btn-danger bg-gradient btn-block btn-lg">Checkout </a>


                <form action="" class="mt-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Coupon">
                        <span class="input-group-append">
                            <input type="submit" class="btn btn-danger bg-gradient rounded-0" value="Apply">
                        </span>
                    </div>
                </form>
            </div>
            @else 
        <a href="{{ route('homepage')}}" class="btn btn-lg bg-gradient btn-primary">Explorer Courses</a>
            @endif 
        </div>
      
    </div>
@endsection