@extends('admin.adminbase')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h6>Create New Coupon</h6>
                        <form action="{{ route('addCoupon') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label for="cat_title" class=" m-0 p-0 text-muted small">Coupon Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="cat_title" class=" m-0 p-0 text-muted small">Coupon Amount</label>
                                <input type="text" name="amount" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-danger btn-block" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($coupon as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->code}}</td>
                            <td>{{$c->amount}}</td>
                            <td>
                            <form action="{{route('couponAction')}}" method="POST">@csrf
                            <input type="hidden" name="coupon_id" value='{{$c->id}}'>
                                    @php  if($c->status==1): @endphp
                                    <button type="submit" class="badge border-0 bg-success">Activate</button>
                                    @php  else: @endphp
                                    <button type="submit" class="badge border-0 bg-danger">Deactive</button>
                                    @php  endif; @endphp
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection