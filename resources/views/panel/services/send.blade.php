@extends('adminlte::page')
@section('title') Send a Service Email @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Send a Service Email</h4>
                </div>
                <div class="card-body">

                    @livewire('send-service-email', ['service' => $service])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop