@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($featuredProducts as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img square">
                                <label class="stock bg-success">New</label>
                                <a
                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                    @if ($productItem->productImages->count() > 0)
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
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
                                    <span class="selling-price">&#x20B9;{{ $productItem->selling_price }}</span>
                                    <span class="original-price">&#x20B9;{{ $productItem->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Featured Products Available</h4>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('/collections') }}" class="btn btn-warning px-3">Shop More..</a>
                </div>
            </div>
        </div>
    </div>
@endsection
