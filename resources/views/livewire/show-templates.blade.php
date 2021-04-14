<div>
@if(count($templates) < 1)
    <div class="alert alert-warning" role="alert">
        Sorry, there is no saved emails in database
    </div>
@else
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">

        <tr>
            <th style="width: 5%">#ID</th>
            <th style="width: 25%">Name</th>
            <th style="width: 45%">Subject</th>
            <th style="width: 10%">Date</th>
            <th style="width: 15%"></th>
        </tr>
        <tbody>
            @foreach($templates as $template)
            <tr>
                <td>{{ $template->id }}</td>
                <td>{{ $template->name }}</td>
                <td>{{ $template->subject }}</td>
                <td>{{ date('d-m-Y', strtotime($template->created_at)) }}</td>
                <td>
                <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('templates.send', $template->id) }}"><i class="far fa-paper-plane"></i></a>


                        <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('templates.email', $template->id) }}"><i
                            class="fas fa-envelope"></i></a>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('templates.view', $template->id) }}"><i
                            class="far fa-eye"></i></a>
                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('templates.edit', $template->id) }}"><i
                            class="fas fa-pen"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $templates->links() }}
@endif
</div>