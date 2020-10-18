<div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">

        <tr>
            <th style="width: 5%">#ID</th>
            <th style="width: 40%">Name</th>
            <th style="width: 20%">SKU</th>
            <th style="width: 25%">Template</th>
            <th style="width: 15%"></th>
        </tr>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->template->name }}</td>
                <td>
 
                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('products.edit', $product->id) }}"><i
                            class="fas fa-pen"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $products->links() }}
</div>