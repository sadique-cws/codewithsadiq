@extends('admin/adminbase')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="blockquote">Manage Students</h4>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Verified</th>
                        <th>isAdmin?</th>
                        <th>Date</th>
                        <th>action</th>
                    </tr>
                    @foreach ($students as $c)
                        <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->email_verifed_at}}</td>
                        <td>{{$c->isAdmin}}</td>
                        <td>{{$c->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection