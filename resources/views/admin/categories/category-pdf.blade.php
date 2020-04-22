<table width="100%">
    <tr>
        <td width="70%">
            <b>Categories List</b>
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
                    <th>Category</th>
                    <th>Parent_id</th>
                </tr>
                @foreach($categories as $category)
                    <tr style="text-align: center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->parent_id}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
