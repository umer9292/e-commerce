@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Categories</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('category.export.pdf')}}" class="btn btn-sm btn-outline-danger mr-1">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <a href="{{route('category.create')}}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>
    </div>

    <table class="table table-dark table-hover text-center">
        <thead>
            <tr class="text-muted">
                <th>No</th>
                <th>Title</th>
                <th>Parent Id</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->count() > 0)
                @foreach($categories as $category)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$category->title}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('category.edit', $category->id)}}" class="element btn btn-outline-success btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {!! Form::open(['route' =>  ['category.destroy', $category->id], 'method' => 'POST']) !!}
                                    @method('DELETE')
                                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm element', 'data-placement' => 'top', 'title' => 'Delete']) }}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    {{$categories->links()}}
@endsection
