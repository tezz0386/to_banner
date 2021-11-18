@extends('layouts.admin-app')
@section('content')
<div class="row ml-5 mr-5">
    <ul class="list-unstyled">
        <a href="#">About Us</a>
    </ul>
    <div class="col-md-12 col-lg-12">
        @if(isset($setting))
        <form action="{{route('setting.update', $setting)}}" method="post" enctype="multipart/form-data">
            {{method_field('PATCH')}}
        @else
        <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
        @endif
        @csrf
            <div class="card card-info">
                <div class="card-header">
                    <h2 class="card-title">Setting @if(isset($setting)) Update @else Addond @endif Form</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>App Name:</label>
                                <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Your App Name" value="{{old('name', @$setting->name)}}">
                                @error('name')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Icon:</label><br>
                                        <label>
                                             <img src="@if(!$setting->icon=='') {{asset('uploads/setting/thumbnail/'.$setting->icon)}} @else {{asset('placeholder.png')}} @endif" id="iconThumbnail" height="100" width="150">
                                             <input type="file" name="icon" hidden="hidden" id="icon">
                                        </label>
                                        @error('icon')
                                        <span class="alert alert-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo:</label><br>
                                        <label>
                                            <img src="@if(!$setting->logo=='') {{asset('uploads/setting/thumbnail/'.$setting->logo)}} @else {{asset('placeholder.png')}} @endif" id="logoThumbnail"  height="100" width="150">
                                            <input type="file" name="logo" hidden="hidden" id="logo">
                                        </label>
                                        @error('logo')
                                        <span class="alert alert-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email Address" value="{{old('email', @$setting->email)}}">
                                @error('email')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control form-control-sm" placeholder="Enter Address" value="{{old('address', @$setting->address)}}">
                                @error('address')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Contact No:</label>
                                <input type="number" name="contact_no" class="form-control form-control-sm" placeholder="Enter Contact No" value="{{old('contact_no', @$setting->contact_no)}}">
                                @error('contact_no')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Location:</label>
                                <input type="text" name="location" class="form-control form-control-sm" placeholder="Enter Location in URL" value="{{old('location', @$setting->location)}}">
                                @error('location')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Quotation:</label>
                                <textarea name="quotation" class="form-control editor" style="height: 150px;">{{old('quotation', @$setting->quotation)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Facebook Link:</label>
                                <input type="text" name="facebook_link" class="form-control form-control-sm" placeholder="Enter facebook link in URL" value="{{old('facebook_link', @$setting->facebook_link)}}">
                                @error('facebook_link')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Twitter Link:</label>
                                <input type="text" name="twitter_link" class="form-control form-control-sm" placeholder="Enter Twitter Link in URL" value="{{old('twitter_link', @$setting->twitter_link)}}">
                                @error('twitter_link')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label>Google Link:</label>
                                <input type="text" name="google_link" class="form-control form-control-sm" placeholder="Enter Google Link in URL" value="{{old('google_link', @$setting->google_link)}}">
                                @error('google_link')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label>Youtube Link:</label>
                                <input type="text" name="youtube_link" class="form-control form-control-sm" placeholder="Enter Youtube Link in URL" value="{{old('youtube_link', @$setting->youtube_link)}}">
                                @error('youtube_link')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label>Linkedin Link:</label>
                                <input type="text" name="linkedin_link" class="form-control form-control-sm" placeholder="Enter Linkedin Link in URL" value="{{old('linkedin_link', @$setting->linkedin_link)}}">
                                @error('linkedin_link')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">@if(isset($setting)) Update @else Save @endif</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$('#icon').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#iconThumbnail").attr('src', image);
});
});
$('#logo').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#logoThumbnail").attr('src', image);
});
});
</script>
@endpush