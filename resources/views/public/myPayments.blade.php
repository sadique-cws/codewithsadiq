@extends('public.base')


@section('content')
<div class="container-fluid bg-dark text-white p-4">
   <div class="container">
    Account/ <h2>My Payments</h2>
   </div>
</div>
    <div class="container mt-3">
        
        <div class="row">
            <div class="col-lg-12">
               
                <div class="row">
                    
                @foreach ($order as $o)
                <?php 
                ?>
                    
                <div class="list- mb-3">
                    <a class="list-group-item list-group-item-action bg-light">
                    
                        
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="my-auto text-truncate text-capitalize">
                                @php
                                    $str = "";
                                @endphp
                                @foreach ($o->orderitem as $item)
                                     @php
                                         $str .= $item->course->title . ", ";
                                     @endphp
                                @endforeach
                                {{substr($str,0,strlen($str)-2)}}
                            </h6>
                            {{-- due payment button --}}
                            @if (App\Http\Controllers\Home::getDueAmount($o) > 0)
                            
                            <button data-toggle="modal" data-target="#rock{{$o->id}}" class="btn btn-success ml-auto btn-sm bg-gradient text-nowrap ">Pay                                
                                @php
                                    echo $due = App\Http\Controllers\Home::getDueAmount($o);
                                @endphp
                            </button>

                            <div class="modal fade show" id="rock{{$o->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"></div>
                                        <div class="modal-body">
                                            <form action="{{route('make.payment')}}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                <input type="text" name="amount" value="{{$due}}" class="form-control">
                                                <input type="text" name="order" value="{{$o->id}}" class="form-control">
                                                    <span class="input-group-append">
                                                        <input type="submit" class="btn btn-success">
                                                    </span>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endif
                            {{-- more icon --}}
                            <small><button class="btn bg-transparent text-nowrap ml-2 ml-lg-4" data-toggle="collapse" data-target="#data{{$o->id}}">
                                Details
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button></small>
                          </div>

                        
                    </a>
                    
                <div class="collapse fade" id="data{{$o->id}}">
                    <div class="list-group-item ">
                        <div class="list-group row list-group-horizontal">
                            <div class="list-group-item  bg-light col-2">Id</div>
                            <div class="list-group-item  bg-light col">Date</div>
                            <div class="list-group-item  bg-light col-2">Paid Amount</div>
                            <div class="list-group-item  bg-light col-2">Due Amount</div>
                        </div>
                        @foreach ($o->paytm as $p)
                            <div class="list-group row list-group-horizontal">
                                <div class="list-group-item col-2"><?= $p->id;?></div>
                                <div class="list-group-item col"><?= date("D d-M-Y ",strtotime($p->created_at));?></div>
                                <div class="list-group-item col-2"><?= $p->amount;?></div>
                                <div class="list-group-item col-2"><?= $p->due_amount; ?></div>
                            </div>
                        @endforeach
                    </div>
                   </div>
                </div>
               @endforeach
           
        </div>
      
    </div>
@endsection