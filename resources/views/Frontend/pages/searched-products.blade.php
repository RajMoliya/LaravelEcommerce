@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Search Results</h4>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($searchProducts as $productItem)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <a
                                            href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                            @if ($productItem->productImages->count() > 0)
                                                <img class="img-fluid"
                                                    style="border-radius: 20px;padding:3px ;height:220px ;"
                                                    src="{{ asset($productItem->productImages[0]->image) }}"
                                                    alt="{{ $productItem->name }}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
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
                                        <p style="height:45px; overflow:hidden">
                                            <b>Description :</b> {{ $productItem->description }}
                                        </p>
                                        <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                            class="btn btn-outline-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-10 p-2">
                        <h4>No Such Products Found</h4>
                    </div>
                @endforelse
                <div class="col-md-10">
                    {{ $searchProducts->appends(request()->input())->links() }}
                </div>
                <div class="text-center">
                    <a href="{{ url('/collections') }}" class="btn btn-warning px-3">View More..</a>
                </div>
            </div>
        </div>
    </div>
@endsection
