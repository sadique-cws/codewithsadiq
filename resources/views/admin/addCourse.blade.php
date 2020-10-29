@extends('admin/adminbase')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('addCourse') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">discount_price</label>
                                    <input type="text" name="discount_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="instructor">instructor</label>
                                    <input type="text" name="instructor" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="category">category</label>
                                    <select name="category" class="form-control">
                                        @foreach ($category as $cat)
                                    <option value="{{ $cat->id}}">{{$cat->cat_title}}</option>                                    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger btn-block">
                                </div>
                            </form>
                            
                
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection