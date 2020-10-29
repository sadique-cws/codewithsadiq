@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
   <div class="container">
    Home/ <h2>My Payments</h2>
   </div>
</div>
    <div class="container mt-3">
        
        <div class="row">
            <div class="col-lg-12">
               
                <div class="row">
                @foreach ($order as $o)
                <?php 
                ?>
                    
                <div class="card mb-3">
                    <div class="card-header">ORDER_ID: {{$o->id}} 
                    
                        @if (App\Http\Controllers\Home::getDueAmount($o) > 0)
                            
                        <form action="{{route('make.payment')}}" method="POST">
                        @csrf
                            <button class="btn btn-danger bg-gradient">Pay 

                                @php
                                    echo $due = App\Http\Controllers\Home::getDueAmount($o);
                                @endphp
                            </button>
                        </form>
                        
                        @endif
                    </div>
                    <div class="card-body pt-1 px-1">
                        <table class="table">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>user_id</th>
                                <th>order_id</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>status</th>
                                <th>amount</th>
                                <th>due_amount</th>
                                <th>order_id</th>
                                <th>action</th>
                            </tr>
                        @foreach ($o->paytm as $p)
                            <tr>
                                <td><?= $p->id;?></td>
                                <td><?= $p->name;?></td>
                                <td><?= $p->user_id;?></td>
                                <td><?= $p->order_id;?></td>
                                <td><?= $p->email;?></td>
                                <td><?= $p->mobile;?></td>
                                <td><?= $p->status;?></td>
                                <td><?= $p->amount;?></td>
                                <td><?= $p->due_amount; ?></td>
                                <td><?= $p->order;?></td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
               @endforeach
           
        </div>
      
    </div>
@endsection