@extends('client.layouts.main')
@section('title', trans('general.contracts_renewal'))
@section('content')

    <div class="padding">
        <div class="theme-default page-mail">
            <div class="mail-nav">
                <div class="navigation">
                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                    <ul class="sections">
                        <li class="active"><a href="#"> <i
                                        class="fa fa-search"></i> {{ trans('general.search') }} </a></li>




                                                <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('general.id'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>

                                                <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('contracts_id', $aFilterParams['contracts_id'], ['placeholder'=>trans('general.contracts_id'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>

                                                <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('description', $aFilterParams['description'], ['placeholder'=>trans('general.description'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>

                                                <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('price', $aFilterParams['price'], ['placeholder'=>trans('general.price'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>

                        
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('general.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        </li>
                        <li class="divider"></li>
                    </ul>


                    {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                    {!! Form::hidden('order', $aFilterParams['order']) !!}


                </div>
            </div>

            <div class="mail-container ">
                <div class="mail-container-header">
                    {{ trans('general.contracts_renewal') }}
                </div>
                <div class="center_page_all_div">
                    @include('client.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('general.contracts_renewal') }}

                                <a href="/client/contracts_renewal/create" style="float:right;">
                                    <input name="" class="btn btn-primary btn-flat" type="button"
                                           value="{{ trans('general.addcontracts_renewal') }}"> </a>

                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>


                                                          <th class="no-warp">{!! th_sort(trans('general.id'), 'id', $oResults) !!}</th>

                                                      <th class="no-warp">{!! th_sort(trans('general.contracts_id'), 'contracts_id', $oResults) !!}</th>

                                                      <th class="no-warp">{!! th_sort(trans('general.description'), 'description', $oResults) !!}</th>

                                                      <th class="no-warp">{!! th_sort(trans('general.price'), 'price', $oResults) !!}</th>

                                                          <th class="no-warp">

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

                                                                                    <td>{{ $oResult->contracts_id }}</td>

                                                                                    <td>{{ $oResult->description }}</td>

                                                                                    <td>{{ $oResult->price }}</td>

                                            
                                        <td>
                                            <a href="/client/contracts_renewal/{{ $oResult->id }}"
                                               class="fa fa-file-text"></a>


                                            {!! Form::open(['method' => 'DELETE',
                                            'url' => ['/client/contracts_renewal',$oResult->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                            <a href="/client/contracts_renewal/{{ $oResult->id }}/edit"
                                               class="fa fa-edit"></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="table-footer">
                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams->all())->render()) !!}
                                @if($oResults->total()>25)

                                    <div class="DT-lf-right change_page_all_div">


                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}



                                        {!! Form::submit(trans('general.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                    </div>
                                @endif

                                <div class="col-sm-3">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        init.push(function () {


            $('.tooltip_number').tooltip();


            $('#all-groups-chx').change(function () {

                if ($('#all-groups-chx').prop('checked')) {
                    $('#all-groups-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-groups-slc').removeAttr('disabled');
                }
            });
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }


            $('#exactLogin').change(function () {
                if ($('#exactLogin').prop('checked')) {
                    $("#from_login_li,#to_login_li").hide();
                    $("#login_li").show();
                } else {
                    $("#from_login_li,#to_login_li").show();
                    $("#login_li").hide();
                }
            });

            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }

        });

    </script>
@stop