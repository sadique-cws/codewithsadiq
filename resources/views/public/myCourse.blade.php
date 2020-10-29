@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
   <div class="container">
    Home/ <h2>My Courses</h2>
   </div>
</div>
    <div class="container mt-3">
        
        <div class="row">
            <div class="col-lg-12">
               
                <div class="row mb-3">
                    <h6 class="lead font-weight-bold">{{ count($orderitem)}} Courses in your carts</h6>
                </div>
                @if (count($orderitem)>0)
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
                <div class="row">
                @foreach ($orderitem as $oi)
                <?php 
                    $total += $oi->course->price;
                    $discountTotal += $oi->course->discount_price;
                ?>
             
                <div class="col-lg-3">
                    <a href="{{ route('singleCourse',['slug'=>$oi->course->slug])}}" class="stretched-link">
                        <img src=" {{asset("course.jpg")}} " alt="logo" class="rounded w-100">
                    </a>
                    <div class="card-body pt-1 px-1">
                        <h6 class="small font-weight-bold mb-0"> {{$oi->course->title}} </h6>
                        <p class="small m-0 p-0 text-muted"> {{$oi->course->instructor}}</p>
                       
                    </div>
                </div>
               @endforeach
            </div>
            </div>
            @else 
        <a href="{{ route('homepage')}}" class="btn btn-lg bg-gradient btn-primary">Explorer Courses</a>
            @endif 
        </div>
      
    </div>
@endsection