@extends('adminlte::page')
@section('title') Dashboard @parent @stop
@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-4 col-xs-4">
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{$count_templates}}</h3>

                    <p>Templates</p>
                </div>
                <div class="icon">
                    <i class="far fa-sticky-note"></i>
                </div>
                <a href="{{route('templates.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <div class="small-box bg-green">
                <div class="inner">
                <h3>{{$count_products}}</h3>

                    <p>Products &amp; Services</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
        <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$count_emails}}</h3>

                <p>Email Delivered</p>
              </div>
              <div class="icon">
              <i class="far fa-envelope-open"></i>
              </div>
              <a href="{{route('audit.emails')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div style="width:100%;">
                {!! $chartjs->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop