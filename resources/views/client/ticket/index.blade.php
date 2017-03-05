@extends('client.layouts.main')
@section('title', trans('general.ticket'))

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('mycp.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.ticket') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.ticket') }}</a></li>
                        <li class="active">{{ trans('general.ticket') }}</li>
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



                        @include('client.partials.messages')

                        <div class=" col-xs-9">
                            <h3 class="box-title m-b-0">{{ trans('general.ticketTableHead') }}</h3>
                            <p class="text-muted m-b-20">{{ trans('general.ticketTableDescription') }}</p>



                        </div>
                        <div class="col-xs-3">
                            <a  href="{{route('client.ticket.create')}}"class="btn btn-primary form-control">
                                + {{trans('general.ticketCreate')}}
                            </a>
                        </div>

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>


                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
                                        {!! th_sort(trans('general.id'), 'id', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">
                                        {!! th_sort(trans('general.contacts'), 'contact_id', $oResults) !!}
                                    </th>

                                                                    {{--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">--}}
                                        {{--{!! th_sort(trans('general.contract_id'), 'contract_id', $oResults) !!}--}}
                                    {{--</th>--}}

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                                        {!! th_sort(trans('general.name'), 'name', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">
                                        {!! th_sort(trans('general.type'), 'type', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">
                                        {!! th_sort(trans('general.status'), 'status', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">
                                        {!! th_sort(trans('general.description'), 'description', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">
                                        {!! th_sort(trans('general.create_time'), 'create_time', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">
                                        {!! th_sort(trans('general.open_time'), 'open_time', $oResults) !!}
                                    </th>

                                                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">
                                        {!! th_sort(trans('general.close_time'), 'close_time', $oResults) !!}
                                    </th>

                                
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class='{{ $class }}'>

                                                                                <td>{{ $oResult->id }}</td>

                                                                                <td>{{ (isset($oResult->contact->name))? $oResult->contact->name:'' }}</td>

                                                                                {{--<td>{{ $oResult->contract_id }}</td>--}}

                                                                                <td>{{ $oResult->name }}</td>

                                                                                <td>
                                                                                    {{(array_key_exists($oResult->type ,config('array.ticket_type')))? config('array.ticket_type')[$oResult->type ]:'' }}
                                                                                </td>

                                                                                <td>
                                                                                    {{(array_key_exists($oResult->status ,config('array.ticket_status')))? config('array.ticket_status')[$oResult->status ]:'' }}
                                                                                </td>

                                                                                <td>{{ $oResult->description }}</td>

                                                                                <td>{{ $oResult->create_time }}</td>

                                                                                <td>{{ $oResult->open_time }}</td>

                                                                                <td>{{ $oResult->close_time }}</td>

                                        
                                        <td>

                                            <div class="tableActionsMenuDiv">
                                                <div class="innerContainer">
                                                    <i class="fa fa-list menuIconList"></i>

                                            <a href="/client/ticket/{{ $oResult->id }}"
                                               class="fa fa-file-text"></a>


                                            {!! Form::open(['method' => 'DELETE',
                                            'url' => ['/client/ticket',$oResult->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                            <a href="/client/ticket/{{ $oResult->id }}/edit"
                                               class="fa fa-edit"></a>
</div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams->all())->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {{trans('general.CopyRights')}} </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('general.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}




                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('general.id'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('contact_id', $aFilterParams['contact_id'], ['placeholder'=>trans('general.contact_id'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('contract_id', $aFilterParams['contract_id'], ['placeholder'=>trans('general.contract_id'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('general.name'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('type', $aFilterParams['type'], ['placeholder'=>trans('general.type'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('status', $aFilterParams['status'], ['placeholder'=>trans('general.status'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('description', $aFilterParams['description'], ['placeholder'=>trans('general.description'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('create_time', $aFilterParams['create_time'], ['placeholder'=>trans('general.create_time'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('open_time', $aFilterParams['open_time'], ['placeholder'=>trans('general.open_time'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('close_time', $aFilterParams['close_time'], ['placeholder'=>trans('general.close_time'),'class'=>'form-control input-sm ']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                




                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('general.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close()!!}
            </div>
        </div>

        @stop