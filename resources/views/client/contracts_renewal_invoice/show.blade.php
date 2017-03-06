@extends('client.layouts.main')
@section('title', trans('general.contracts_renewal_invoice'))
@section('content')





        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{'/assets/'.config('mycp.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ trans('general.contracts_renewal_invoice') }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">{{ trans('general.contracts_renewal_invoice') }}</a></li>
                            <li class="active">{{ trans('general.details') }}</li>
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


                        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.contracts_renewal_invoiceInfo') }}</span>
            </div>

            <div class="panel-body">


                                <div class="row">                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.contracts') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{(isset($contracts_renewal_invoice->contracts->name))? $contracts_renewal_invoice->contracts->name:'' }}</label>
                        </div>
                    </div>

                    
                                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.contracts_renewal') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{(isset($contracts_renewal_invoice->contracts_renewal->to_date))? $contracts_renewal_invoice->contracts_renewal->price.' ( '.$contracts_renewal_invoice->contracts_renewal->to_date .' ) ':'' }} </label>
                        </div>
                    </div>

                    </div>
                <div class="row">                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.invoice') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{(isset($contracts_renewal_invoice->invoice->name))? $contracts_renewal_invoice->invoice->name:'' }}</label>
                        </div>
                    </div>

                    
                                    <div class="col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('general.description') }}  </label>
                        </div>
                    </div>

                    <div class="col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$contracts_renewal_invoice['description'] }}</label>
                        </div>
                    </div>

                    </div>




                    <div class="row">

                        <div class="col-xs-offset-6 col-xs-3">


                            <a href="/client/contracts_renewal_invoice/{{ $contracts_renewal_invoice['id'] }}/edit"
                               class="fa fa-edit btn btn-primary form-control"> {{trans('general.edit')}}</a>
                        </div>
                        <div class=" col-xs-3">
                            {!! Form::open(['method' => 'DELETE',
                    'url' => ['/client/contracts_renewal_invoice',$contracts_renewal_invoice['id']]]) !!}
                            <button type="submit" name="Delete" class="deleteRow  btn btn-danger form-control" >
                                <i class="fa fa-trash"></i>
                                {{trans('general.delete')}}
                            </button>
                            {!! Form::close() !!}
                        </div>

                    </div>


                </div>
                <!-- row -->
            </div>




            <div class="panel-footer text-right">
                {{--<a href="{{ route('/client/product_list') }}">--}}
                    {{--<button type="submit" class="btn btn-primary"--}}
                            {{--name="edit_id">{{ trans('accounts::accounts.edit') }}</button>--}}
                {{--</a>--}}
            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@stop