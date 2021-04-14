@extends('adminlte::page')
@section('title') Edit Email Template @parent @stop
@section('css')
<style type="text/css" media="screen">
#editor {
    border: 1px solid lightgray;
    margin: auto;
    height: 600px;
    width: 96%;
}
</style>
@stop
@section('content')

<div class="content">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Email Template for {{ $template->name }}</h4>
                    <button class="btn btn-primary save float-right" type="button">Save Template</button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success sucess" role="alert" style="display: none">
                        Template Updated!
                    </div>

                    <div class="alert alert-warning error" role="alert" style="display: none">
                        Can't update the template!
                    </div>
                    <pre id="editor">{{$content}}</pre>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/js/ace/ace.js"></script>
<script>
var editor = ace.edit("editor", {
    autoScrollEditorIntoView: true,
    minLines: 20
});
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/html");

editor.session.on('change', function(delta) {
    // delta.start, delta.end, delta.lines, delta.action
});


$('.save').on('click', function() {
    var content = editor.getValue();
    var req = {
        content
    }

    $.ajax({
        type: "POST",
        url: '{!! route('templates.save_email', $template->id) !!}',
        data: JSON.stringify(req),
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        success: function(data) {
            $('.sucess').show();
            $('.error').hide();
            $('.alert').fadeOut( 3000);
        },
        error: function(xhr, textStatus, error) {
            $('.sucess').hide();
            $('.error').show();
            $('.alert').fadeOut( "slow");
        }

    });

});
</script>
@stop