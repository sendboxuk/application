@extends('adminlte::page')
@section('title') Api Audits @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Api Audits</h4>
                </div>
                <div class="card-body">
                    @livewire('api-audit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection