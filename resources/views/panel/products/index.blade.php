@extends('adminlte::page')
@section('title') Products @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Products</h4>

                </div>
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col">
                            <a class="btn float-right btn-sm btn-primary" href="{{ route('products.create') }}">Add
                                Product</a>

                        </div>
                    </div>


                    @livewire('show-products')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection