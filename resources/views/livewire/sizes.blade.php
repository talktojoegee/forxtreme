<div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if($success)
                        <div class="alert alert-success">Your new size was added to the system.</div>
                    @endif
                    <form wire:submit.prevent="storeSize">
                        @csrf
                        <div class="form-group ">
                            <label for="">Add Product Size</label>
                            <input type="text" placeholder="Product Size" wire:model="productSize" class="form-control col-md-3">
                            @error('productSize') <i class="text-danger">{{$message}}</i> @enderror
                        </div>
                        <div class="form-group mt-3 d-flex justify-content-end">
                            <button class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sizes</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Size</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($sizes as $size)
                                <tr>
                                    <th scope="row">{{$serial++}}</th>
                                    <td>{{$size->size ?? '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
