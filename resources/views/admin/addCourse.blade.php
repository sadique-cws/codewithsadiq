@extends('admin/adminbase')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('addCourse') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                                <div class="form-floating mb-3">
                                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control @error('title') is-invalid @enderror">
                                    <label for="title">Title</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="duration" id="duration" class="form-control" placeholder="duration">
                                    <label for="duration">duration</label>
                                </div>
                               
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="price" id="price" class="form-control" placeholder="price">
                                            <label for="price">Price</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" name="discount_price" id="discount_price" class="form-control" placeholder="discount_price">
                                            <label for="discount_price">Discount Price</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="eligibility" id="eligibility" class="form-control" placeholder="eligibility">
                                    <label for="eligibility">Eligibility</label>
                                </div>
                                 <div class="form-floating mb-3">
                                    <input type="text" name="instructor" class="form-control" id="instructor" placeholder="instructor">
                                    <label for="instructor">Instructor</label>

                                </div>
                                <div class="form-floating mb-3">
                                    <select name="category" class="form-control">
                                        @foreach ($category as $cat)
                                    <option value="{{ $cat->id}}">{{$cat->cat_title}}</option>                                    
                                        @endforeach
                                    </select>
                                    <label for="category">category</label>
                                    
                                </div>
                                <div class=" mb-3">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" rows="7" class="form-control" id="description" placeholder="description"></textarea>
                                    
                                    <label for="description">description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="submit" class="btn btn-danger btn-block">
                                </div>
                            </form>
                            
                
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection