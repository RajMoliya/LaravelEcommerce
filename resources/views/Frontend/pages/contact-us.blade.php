@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>Other Contact Details</h3>
                <div class="footer-underline"></div>
                <div class="mb-2">
                    <p>
                    <h3>Location :</h3>
                    <i class="fa fa-map-marker"></i>
                    {{ $appSetting->address ?? '#444, some main road, some area, some street, bangalore, India - 560077' }}
                    </p>
                </div>
                <div class="mb-2">
                    <p>
                    <h3>Phone No :</h3>
                    <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? '1234567890' }}
                    </p>
                </div>
                <div class="mb-2">
                    <p href="">
                    <h3>Email :</h3>
                    <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'fundaofwebit@gmail.com' }}
                    </p>
                </div>
            </div>
            <div class="col-6">
                <h3 class="">Leave Your Message</h3>
                <form action="{{ url('/contactUs') }}" method="POST">
                    @csrf
                    <div class="col-6 mb-3">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Phone</label>
                        <input name="phone" type="text" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Message</label>
                        <textarea class="form-control" name="message" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div>
        <hr>
        <h1 class="text-center">Maps</h1>
        <iframe src="{{ $appSetting->map }}" width="1300" height="450" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
