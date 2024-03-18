<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model.live="brandsInput"
                                    value="{{ $brandItem->name }}">{{ $brandItem->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" wire:model.live="priceInput" value="high-to-low">High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model.live="priceInput" value="low-to-high">Low to High
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">


            {{-- If your happiness depends on money, you will never be happy with yourself. --}}

            <div class="row">
                @forelse($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img square">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">OutOf Stock</label>
                                @endif
                                <a
                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                    @if ($productItem->productImages->count() > 0)
                                        <img class="p-2" src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}">
                                    @endif
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->findBrand->name }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">&#8377;{{ $productItem->selling_price }}</span>
                                    <span class="original-price">&#8377;{{ $productItem->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>No Products Available for {{ $category->name }}</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
