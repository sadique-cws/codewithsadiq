@extends('public.base')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            @foreach($course as $c)
            <div class="col mb-3">
                <div class="card border-0">
                <a href="{{ route('singleCourse',['slug'=>$c->slug])}}" class="stretched-link">
                        <img src=" {{asset("course.jpg")}} " alt="logo" class="rounded w-100">
                    </a>
                    <div class="card-body pt-1 px-1">
                        <h6 class="small font-weight-bold mb-0"> {{$c->title}} </h6>
                        <p class="small m-0 p-0 text-muted"> {{$c->instructor}}</p>
                        <span>
                            <span class="font-weight-bold h5">₹ {{$c->price}}</span>
                            <span class="font-weight-light small"><del>₹ {{$c->discount_price}}</del></span>
                        </span>
                        <div><span class="badge small badge-pill badge-danger">New Course</span></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection