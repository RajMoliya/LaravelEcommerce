@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-white">
                        <div><img style="width: 100px; height:40px" src="{{ asset('uploads/logo/' . $appSetting->logo) }}"
                                alt="Logo" /></div>
                        <h4>Thank you for shopping with Us</h4>
                        <a href="{{ url('/collections') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
