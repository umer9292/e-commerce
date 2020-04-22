@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="card category-card">
        <div class="card-header">
            <h5 class="card-title">Create Category Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post" accept-charset="utf-8">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="textUrl" class="form-control-label">Title: </label>
                        <input type="text" name="title" id="textUrl" class="form-control">
                        <p class="small"> {{ config('app.url') }} <span id="url"></span></p>
                        <input type="hidden" name="slug" id="slug" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="parent_id" class="form-control-label">Select Category: </label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                @endforeach
                            @endif
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
    <script type="text/javascript">
        $(function () {
            $('#textUrl').on('keyup', function () {
                var url = slugify($(this).val());
                $('#url').html(url);
                $('#slug').val(url);
            });

            $('#parent_id').select2({
                placeholder: "Select a Sub-Category",
                allowClear : true,
                minimumResultsForSearch: Infinity
            });
        })
    </script>
@endsection
