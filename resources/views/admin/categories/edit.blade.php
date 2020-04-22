@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <form action="{{ route('category.update', $category->id) }}" method="post" accept-charset="utf-8">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="textUrl" class="form-control-label">Title: </label>
                <input type="text" name="title" id="textUrl" class="form-control" value="{{ @$category->title}}">
                <p class="small"> {{ config('app.url') }} <span id="url">{{ @$category->slug}}</span></p>
                <input type="hidden" name="slug" id="slug" value="{{ @$category->slug}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="parent_id" class="form-control-label">Select Category: </label>
                <select name="parent_id" id="parent_id" class="form-control">
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" selected>{{ $cat->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#parent_id').select2({
                placeholder: "Select a Parent Category",
                allowClear : true,
                minimumResultsForSearch: Infinity
            });
        })
    </script>
@endsection
