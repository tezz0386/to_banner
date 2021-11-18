@extends('layouts.admin-app')
@section('content')
<div class="row ml-5 mr-5">
    <div class="col-md-12 col-lg-12">
        @if(isset($banner))
        <form action="{{route('banner.update', $banner)}}" method="post" enctype="multipart/form-data">
            {{method_field('PATCH')}}
            @else
            <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card card-info">
                    <div class="card-header">
                        <h2 class="card-title">banner @if(isset($banner)) Update @else Addond @endif Form</h2>
                        <div class="float-right">Status: <input type="checkbox" name="status" data-bootstrap-switch value="1"   @if(isset($banner)) @if($banner->status) checked @else @endif @else checked @endif></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label>Banner Heading:</label>
                            <input type="text" name="heading" class="form-control form-control-sm" placeholder="Enter Your App Name" value="{{old('heading', @$banner->heading)}}">
                            @error('heading')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image:</label><br>
                            <label>
                                <img src="@if(isset($banner) && !$banner->image=='') {{asset('uploads/banners/thumbnail/'.$banner->image)}} @else {{asset('placeholder.png')}} @endif" id="iconThumbnail" height="500" width="700">
                                <input type="file" name="image" hidden="hidden" id="icon">
                            </label>
                            @error('image')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Summary:</label>
                            <textarea class="form-control" name="summary" style="height: 150px">{{old('summary', @$banner->summary)}}</textarea>
                            @error('summary')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right">@if(isset($banner)) Update @else Save @endif</button>
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
    $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    </script>
    @endpush