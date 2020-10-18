@extends('adminlte::page')
@section('title') Edit a Template @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit a Template</h4>
                </div>
                <div class="card-body">

                    @livewire('edit-template', ['template' => $template])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop