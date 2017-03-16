@extends('client.layouts.main')

@section('title', trans('general.email_mass_template'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('mycp.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.email_mass_template') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.email_mass_template') }}</a></li>
                        <li class="active">{{ trans('general.email_mass_templateCreate') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

    {!! Form::model($request,['url' => '/common/email_mass_template', 'class' => 'form-horizontal']) !!}





        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.addemail_mass_template') }}</span>
            </div>

            <div class="panel-body">




            
        <div class="row">
        <div class="form-group {{ $errors->has('email_group_id') ? 'has-error' : ''}}  col-xs-6">
            {!! Form::label('email_group_id', trans('general.email_group_id'), ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('email_group_id', null, ['class' => 'form-control']) !!}
                {!! $errors->first('email_group_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
                
        
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}  col-xs-6">
            {!! Form::label('name', trans('general.name'), ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>        
        <div class="row">
        <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}  col-xs-6">
            {!! Form::label('subject', trans('general.subject'), ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
                
        
        <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}  col-xs-6">
            {!! Form::label('body', trans('general.body'), ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('body', null, ['class' => 'form-control']) !!}
                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>        
        <div class="row">
        <div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}  col-xs-6">
            {!! Form::label('language', trans('general.language'), ['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('language', null, ['class' => 'form-control']) !!}
                {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
                

        </div>        
        <div class="row">

                






        <div class="form-group">
        <div class="col-sm-offset-9 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>

                </div>
            </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection