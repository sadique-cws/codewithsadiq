@extends('public.base')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @php
             $count = 0; //Initialize variable
            @endphp
            @foreach($course as $c)
            <?php 
                  $count += 1;
                  
            ?>
                
            <div class="col-6 col-lg-3 card-group mb-3">
                <div class="card rounded-0 shadow-sm border-0">
                <a href="{{ route('singleCourse',['slug'=>$c->slug])}}" class="stretched-link">
                        <img src=" {{asset('images/'.$c->image)}} " alt="logo" class="w-100 border " style="height:150px;object-fit:contain">
                    </a>
                    <div class="card-body pt-4">
                        <h6 class="small mb-0"> <strong>{{$c->title}}</strong> </h6>
                        <p class="small mt-1 m-0 p-0 text-muted"><strong>Instructor: </strong>{{$c->instructor}}</p>
                        <p class="small mt-1 m-0 p-0 text-muted"> Code: CC00{{$c->id}}</p>
                        <span>
                            <span class="font-weight-bolder h5 pt-0">₹ {{$c->discount_price}}</span>
                            <span class="font-weight-light small"><del>₹ {{$c->price}}</del></span>
                        </span>
                        <div><span class="badge small badge-pill badge-danger">New Course</span></div>
                    </div>
                </div>
            </div>
            @if ($count%4==0)
                </div>
                <div class="row">
            @endif
            @endforeach
        </div>
    </div>
@endsection