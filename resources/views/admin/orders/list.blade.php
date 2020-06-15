@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
@endsection
@section('content')
    @include('admin.modal')
    @include('layouts.partials.message')
    <div class="pb-2 mb-3 border-bottom">
        <h1 class="h2">Order List</h1>
    </div>
        <button class="btn btn-sm btn-outline-danger mb-2 float-right del_order_btn"> <i class="fas fa-trash-alt"></i> &nbsp; Delete </button>
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
                    <th class="text-success">@sortablelink('country')</th>
                    <th class="text-success">@sortablelink('price', 'total')</th>
                    <th class="text-success">@sortablelink('weight')</th>
                    <th class="text-success">@sortablelink('status')</th>
                    <th>Created (Updated)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($orders->count() > 0)
                    @foreach($orders as $order)
                        <tr data-toggle="collapse" data-target="#target{{$order->id}}" aria-expanded="false"
                            style="background-color: {{$order->orderStatus ? $order->orderStatus->color : 'blue'}};">
                            <td>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input checkbox">
                                </div>
                            </td>
                            <td><span class="badge badge-pill badge-success">Pris</span></td>
                            <td>{{$order->customer->first_name . ' ' . $order->customer->last_name}}</td>
                            <td>
                                <img src="{{url("flags/{$order->customer->country}.png")}}" alt="{{$order->customer->country}}">
                            </td>
                            <td><span class="badge badge-pill badge-success">{{floor($order->price)}}&nbsp;Rs</span></td>
                            <td>{{floor($order->weight)}}g</td>
                            <td>{{$order->orderStatus->title}}</td>
                            <td>{{getOnlyDate($order->created_at)}} ({{diff4Human($order->updated_at)}})</td>
                            <td>
                                <a href="" class="element" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="9">
                                <div class="collapse" id="target{{$order->id}}">
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="float-right">
                                                <select class="form-control order-status" name="status" order-no="{{$order->id}}">
                                                    <option selected hidden>Select Order Status</option>
                                                    @if(isset($orderStatus) && count($orderStatus) > 0)
                                                        @foreach($orderStatus AS $status)
                                                            <option value="{{$status->id}}" {{$status->id == $order->status_id ? 'selected' : null}} >
                                                                {{$status->title}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Art.no</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Price/pcs</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($order->orderitems) > 0)
                                                @foreach($order->orderitems as $item)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('product.show', $item->product_id)}}" target="_blank" class="text-info"> {{$item->product_id}}&nbsp;<i class="fas fa-info-circle"></i></a>
                                                        </td>
                                                        <td class="text-success"><b>{{$item->quantity}}&nbsp;PCS</b></td>
                                                        <td>{{$item->product()->title}}</td>
                                                        <td>{{floor($item->price)}} Rs</td>
                                                        <td>{{floor($item->weight)}}g</td>
                                                        <td>{{diff4Human($item->created_at)}}</td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn badge badge-pill badge-secondary order_item_btn"
                                                                data-order-id = "{{$order->id}}"
                                                                data-item-id = "{{$item->id}}"
                                                                data-title = "{{$item->product()->title}}"
                                                                data-quantity = "{{$item->quantity}}"
                                                            >
                                                                Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td colspan="9">
                                                    <strong>Payment Method: <span class="badge badge-success">Paypal</span></strong>
                                                    <br>
                                                    <strong>Market Place: <small class="badge badge-pill badge-success">Bhatti Town</small></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <b>Delivery Address:</b>
                                                    <a href="javascript:void(0)"
                                                       class="delivery_address_btn"
                                                       data-order-id="{{$order->id}}"
                                                       data-customer-id="{{$order->customer_id}}"
                                                       data-address-1="{{$order->customer->address_1}}"
                                                       data-address-2="{{$order->customer->address_2}}"
                                                    >
                                                        <i class="fas fa-edit text-success"></i>
                                                    </a><br>
                                                    <small>
                                                        {{ucwords($order->customer->first_name . ' ' . $order->customer->last_name)}} <br>
                                                        {{$order->customer->address_1}}<br>
                                                        {{$order->customer->address_2}}
                                                    </small>
                                                </td>
                                                <td colspan="1">
                                                    <b>Customer:</b>
                                                    <a href="javascript:void(0)"
                                                       class="customer_edit_btn"
                                                       data-order-id="{{$order->id}}"
                                                       data-customer-id="{{$order->customer_id}}"
                                                       data-email="{{$order->customer->email}}"
                                                       data-phone="{{$order->customer->phone}}"
                                                    >
                                                        <i class="fas fa-edit text-success"></i>
                                                    </a><br>
                                                    <table class="table">
                                                        <tr>
                                                            <td>E-Mail</td>
                                                            <td>{{$order->customer->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td>{{$order->customer->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>CelPhone</td>
                                                            <td>{{$order->customer->phone}}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td colspan="4">
                                                    <br>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Shipping</td>
                                                            <td>0 Rs</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td>{{floor($order->price)}}Rs</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Whereof tax</td>
                                                            <td>115Rs</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
        $(".del_order_btn").on('click', function () {

        });

        $(document).ready(function() {

            const orderItemEditBtn = $('.order_item_btn');
            const orderItemModal = $('.order_item_modal');
            const customerEditBtn = $('.customer_edit_btn');
            const customerModal = $('.customer_edit_modal');
            const deliveryAddressBtn = $('.delivery_address_btn');
            const deliveryAddressModal = $('.delivery-address-modal');
            const updateAddressForm = $('#addressForm');
            const updateCustomerForm = $('#customerForm');

            // update order item
            orderItemEditBtn.on('click', function () {
                var orderId = $('#order-id').val($(this).data('order-id'));
                var itemId = $('#item-id').val($(this).data('item-id'));
                var title = $('#title').val($(this).data('title'));
                var qty = $('#quantity').val($(this).data('quantity'));

                orderItemModal.modal();
            });

        // update customer email & phone

            customerEditBtn.on('click', function () {
                $('#order-id').val($(this).data('order-id'));
                $('#customer-id').val($(this).data('customer-id'));
                $('#email').val($(this).data('email'));
                $('#phone').val($(this).data('phone'));

                customerModal.modal();
            });

            updateCustomerForm.on('submit', function (e) {
                e.preventDefault();
                const formData = $(this).serialize(); // form data as string
                $.ajax({
                    url: "{{route('customer.update')}}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if(response.success) {
                            deliveryAddressModal.modal('hide');
                            location.reload();
                        }
                    },
                    error: function () {
                        swal("Error!", "Unable to update delivery address!", "error")
                    }
                });
            });

        // update delivery address

            deliveryAddressBtn.on('click', function () {
                $('#orderId').val($(this).data('order-id'));
                $('#customerId').val($(this).data('customer-id'));
                $('#addressOne').val($(this).data('address-1'));
                $('#addressTwo').val($(this).data('address-2'));

                deliveryAddressModal.modal('show');
            });

            updateAddressForm.on('submit', function (e) {
                e.preventDefault();
                const formData = $(this).serialize(); // form data as string
                $.ajax({
                    url: "{{route('delivery.address.update')}}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if(response.success) {
                            deliveryAddressModal.modal('hide');
                            location.reload();
                        }
                    },
                    error: function () {
                        swal("Error!", "Unable to update delivery address!", "error")
                    }
                });
            });
        });

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


        $('.order-status').change(function () {
            const orderId = $(this).attr('order-no');
            const selectedStatus = $(this).val();

            $.ajax({
                url: `{{url('admin/update-status')}}/${orderId}/${selectedStatus}`,
                type: "GET",
                dataType: 'json',
                success: function (response) {
                    if(response.success) {
                        window.location.reload();
                    }
                },
                error: function () {
                    swal("Error!", "Unable to update order status!", "error")
                }
            });
        });
    </script>
@endsection


