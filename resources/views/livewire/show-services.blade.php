<div>
    @if(count($services) < 1) <div class="alert alert-warning" role="alert">
        Sorry, there is no services
</div>
@else
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 5%">#ID</th>
                <th style="width: 35%">Name</th>
                <th style="width: 25%">Template</th>
                <th style="width: 20%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->template->name }}</td>
                <td>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('services.send', $service->id) }}"><i class="far fa-paper-plane"></i></a>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('services.view', $service->id) }}"><i class="fas fa-eye"></i></a>

                    <a class="btn btn-primary btn-xs float-right ml-1"
                        href="{{ route('services.edit', $service->id) }}"><i class="fas fa-pen"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $services->links() }}
@endif
</div>