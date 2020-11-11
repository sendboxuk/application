<div>
    @if(count($products) < 1) <div class="alert alert-warning" role="alert">
        Sorry, there is no saved emails in database
</div>
@else
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 5%">#ID</th>
                <th style="width: 35%">Name</th>
                <th style="width: 20%">SKU</th>
                <th style="width: 25%">Template</th>
                <th style="width: 20%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->template->name }}</td>
                <td>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('products.send', $product->id) }}"><i class="far fa-paper-plane"></i></a>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('products.view', $product->id) }}"><i class="fas fa-eye"></i></a>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('products.edit', $product->id) }}"><i class="fas fa-pen"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $products->links() }}
@endif
</div>