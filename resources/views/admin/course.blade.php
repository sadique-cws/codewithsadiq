@extends('admin/adminbase')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
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
                        <td>{{$c->category}}</td>
                        <td>{{$c->slug}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection