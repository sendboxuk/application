@extends('adminlte::page')
@section('title') Update Profile @parent @stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Update Profile</h4>
                </div>
                <div class="card-body">

                    <form autocomplete="off" role="form" action="{{ route('profile.update') }}" method="post">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="form-group {!! $errors->first('name', 'has-warning') !!}">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                value="{{{ old('name', isset($user) ? $user->name : null) }}}"> {!!
                            $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {!! $errors->first('email', 'has-warning') !!}">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" autocomplete="off"
                                value="{{{ old('email', isset($user) ? $user->email : null) }}}"> {!!
                            $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {!! $errors->first('password', 'has-warning') !!}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" /> {!!
                            $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {!! $errors->first('password_confirmation', 'has-warning') !!}">
                            <label for="password_confirmation">Password confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" /> {!! $errors->first('password_confirmation', '<span
                                class="help-block">:message</span>') !!}
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm   float-right">
                            <i class="far fa-save"></i>
                            <strong>Update</strong>
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