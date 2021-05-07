@extends('adminlte::page')
@section('title') View Product Details @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> View Product Details</h4>
                </div>
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col">
                        <a class="btn float-right btn-sm btn-primary m-1"
                                href="{{ route('products.send', $product->id) }}">Send An
                                Email</a>

                            <a class="btn float-right btn-sm btn-primary m-1"
                                href="{{ route('products.edit', $product->id) }}">Edit
                                Product</a>
                            <a class="btn float-right btn-sm btn-primary m-1" href="{{ route('products.create') }}">Add
                            Product</a>
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Name:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Template:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $product->template->name }}
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Subject:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $product->template->subject }}
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Placeholders:
                        </div>
                        <div class="col-12 col-md-9">
                            {{$product->template->placeholders_list}}
                        </div>
                    </div>
                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            API Code:
                        </div>
                        <div class="col-12 col-md-9">
                            <pre>{!!  json_encode($json, JSON_PRETTY_PRINT) !!}</pre>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection