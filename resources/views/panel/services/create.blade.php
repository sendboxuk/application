@extends('adminlte::page')
@section('title') Create Service @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Create a Service</h4>
                </div>
                <div class="card-body">
                    @livewire('create-service')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop