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
                    <div class="row">

                        <div class="col-12">
                            <a class="btn btn-sm btn-primary float-right"
                                href="{{ route('audit.emails.resend', $result->id) }}">

                                <i class="fas fa-paper-plane"></i>
                                Send Email</a>
                        </div>
                    </div>

                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Transaction ID:
                        </div>
                        <div class="col-12 col-md-9">
                            {{ $result->transaction_id }}
                        </div>
                    </div>
                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Date
                        </div>
                        <div class="col-12 col-md-9">
                            {{ Carbon\Carbon::parse($result->created_at)->format('d M Y H:i') }}
                        </div>
                    </div>
                    <div class="row m-4 p-3 border border-top-0 border-left-0 border-right-0">
                        <div class="col-12 col-md-3">
                            Data
                        </div>
                        <div class="col-12 col-md-9">
                            <pre>{!! $result->request !!}</pre>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">

                            <tr>
                                <th style="width: 5%">#ID</th>
                                <th style="width: 15%">Recipient Email </th>
                                <th style="width: 35%">Subject</th>
                                <th style="width: 20%">Transaction Id</th>
                                <th style="width: 20%">Date</th>
                                <th style="width: 5%"></th>
                            </tr>
                            <tbody>
                                @foreach($emails as $audit)
                                <tr>
                                    <td>{{ $audit->id }}</td>
                                    <td>{{ $audit->to }}</td>
                                    <td>{{ $audit->subject }}</td>
                                    <td>{{ $audit->transaction_id }}</td>
                                    <td>{{ Carbon\Carbon::parse($audit->created_at)->format('d M Y H:i') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs float-right ml-1"
                                            href="{{ route('audit.emails.view', $audit->id) }}"><i
                                                class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection