@extends('layouts.admin-app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner Lists</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                         <a href="{{route('banner.create')}}" class="btn btn-primary btn-sm ml-5"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Heading</th>
                            <th>Summary</th>
                            <th>Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($banners) && count($banners)>0)
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$banner->heading}}</td>
                            <td>{{$banner->summary}}</td>
                            <td>
                                @if($banner->status)
                                 Published
                                @else
                                 Unpublished
                                @endif
                            </td>
                            <td>
                                <a href="{{route('banner.edit', $banner)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('banner.destroy', $banner)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-link"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">
                                <center>No Record Found</center>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection