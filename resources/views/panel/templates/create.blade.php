@extends('adminlte::page')
@section('title') Create a Template @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Create a Template</h4>
                </div>
                <div class="card-body">

                    @livewire('create-template')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop