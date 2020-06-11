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
