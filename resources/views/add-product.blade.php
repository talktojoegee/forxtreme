@extends('layout.master-layout')
@section('title')
    Add Product
@endsection

@section('main-content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add New Product</div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">{!! session()->get('success') !!}</div>
                        @endif
                        <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" name="productName" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
                                @error('productName') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class=" form-group col-md-5">
                                <label for="exampleFormControlInput1" class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Price ">
                                @error('price') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class="form-group mt-3 col-md-5">
                                <label for="">Color</label>
                                <select name="color" id="" class="form-control">
                                    <option disabled selected>--Select color--</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->color_code ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('color') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class="form-group mt-3 col-md-5">
                                <label for="">Category</label>
                                <select name="category[]" id="" class="form-control" multiple>
                                    <option disabled selected>--Select category--</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('category') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class="form-group mt-3 col-md-5">
                                <label for="">Size</label>
                                <select name="size" id="" class="form-control">
                                    <option disabled selected>--Select size--</option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('size') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class=" form-group mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Gallery</label> <br>
                                <input type="file" name="gallery[]" multiple class="form-control-file" id="exampleFormControlInput1">
                                <br>
                                @error('gallery.*') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Product Details</label>
                                <textarea class="form-control" name="productDetails" placeholder="Product Details..." id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('productDetails') <i class="text-danger">{{$message}}</i> @enderror
                            </div>
                            <div class="form-group d-flex justify-content-center mt-3">
                                <button class="btn  btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
