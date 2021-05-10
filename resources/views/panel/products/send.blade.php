@extends('adminlte::page')
@section('title') Send a Product Email @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Send a Product Email</h4>
                </div>
                <div class="card-body">
                    @livewire('send-product-email', ['product' => $product])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop