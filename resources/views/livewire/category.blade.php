<div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if($success)
                        <div class="alert alert-success">Your new category was added to the system.</div>
                    @endif
                    <form wire:submit.prevent="storeCategory">
                        @csrf
                        <div class="form-group ">
                            <label for="">Category</label>
                            <input type="text" wire:model="categoryName" placeholder="Category Name" class="form-control col-md-3">
                            @error('categoryName') <i class="text-danger">{{$message}}</i> @enderror
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
                <div class="card-header">Product Categories</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($categories as $cat)
                                <tr>
                                    <th scope="row">{{$serial++}}</th>
                                    <td>{{$cat->category_name ?? '' }}</td>
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
