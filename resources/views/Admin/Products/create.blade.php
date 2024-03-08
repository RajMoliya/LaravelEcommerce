@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Products
                            <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="pill"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="pill" data-bs-target="#seo"
                                        type="button" role="tab" aria-controls="seo" aria-selected="false">SEO
                                        Tags</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="pill"
                                        data-bs-target="#details" type="button" role="tab" aria-controls="details"
                                        aria-selected="false">Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="pill" data-bs-target="#image"
                                        type="button" role="tab" aria-controls="image" aria-selected="false">Product
                                        Image</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="color-tab" data-bs-toggle="pill" data-bs-target="#color"
                                        type="button" role="tab" aria-controls="color"
                                        aria-selected="false">Colors</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade boarder p-3 show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Category</label>
                                        <select name="category_id" class="form-control bg-white text-black">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Product Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Slug</label>
                                        <input type="text" name="slug" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Brands</label>
                                        <select name="brand" class="form-control bg-white text-black">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Small Description</label>
                                        <input type="text" name="small_description" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Description</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="seo" role="tabpanel"
                                    aria-labelledby="seo-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="details" role="tabpanel"
                                    aria-labelledby="details-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Original Price</label>
                                                <input type="text" name="original_price" class='form-control'>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Selling Price</label>
                                                <input type="text" name="selling_price" class='form-control'>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Quantity</label>
                                                <input type="text" name="quantity" class='form-control'>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Trending</label>
                                                <input type="checkbox" name="trending"
                                                    style="width = 50px ; height= 50px;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Featured</label>
                                                <input type="checkbox" name="featured"
                                                    style="width = 50px ; height= 50px;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Status</label>
                                                <input type="checkbox" name="status"
                                                    style="width = 50px ; height= 50px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="image" role="tabpanel"
                                    aria-labelledby="image-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Upload Image</label>
                                        <input type="file" name = "image[]" multiple class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="color" role="tabpanel"
                                    aria-labelledby="color-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 20px">Select Colors</label>
                                        <div class="row">
                                            @forelse ($colors as $color)
                                                <div class="col-md-3">
                                                    <div class="p-2 border-3 mb-3">
                                                        <input type="checkbox" name="colors[{{ $color->id }}]"
                                                            value="{{ $color->id }}">
                                                        {{ $color->name }} <br>
                                                        Quantity : <input type="number"
                                                            name="colorquantity[{{ $color->id }}]"
                                                            style="width:70px; border:1px solid; margin-top:10px">
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    <h2>No Colors Found</h2>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
