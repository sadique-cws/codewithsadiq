@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
    <div class="container text-capitalize text-light small">
     Home &raquo; {{$course->categories->cat_title}} &raquo; Course <h2>{{$course->title}}</h2>
    </div>
 </div>
    <div class="container-fluid mt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 p-4 pt-1">
                <img src="{{ asset('images/'.$course->image)}}" alt="" class="w-100">
                </div>
                <div class="col">
                    <p class="lead font-weight-normal">{{$course->description}}</p>
                    <p class="small text-muted py-0 my-0">by: {{$course->instructor}}</p>
                    <p class="small text-muted py-0 my-0">Code: CC00{{$course->id}}</p>
    
                <a href="{{ route('addToCart',['slug'=>$course->slug])}}" class="btn btn-success rounded-0 shadow-sm border-0 mt-3 px-5 btn-lg">Start Learning</a>
                </div>
            </div>
            <div class="container px-5 mt-5">
                <div class="row">
                    <div class="col px-4 border-left border-secondary">
                        <h4 class="h6 text-muted">Estimated Time</h4>
                    <p class="small">{{$course->duration}} 
                        @php
                            echo ($course->duration <= 1)?"Month":"Months";
                        @endphp
                    </p>
                    </div>
                    <div class="col px-4 border-left border-secondary">
                        <h4 class="h6 text-muted">Batch Started At.</h4>
                        <p class="small">{{$course->duration}} </p>
                    </div>
                    <div class="col px-4 border-left border-secondary">
                        <h4 class="h6 text-muted">Eligibility</h4>
                        <p class="small">{{$course->eligibility}}</p>
                    </div>
                </div>
            </div>
            <div class="container px-5 border-top mt-4 border-1">
                <div class="row mt-5">
                    <div class="col=12 text-center">
                        <h4> All Our Programs Include</h4>
                    </div>
                    <div class="col-12 mt-4 col-lg-6">
                        <div class="row">
                            <div class="col-6">
                            <img src="{{asset('assets/Coding-project-idea.jpg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-6">
                                <h6 class="font-weight-bolder"><span class="border-bottom border-warning border-4">Real-world</span> Projects</h6>
                                <p class="small text-muted">With real world projects and immersive content built in partnership with top tier companies, you’ll master the tech skills companies want.                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 col-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{asset('assets/Coding-project-idea.jpg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-6">
                                <h6 class="font-weight-bolder">8 Years <span class="border-bottom border-warning border-4"> experienced Mentor</span></h6>
                                <p class="small text-muted">Our knowledgeable mentors guide your learning and are focused on answering your questions, motivating you and keeping you on track.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 col-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{asset('assets/Coding-project-idea.jpg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-6">
                                <h6 class="font-weight-bolder">Personal Skill Development with <span class="border-bottom border-warning border-4"> Problem Solving. </span></h6>
                                <p class="small text-muted">You’ll have access to career coaching sessions and resume to help you grow in your career.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 col-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{asset('assets/Coding-project-idea.jpg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-6">
                                <h6 class="font-weight-bolder"><span class="border-bottom border-warning border-4"> Flexible </span> learning program</h6>
                                <p class="small text-muted">Get a custom learning plan tailored to fit your busy life. reach your personal goals on the schedule that works best for you.                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

