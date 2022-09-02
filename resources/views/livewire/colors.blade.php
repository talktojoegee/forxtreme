<div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if($success)
                        <div class="alert alert-success">Your new product was added to the system.</div>
                    @endif
                    <form wire:submit.prevent="storeColor">
                        @csrf
                        <div class="form-group ">
                            <label for="">Choose Color</label>
                            <input type="color" wire:model="colorCode" class="form-control col-md-3">
                            @error('colorCode') <i class="text-danger">{{$message}}</i> @enderror
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
                <div class="card-header">Colors</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Color Code</th>
                                <th>Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($colors as $color)
                            <tr>
                                <th scope="row">{{$serial++}}</th>
                                <td>{{$color->color_code ?? '' }}</td>
                                <td>
                                    <span class="d-flex custom-circle" style="background: {{$color->color_code ?? '000'}}"></span>
                                </td>
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
