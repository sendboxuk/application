@extends('adminlte::page')
@section('title') Edit Service @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit a Service</h4>
                </div>
                <div class="card-body">

                    @livewire('edit-service', ['service' => $service])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop