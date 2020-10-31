@extends('adminlte::page')
@section('title') Update Settings @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Update Settings</h4>
                </div>
                <div class="card-body">
                    <form autocomplete="off" role="form" action="{{ route('settings.regenerate-token') }}" method="post">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="form-group {!! $errors->first('api_token', 'has-warning') !!}">
                            <label for="api_token">Your Api Key</label>
                            <input type="text" class="form-control" id="api_token" name="api_token" autocomplete="off"
                                value="{{{ (session('session-token') ? session('session-token') : '******************************************' ) }}}">
                            {!!
                            $errors->first('api_token', '<span class="help-block">:message</span>') !!}
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm  float-right">
                            <i class="fas fa-sync-alt"></i> <span class="align-middle"><strong>Re-Generate Api
                                    Key</strong></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type='text/javascript'>

</script>
@stop