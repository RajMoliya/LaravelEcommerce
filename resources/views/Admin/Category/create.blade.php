@extends('layouts.admin')

@section('content')
<div class='row'>
    <dvi class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-12 mb-3">
                            <h3>SEO Tags</h3><br>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </dvi>
</div>
@endsection