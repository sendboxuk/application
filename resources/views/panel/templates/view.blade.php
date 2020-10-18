@extends('adminlte::page')
@section('title') View Template Details @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> View Template Details</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-3">
                            Name:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $template->name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3">
                            File Name:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $template->filename }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3">
                            Subject:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $template->subject }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3">
                        Placeholders:
                        </div>
                        <div class="col-12 col-md-9">
                            {{$template->placeholders_list}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection