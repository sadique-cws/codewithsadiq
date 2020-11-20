@extends('admin/adminbase')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="blockquote">Manage Payments</h4>
                <table class="table table-striped">
                   <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>order</th>
                        <th>email</th>
                        <th>status</th>
                        <th>amount</th>
                        <th>due_amount</th>
                        <th>transaction</th>
                        <th>action</th>
                    </tr>
                   </thead>
                    @foreach ($payments as $c)
                        <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->user->name}}</td>
                        <td>{{$c->order_id}}</td>
                        <td>{{$c->email}}</td>
                        <td>@php
                            if($c->status == 1){
                                echo "<span class='badge bg-success text-white'>Paid</span>";
                            }
                            else{
                                echo "<span class='badge bg-danger text-white'>Pending</span>";
                            }
                        @endphp</td>
                        <td>{{$c->amount}}</td>
                        <td>{{$c->due_amount}}</td>
                        <td>{{$c->transaction_id}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection