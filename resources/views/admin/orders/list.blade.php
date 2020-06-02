@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="pb-2 mb-3 border-bottom">
        <h1 class="h2">Order List</h1>
    </div>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input " id="select_all">
                    </div>
                </th>
                <th></th>
                <th>Customer</th>
                <th class="text-success">@sortablelink('Country')</th>
                <th class="text-success">@sortablelink('Total')</th>
                <th class="text-success">@sortablelink('Weight')</th>
                <th class="text-success">@sortablelink('Status')</th>
                <th>Created (Updated)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @if($orders->count() > 0)
                    @foreach($orders as $order)
                        <tr style="background-color: {{$order->orderStatus ? $order->orderStatus->color : 'blue'}};">
                            <td>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input checkbox">
                                </div>
                            </td>
                            <td><span class="badge badge-pill badge-success">Pris</span></td>
                            <td>{{$order->customer->first_name . ' ' . $order->customer->last_name}}</td>
                            <td>{{$order->customer->country}}</td>
                            <td><span class="badge badge-pill badge-success">{{$order->price}}Rs</span></td>
                            <td>{{$order->weight}}g</td>
                            <td>{{$order->orderStatus->title}}</td>
                            <td>{{getOnlyDate($order->created_at)}} ({{diff4Human($order->updated_at)}})</td>
                            <td>
                                <a href="" class="element" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">
                            <div class="alert alert-info" role="alert">
                                <b><i class="fas fa-info fa-2x"></i> Info - </b> Orders is Not found!
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{$orders->links()}}
        {!! $orders->appends(\Request::except('page'))->render() !!}
@endsection

@section('extra-js')
    <script type="text/javascript">
        swal("Hello world!");
        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function(){ //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });
    </script>
@endsection


