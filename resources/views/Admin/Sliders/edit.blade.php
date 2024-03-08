@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Slider
                            <a href="{{ url('admin/sliders') }}" class="btn btn-primary float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset("$slider->image") }}" alt="Slider" width="60px" />
                            </div>
                            <div class="mb-3">
                                <label style="margin-right: 20px">Status</label>
                                <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : 'null' }}><br>
                                (Checked = 'Hidden' | Unchecked = 'Visible')
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
