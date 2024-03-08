<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border " wire:ignore>
                        @if ($product->productImages)
                            {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100 png-bg-w"
                                alt="Img"> --}}
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $itemImg)
                                            <li><img src="{{ asset($itemImg->image) }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No Images Found
                        @endif

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">&#8377;{{ $product->selling_price }}</span>
                            <span class="original-price">&#8377;{{ $product->original_price }}</span>
                        </div>
                        <div class="color-stock">
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection"
                                            value="{{ $colorItem->id }}">
                                        {{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color : {{ $colorItem->color->code }}"
                                            wire:click ="colorSelected({{ $colorItem->id }})">{{ $colorItem->color->name }}</label>
                                    @endforeach
                                @endif
                                <div style="margin-top: 3px">
                                    @if ($this->productColorSelectedQuantity == 'outOfStock')
                                        <label class="label-stock bg-danger">OutOf Stock</label>
                                    @elseif ($this->productColorSelectedQuantity > 0)
                                        <label class="label-stock bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity > 0)
                                    <label class="label-stock bg-success">In Stock</label>
                                @else
                                    <label class="label-stock bg-danger">OutOf Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span wire:click = "decrementQuantity" class="btn btn1"><i
                                        class="fa fa-minus"></i></span>
                                <input wire:model.live = "quantityCount" readonly type="text" value="1"
                                    class="input-quantity" />

                                <span wire:click = "incrementQuantity" class="btn btn1"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click = 'addToCart({{ $product->id }})' class="btn btn1">
                                <span wire:loading.remove wire:target = "addToCart">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </span>
                                <span wire:loading wire:target = "addToCart"><i
                                        class="fa fa-shopping-cart"></i>Adding...</span>
                            </button>
                            <button type="button" wire:click = 'addToWishlist({{ $product->id }})' class="btn btn1">
                                <span wire:loading.remove wire:target = "addToWishlist">
                                    <i class="fa fa-heart"></i> Add To
                                    Wishlist
                                </span>
                                <span wire:loading wire:target = "addToWishlist"><i
                                        class="fa fa-heart"></i>Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });

        });
    </script>
@endpush
