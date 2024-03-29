@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <section class="container-fluid"></section>
    <div>
        <h2 class="text-center mb-3 mt-3">About Us</h2>
    </div>
    <hr>
    <div class="row mb-3 mt-3">

        <div class="col-6" style="padding: 30px">
            <h4 class="text-center">Welcome to Ecommerce</h4>
            <div class="underline w-100"></div>At [Company Name], our mission is to revolutionize the way people interact
            with technology. We
            believe in harnessing the power of innovation to create products and solutions that simplify complexities and
            enhance everyday experiences. Our team is driven by a passion for pushing boundaries and exploring new
            possibilities in the ever-evolving landscape of technology.

            We strive to develop cutting-edge solutions that address real-world challenges while staying committed to
            sustainability and ethical practices. Our dedication to excellence drives us to continuously improve and adapt
            to the changing needs of our customers and the world around us.

            With a focus on creativity, integrity, and collaboration, we aim to be a trusted partner for individuals and
            businesses alike, providing them with the tools they need to thrive in the digital age. By staying true to our
            core values and embracing diversity and inclusivity, we are committed to making a positive impact on society and
            shaping a brighter future for generations to come.
        </div>
        <div class="col-6" style="padding: 30px">
            <img class="img-fluid" style="border-radius: 7px"
                src="https://cdn.pixabay.com/photo/2015/01/09/02/45/laptop-593673_1280.jpg" alt="">
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6" style="padding: 30px">
            <img class="img-fluid" style="width: 100%;height:100% ; border-radius: 7px"
                src="{{ asset('uploads/images/download (1).jpg
                                                                                ') }}"
                alt="">
        </div>
        <div class="col-6" style="padding: 30px">
            <h4 class="text-center">Why Us</h4>
            <div class="underline w-100"></div>At [Company Name], our mission is to revolutionize the way people interact
            with technology. We
            believe in harnessing the power of innovation to create products and solutions that simplify complexities and
            enhance everyday experiences. Our team is driven by a passion for pushing boundaries and exploring new
            possibilities in the ever-evolving landscape of technology.

            We strive to develop cutting-edge solutions that address real-world challenges while staying committed to
            sustainability and ethical practices. Our dedication to excellence drives us to continuously improve and adapt
            to the changing needs of our customers and the world around us.

            With a focus on creativity, integrity, and collaboration, we aim to be a trusted partner for individuals and
            businesses alike, providing them with the tools they need to thrive in the digital age. By staying true to our
            core values and embracing diversity and inclusivity, we are committed to making a positive impact on society and
            shaping a brighter future for generations to come.
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6" style="padding: 30px">
            <h4 class="text-center">Templete for Quality and Variety</h4>
            <div class="underline w-100"></div>At [Company Name], our mission is to revolutionize the way people interact
            with technology. We
            believe in harnessing the power of innovation to create products and solutions that simplify complexities and
            enhance everyday experiences. Our team is driven by a passion for pushing boundaries and exploring new
            possibilities in the ever-evolving landscape of technology.

            We strive to develop cutting-edge solutions that address real-world challenges while staying committed to
            sustainability and ethical practices. Our dedication to excellence drives us to continuously improve and adapt
            to the changing needs of our customers and the world around us.

            With a focus on creativity, integrity, and collaboration, we aim to be a trusted partner for individuals and
            businesses alike, providing them with the tools they need to thrive in the digital age. By staying true to our
            core values and embracing diversity and inclusivity, we are committed to making a positive impact on society and
            shaping a brighter future for generations to come.
        </div>
        <div class="col-6" style="padding: 30px">
            <img style="width: 100%;height:100% ; border-radius: 7px" src="{{ asset('uploads/images/ss.jpg') }}"
                alt="">
        </div>
    </div>
@endsection
