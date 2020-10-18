@extends('adminlte::page')
@section('title') Upload and Send @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Upload and Send</h4>
                </div>
                <div class="card-body">
                    @livewire('upload-tool')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection