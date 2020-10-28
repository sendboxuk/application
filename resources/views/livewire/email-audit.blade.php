<div>
@if(count($audits) < 1)
    <div class="alert alert-warning" role="alert">
        Sorry, there is no saved emails in database
    </div>
@else
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">

        <tr>
            <th style="width: 5%">#ID</th>
            <th style="width: 15%">Receipt </th>
            <th style="width: 35%">Subject</th>
            <th style="width: 20%">Transaction Id</th>
            <th style="width: 20%">Date</th>
            <th style="width: 5%"></th>
        </tr>
        <tbody>
            @foreach($audits as $audit)
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
{{ $audits->links() }}
@endif
</div>