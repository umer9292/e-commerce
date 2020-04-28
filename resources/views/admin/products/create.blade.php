@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="card bg-light">
        <div class="card-header">
            <h3>Create Product Form</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="textUrl">Product Name: </label>
                    <input type="text" name="title" id="textUrl" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="" class="form-control-label">Price: </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PKR</span>
                            </div>
                            <input type="text" class="form-control" name="price" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="discount">Discount: </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input type="text" class="form-control" name="discount" id="discount" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="productWeight">Weight: </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">G</div>
                            </div>
                            <input type="text" name="weight" class="form-control" placeholder="Product weight in grams">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <select name="category_id" class="form-control">
                            <option selected hidden>Select Category</option>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select name="status" class="form-control">
                            <option value="" selected hidden>Select a status</option>
                            <option value="0">Pending</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="file" name="product_image" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label for="editor">Product Description: </label>
                    <textarea name="description" id="editor" class="form-control" rows="10" ></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-primary"style="border-radius: 20px !important;" name="submit">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')
    <script type="text/javascript">
        $(function () {
            ClassicEditor.create( document.querySelector( '#editor' ), {
                // toolbar: [ 'Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ],
            }).then( editor => {
                console.log( editor );
            }).catch( error => {
                console.error( error );
            });

            // $('#thumbnail').on('change', function () {
            //     var file = $(this).get(0).files;
            //     var reader = new FileReader();
            //     reader.readAsDataURL(file[0]);
            //     reader.addEventListener("load", function (e) {
            //         var image = e.target.result;
            //         $('#imgthumbnail').attr('src', image);
            //     })
            // });

        })
    </script>
@endsection
