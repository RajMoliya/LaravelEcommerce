@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach ($sliders as $key => $sliderItem)
                <div style="background-color: {{ $appSetting->theme_color }}"
                    class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div>
                        <span class="carousel-caption d-none d-md-block col-md-6">
                            <div class="custom-carousel-content">
                                <h1 class="move-up">
                                    {{ $sliderItem->title }}
                                </h1>
                                <p>
                                <p class="move-up">{{ $sliderItem->description }}</p>
                                </p>
                                <div class="move-up">
                                    <a href="#" class="btn btn-slider">
                                        Get Now
                                    </a>
                                </div>
                            </div>
                        </span>
                        <span class="col-md-6 float-end">
                            @if ($sliderItem->image)
                                <img class="move-up" src="{{ asset("$sliderItem->image") }}" class="d-block w-100"
                                    style="height: 450px;" alt="...">
                            @endif
                        </span>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Ecommerce</h4>
                    <div class="underline w-100"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis voluptate deleniti quasi dolor
                        nihil rem dolorem sit, sed, atque vitae aliquam qui autem explicabo soluta dicta accusantium
                        voluptas tenetur odit.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card" style="border-radius: 20px">
                                        <div class="product-card-img square">
                                            <label class="stock bg-success">New</label>
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                @if ($productItem->productImages->count() > 0)
                                                    <img class="img-fluid"
                                                        src="{{ asset($productItem->productImages[0]->image) }}"
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
                                                <span
                                                    class="selling-price">&#x20B9;{{ $productItem->selling_price }}</span>
                                                <span
                                                    class="original-price">&#x20B9;{{ $productItem->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('/new_arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                @if ($newArrivalsProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($newArrivalsProducts as $productItem)
                                <div class="item">
                                    <div class="product-card" style="border-radius: 20px">
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
                                                <span
                                                    class="selling-price">&#x20B9;{{ $productItem->selling_price }}</span>
                                                <span
                                                    class="original-price">&#x20B9;{{ $productItem->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('/featured') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($featuredProducts as $productItem)
                                <div class="item">
                                    <div class="product-card" style="border-radius: 20px">
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
                                                <span
                                                    class="selling-price">&#x20B9;{{ $productItem->selling_price }}</span>
                                                <span
                                                    class="original-price">&#x20B9;{{ $productItem->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script>
        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
