@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
    <div class="container">
     Home/Course <h2>{{$course->title}}</h2>
    </div>
 </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5">
            <img src="{{ asset('images/'.$course->image)}}" alt="" class="w-100">
            </div>
            <div class="col">
                <p class="lead font-weight-normal">{{$course->description}}</p>
                <p class="small text-muted">by: {{$course->instructor}}</p>

            <a href="{{ route('addToCart',['slug'=>$course->slug])}}" class="btn btn-danger  btn-lg">add to Cart</a>
                <a href="" class="btn btn-success btn-lg">Buy Now</a>
            </div>
        </div>
    </div>
@endsection

