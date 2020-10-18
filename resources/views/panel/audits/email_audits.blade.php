@extends('adminlte::page')
@section('title') Email Audits @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Email Audits</h4>
                </div>
                <div class="card-body">

                    @livewire('email-audit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection