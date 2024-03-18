@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container-fluid">
        <div class="row" style="background-color: rgb(238, 231, 231)">
            <div class="col-6">
                <center>

                    <h3 style="margin-top: 15px ;margin-left:30px" class="mb-4">Other Contact Details</h3>
                    <div class="footer-underline"></div>
                    <div class="mb-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis consequuntur, odio
                            doloribus quidem dignissimos. Deserunt fuga labore nam! Quasi voluptatem quod reiciendis ullam,
                            eligendi perspiciatis aspernatur eveniet laborum earum!</p>

                    </div>
                    <div class="mb-4">
                        <p>
                            {{-- <h3>Phone No :</h3> --}}
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? '1234567890' }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <p href="">
                            {{-- <h3>Email :</h3> --}}
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'fundaofwebit@gmail.com' }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <p>
                            {{-- <h3></h3> --}}
                            <i class="fa fa-map-marker"></i>
                            {{ $appSetting->address ?? '#444, some main road, some area, some street, bangalore, India - 560077' }}
                        </p>
                    </div>
                </center>

            </div>
            <div class="col-6">
                <div style="margin-right:100px;margin-left:100px">
                    <h3 style="margin-top: 15px " class="mb-3">Leave Your Message</h3>
                    <form action="{{ url('/contactUs') }}" method="POST">
                        @csrf
                        <div class="col-6 mb-3 w-100">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="col-6 mb-3 w-100">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                        <div class="col-6 mb-3 w-100">
                            <label>Message</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                            <div class="text-center mt-3">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
    <div>
        <iframe class="w-100" src="{{ $appSetting->map }}" height="450" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
