@extends('admin.layout')

@section('breadcrumbs')
    <link href="{{ asset('css/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('extra-css')
    <li class="breadcrumb-item"><a href="{{route('orderStatus.index')}}">Order Status</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Order Status</li>
@endsection

@section('content')
    @include('layouts.partials.message')
    <div class="card category-card">
        <div class="card-header">
            <h5 class="card-title">Create Category Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('orderStatus.store')}}" method="post" accept-charset="utf-8">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-control-label">Title: </label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-control-label">Color: </label>
                        <input type="text" class="form-control" name="color" id="simple-color-picker"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-control-label">Is paid: </label>
                        <select name="is_paid" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-control-label">Is delivered: </label>
                        <select name="is_delivered" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-control-label">Is active: </label>
                        <select name="is_active" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-control-label">Is deleted : </label>
                        <select name="is_deleted" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('extra-js')
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#simple-color-picker').colorpicker();
        });
    </script>
@endsection
