@extends('adminlte::page')
@section('title') Templates @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Templates</h4>
                </div>
                <div class="card-body">
                <div class="row mb-2">
                        <div class="col">
                            <a class="btn float-right btn-sm btn-primary" href="{{ route('templates.create') }}">Add
                                Template</a>

                        </div>
                    </div>
                    @livewire('show-templates')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection