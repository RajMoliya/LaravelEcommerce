@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-header">
                        <h3>Edit Products
                            <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/products/' . $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                        type="button" role="tab" aria-controls="color" aria-selected="false">Product
                                        Colors</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade boarder p-3 show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Category</label>
                                        <select name="category_id" class="form-control bg-white text-black">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Product Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            value="{{ $product->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Brands</label>
                                        <select name="brand" class="form-control bg-white text-black">
                                            @foreach ($brands as $brand)
                                                <option
                                                    value="{{ $brand->name }}"{{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Small Description</label>
                                        <input type="text" name="small_description" class="form-control"
                                            value="{{ $product->small_description }}">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Description</label>
                                        <input type="text" name="description" class="form-control"
                                            value="{{ $product->description }}">
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="seo" role="tabpanel"
                                    aria-labelledby="seo-tab">
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            value="{{ $product->meta_title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"
                                            value="{{ $product->meta_keyword }}">
                                    </div>
                                    <div class="mb-3">
                                        <label style="margin-bottom: 8px">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control"
                                            value="{{ $product->meta_description }}">
                                    </div>
                                </div>
                                <div class="tab-pane fade boarder p-3" id="details" role="tabpanel"
                                    aria-labelledby="details-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Original Price</label>
                                                <input type="text" name="original_price" class='form-control'
                                                    value="{{ $product->original_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Selling Price</label>
                                                <input type="text" name="selling_price" class='form-control'
                                                    value="{{ $product->selling_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px">Quantity</label>
                                                <input type="text" name="quantity" class='form-control'
                                                    value="{{ $product->quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Trending</label>
                                                <input type="checkbox" name="trending"
                                                    style="width = 50px ; height= 50px;"
                                                    {{ $product->trending == '1' ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Featured</label>
                                                <input type="checkbox" name="featured"
                                                    style="width = 50px ; height= 50px;"
                                                    {{ $product->featured == '1' ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="margin-bottom: 8px;margin-right:10px">Status</label>
                                                <input type="checkbox" name="status"
                                                    style="width = 50px ; height= 50px;"
                                                    {{ $product->status == '1' ? 'checked' : '' }}>
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
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}"
                                                        style="width:80px ; height:80px" class="me-4 boarder"
                                                        alt="Img">
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade boarder p-3" id="color" role="tabpanel"
                                    aria-labelledby="color-tab">
                                    <div class="mb-3">
                                        <h4 style="margin-bottom: 20px">Select Colors :</h4>
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
                                    <div class="mb-3">
                                        <h4 style="margin-bottom: 20px">Update Colors :</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Color Name</th>
                                                        <th>Quantity</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product->productColors as $prodColor)
                                                        <tr class="prod-color-tr">
                                                            <td>
                                                                @if ($prodColor->color)
                                                                    {{ $prodColor->color->name }}
                                                                @else
                                                                    No Color Found
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <input type="text"
                                                                        value="{{ $prodColor->quantity }}"
                                                                        class="productColorQuantity form-control-sm"
                                                                        style="width:100px">
                                                                    <button type="button" value="{{ $prodColor->id }}"
                                                                        class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" value="{{ $prodColor->id }}"
                                                                    class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function() {

                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

                if (qty <= 0) {
                    alert('Quantity is Required');
                    return false;
                };

                var data = {
                    'product_id': product_id,
                    'qty': qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                })
            });

            $(document).on('click', '.deleteProductColorBtn', function() {

                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)
                    }
                })
            });
        });
    </script>
@endsection
