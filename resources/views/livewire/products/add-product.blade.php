<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Add New Product</div>
                <div class="card-body">
                    @if($success)
                        <div class="alert alert-success">Your new product was added to the system.</div>
                    @endif
                    <form wire:submit.prevent="storeProduct">
                        @csrf
                        <div class=" form-group">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input type="text" wire:model="productName" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
                            @error('productName') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class=" form-group col-md-5">
                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                            <input type="number" step="0.01" wire:model="price" class="form-control" id="exampleFormControlInput1" placeholder="Price ">
                            @error('price') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class="form-group mt-3 col-md-5">
                            <label for="">Category</label>
                            <select wire:model="category" multiple id="" class="form-control" multiple>
                                <option disabled selected>--Select category--</option>
                                <option value="1">Foot wears</option>
                                <option value="2">Wrist watches</option>
                            </select>
                            @error('category') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class="form-group mt-3 col-md-5">
                            <label for="">Color</label>
                            <select wire:model="color" id="" class="form-control">
                                <option disabled selected>--Select color--</option>
                                <option value="1">Red</option>
                                <option value="2">Yellow</option>
                            </select>
                            @error('color') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class="form-group mt-3 col-md-5">
                            <label for="">Size</label>
                            <select wire:model="size" id="" class="form-control">
                                <option disabled selected>--Select size--</option>
                                <option value="1">Medium</option>
                                <option value="2">XL</option>
                            </select>
                            @error('size') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class=" form-group mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Gallery</label> <br>
                            <input type="file" wire:model="gallery" multiple class="form-control-file" id="exampleFormControlInput1">
                            <br>
                            @error('gallery.*') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class="form-group">
                            @if(count($gallery) > 0)
                                Photo Preview:
                                @foreach ($gallery as $gall)
                                    <img src="{{ $gall->temporaryUrl() }}" width="64" height="64">
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Details</label>
                            <textarea class="form-control" wire:model="productDetails" placeholder="Product Details..." id="exampleFormControlTextarea1" rows="3"></textarea>
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
