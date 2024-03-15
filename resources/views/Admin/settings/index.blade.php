@extends('layouts.admin')

@section('title', 'Admin Settings')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $setting->theme_color }}">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Wensite URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3">{{ $setting->meta_keywords ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Theme Color</label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-row nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold"
                                            id="pickColorTab-tab" data-bs-toggle="pill" data-bs-target="#pickColorTab"
                                            type="button" role="tab" aria-controls="pickColorTab"
                                            aria-selected="true">Pick
                                            Color</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="enterColorTab-tab"
                                            data-bs-toggle="pill" data-bs-target="#enterColorTab" type="button"
                                            role="tab" aria-controls="enterColorTab" aria-selected="false">Enter
                                            Color</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="pickColorTab" role="tabpanel"
                                            aria-labelledby="pickColorTab-tab" tabindex="0">
                                            <button wire:click="colorPicker" wire:loading.attr="disabled" type="button">
                                                <span wire:loading.remove wire:target="colorPicker">
                                                    Pick Color
                                                </span>
                                                <input style="width: 100px; height: 50px;" type="color"
                                                    name="picker_color" value="{{ $setting->theme_color ?? '#000000' }}"
                                                    class="form-control">
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="enterColorTab" role="tabpanel"
                                            aria-labelledby="enterColorTab-tab" tabindex="0">
                                            <input wire:click="enterColor" wire:loading.attr="disabled" type="text"
                                                name="text_color"
                                                class="form-control">{{ $setting->theme_color ?? '#000000' }}</input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label style="margin-bottom: 8px">Upload Logo</label>
                                <input type="file" name = "logo" multiple class="form-control">
                                @if ($setting->logo)
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('uploads/logo/' . $setting->logo) }}"
                                                style="width:80px ; height:80px" class="me-4 boarder" alt="Img">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $setting->theme_color }}">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1</label>
                                <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 2</label>
                                <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email 1</label>
                                <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email 2</label>
                                <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Map Url</label>
                                <input type="text" name="map" value="{{ $setting->map ?? '' }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $setting->theme_color }}">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (Optional)</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (Optional)</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (Optional)</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>YouTube (Optional)</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection
