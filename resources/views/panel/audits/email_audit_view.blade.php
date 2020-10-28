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
                <div class="row">
                        
                        <div class="col-12">
                            <a target="_blank" class="btn btn-sm btn-primary float-right"
                                href="{{ route('audit.emails.render_mail', $email->id) }}">

                                <i class="fas fa-envelope "></i>
                                View Email</a>
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Receipt
                        </div>
                        <div class="col-12 col-md-9">
                            {{$email->to}}
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Subject:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $email->subject }}
                        </div>
                    </div>
                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Transaction ID:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $email->transaction_id }}
                        </div>
                    </div>
                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Date
                        </div>
                        <div class="col-12 col-md-9">
                            {{ Carbon\Carbon::parse($email->created_at)->format('d M Y H:i') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection