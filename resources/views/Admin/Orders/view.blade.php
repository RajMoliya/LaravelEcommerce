@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
    <div class='row'>
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"> My Order Detail</i>


                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                        <a href="{{ url('admin/invoice/' . $orders->id) }}" target="_blank"
                            class="btn btn-warning btn-sm float-end mx-1">View
                            Invoice</a>
                        <a href="{{ url('admin/invoice/' . $orders->id . '/generate') }}"
                            class="btn btn-success btn-sm float-end mx-1">Download Invoice</a>
                        <a href="{{ url('admin/invoice/' . $orders->id . '/mail') }}"
                            class="btn btn-info btn-sm float-end mx-1">Mail Invoice</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $orders->id }}</h6>
                            <h6>Tracking Id/No: {{ $orders->tracking_no }}</h6>
                            <h6>Order Created Date: {{ $orders->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment Mode: {{ $orders->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class='text-uppercase'>{{ $orders->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $orders->fullname }}</h6>
                            <h6>Email Id: {{ $orders->email }}</h6>
                            <h6>Phone: {{ $orders->phone }}</h6>
                            <h6>Address: {{ $orders->address }}</h6>
                            <h6>Pin Code: {{ $orders->pincode }}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-stiped">
                            <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($orders->orderItems as $orderItem)
                                    <tr>
                                        <td width='10%'>{{ $orderItem->id }}</td>
                                        <td width='10%'>
                                            @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if ($orderItem->productColor)
                                                <span> - Color :
                                                    {{ $orderItem->productColor->color->name }}
                                                </span>
                                            @endif
                                        </td>

                                        <td width='10%'>{{ $orderItem->price }}</td>
                                        <td width='10%'>{{ $orderItem->quantity }}</td>
                                        <td width='10%' class="fw-bold">
                                            &#8377;{{ $orderItem->quantity * $orderItem->price }}</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount : </td>
                                    <td colspan="1" class="fw-bold">&#8377;{{ $totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Proccess(Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Update Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in-progress"
                                            {{ Request::get('status') == 'in-progress' ? 'selected' : '' }}>In Progress
                                        </option>
                                        <option value="completed"
                                            {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="pending"
                                            {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="out-for-delivery"
                                            {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out
                                            for
                                            Delivery</option>
                                    </select>
                                    <button class="btn btn-primary text-white" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">
                                Current Order Status <span class="text-uppercase">{{ $orders->status_message }}</span>
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
