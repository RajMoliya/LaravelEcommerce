@extends('layouts.admin')

@section('content')
    <div class='row'>
        <dvi class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $c->id . '/update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" value="{{ $c->name }}" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" value="{{ $c->slug }}" name="slug" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Description</label>
                                <input type="text" value="{{ $c->description }}" name="description" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Image</label>
                                <input type="file" name='image' class="form-control">
                                <img src="{{ asset('/uploads/category/' . $c->image) }}" width="60px" />
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status" {{ $c->status == '1' ? 'checked' : 'null' }} />
                            </div>
                            <div class="col-md-12 mb-3">
                                <h3>SEO Tags</h3><br>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Title</label>
                                <input type="text" value="{{ $c->meta_title }}" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <input type="text" value="{{ $c->meta_keyword }}" name="meta_keyword"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <input type="text" value="{{ $c->meta_description }}" name="meta_description"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </dvi>
    </div>
@endsection
