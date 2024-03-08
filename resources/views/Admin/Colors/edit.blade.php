@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Colors
                            <a href="{{ url('admin/colors') }}" class="btn btn-primary float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Color Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $color->name }}">
                            </div>
                            <div class="mb-3">
                                <label>Color Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $color->code }}">
                            </div>
                            <div class="mb-3">
                                <label style="margin-right: 20px">Status</label>
                                <input type="checkbox" name="status" {{ $color->status == '1' ? 'checked' : '' }}><br>
                                (Checked = 'Hidden' | Unchecked = 'Visible')
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
