<table width="100%">
    <tr>
        <td width="70%">
            <b>Products List</b>
        </td>
        <td width="30%">
            <b>Date: {{now()->toDateTimeString()}}</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%">
                <tr style="background: black; color: white">
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category Id</th>
                    <th>Product Weight</th>
                </tr>
                @foreach($products as $product)
                    <tr style="text-align: center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->weight}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
