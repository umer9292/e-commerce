<!-- edit order item modal -->
<div class="modal fade order_item_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit Order item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('order.item.update')}}" method="POST" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" id="order-id" name="order_id">
                    <input type="hidden" id="item-id" name="id">
                    <div class="form-group">
                        <label class="form-control-label">Title: </label>
                        <input type="text" class="form-control" id="title" name="title" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Quantity: </label>
                        <input type="number" class="form-control" id="quantity" name="quantity"/>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- customer email&phone edit modal -->
<div class="modal fade customer_edit_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="modalLabel">Update Customer Email&Phone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.update')}}" method="POST" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" id="order-id" name="order_id">
                    <input type="hidden" id="customer-id" name="customer_id">
                    <div class="form-group">
                        <label class="form-control-label">E-Mail: </label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Phone: </label>
                        <input type="text" class="form-control" id="phone" name="phone"/>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delivery address edit modal -->
<div class="modal fade delivery-address-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="modalLabel">Update Delivery Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('delivery.address.update')}}" method="POST" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" id="orderId" name="order_id">
                    <input type="hidden" id="customerId" name="customer_id">
                    <div class="form-group">
                        <label class="form-control-label">Address 1: </label>
                        <input type="text" class="form-control" id="addressOne" name="address_1" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Address 2: </label>
                        <input type="text" class="form-control" id="addressTwo" name="address_2"/>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
