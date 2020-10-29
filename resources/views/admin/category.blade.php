@extends('admin.adminbase')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h6>Create New Category</h6>
                        <form action="{{ route('addCategory') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label for="cat_title" class=" m-0 p-0 text-muted small">Category Title</label>
                                <input type="text" name="cat_title" class="form-control">
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->cat_title}}</td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-danger">X</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection