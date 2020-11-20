@extends('admin/adminbase')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="blockquote float-left my-auto">Manage Course</h4>
            <a href="{{route('adminCourseAdd')}}" class="btn btn-success float-right">New Course</a>
                <div class="clearfix"></div>
                <table class="table mt-3">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Instructor</th>
                        <th>category</th>
                        <th>slug</th>
                        <th>action</th>
                    </tr>
                    @foreach ($course as $c)
                        <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->title}}</td>
                        <td>{{$c->price}}</td>
                        <td>{{$c->discount_price}}</td>
                        <td>{{$c->instructor}}</td>
                        <td>{{$c->categories->cat_title}}</td>
                        <td>{{$c->slug}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection