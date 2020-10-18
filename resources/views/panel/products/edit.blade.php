@extends('adminlte::page')
@section('title') Edit Product @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit a Product</h4>
                </div>
                <div class="card-body">

                    @livewire('edit-product', ['product' => $product])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop