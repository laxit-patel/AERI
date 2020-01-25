@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Inward')])   

    <div class="container-fluid mt--7 shadow-lg">
        <div class="row ">
            <div class="col-xl-12  order-xl-1">
                <div class="card bg-secondary  shadow-primary">
                    <div class="card-header  bg-white border-0">
                        <div class="row align-items-center ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Inward') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inward.index') }}" class="btn btn-sm bg-gradient-indigo text-white">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('inward.store') }}" autocomplete="off">
                            @csrf
                            

                            <div class="row">

                                <div class=" col-md-3 form-group{{ $errors->has('inward_id') ? ' has-danger' : '' }}">
                                    
                                    <input type="text" name="inward_id" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_id') ? ' is-invalid' : '' }}"  value="{{ $key }}" required autofocus disabled>

                                    @if ($errors->has('inward_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class=" col-md-3 form-group{{ $errors->has('inward_reference') ? ' has-danger' : '' }}">
                                    
                                    <input type="text" name="inward_reference" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_reference') ? ' is-invalid' : '' }}" placeholder="{{ $reference }}" value="{{ old('inward_reference') }}" required autofocus>

                                    @if ($errors->has('inward_reference'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_reference') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                   
                                   <div class="col-md-6">
                                   <div class="input-daterange datepicker row align-items-center">
                                <div class="col">
                                    <div class="form-group ">
                                        <div class="input-group input-group-alternative ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger text-white"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="inward_date" class="form-control form-control-lg text-white bg-gradient-danger" placeholder="Inward Date" type="text" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger text-white"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="inward_report_date" class="form-control form-control-lg text-white bg-gradient-danger" placeholder="Invard Due Date" type="text" >
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>

                            </div>

                            <div class="row">

                            <div class="card col-md-6" data-select2-id="7">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Dropdowns</h3>
                            </div>
                            <!-- Card body -->
                            <div class="card-body" data-select2-id="6">
                                <form data-select2-id="5">
                                <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Alerts</option>
                                    <option data-select2-id="10">Badges</option>
                                    <option data-select2-id="11">Buttons</option>
                                    <option data-select2-id="12">Cards</option>
                                    <option data-select2-id="13">Forms</option>
                                    <option data-select2-id="14">Modals</option>
                                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 573.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-qz2y-container"><span class="select2-selection__rendered" id="select2-qz2y-container" role="textbox" aria-readonly="true" title="Buttons">Buttons</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </form>
                            </div>
                            </div>

                            <div class="card col-md-6" data-select2-id="7">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Dropdowns</h3>
                            </div>
                            <!-- Card body -->
                            <div class="card-body" data-select2-id="6">

                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                                ...
                            <option value="WY">Wyoming</option>
                            </select>

                            <script>
                            $(document).ready(function() {
                                $('.js-example-basic-multiple').select2();
                            });

                            </script>

                            </div>
                            </div>

                            </div>


                            <div class="row">

                            
                            <div class=" col-md-6 form-group input-group{{ $errors->has('inward_client') ? ' has-danger' : '' }}">
                                    
                                    <select name="inward_client" id="input-material" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_client') ? ' is-invalid' : '' }}" required autofocus>
                                        <option  selected disabled>Select Client</option>
                                        @foreach($clients as $client)
                                        <option class="bg-danger display-4" value="{{ $client['client_id'] }}">{{ $client['client_name'] }}</option>
                                        @endforeach
                                    </select>

                                    <a href="{{ route('client.create') }}" class="input-group-append">
                                        <span class="input-group-text  bg-orange text-white">
                                            <i class="fa fa-plus-square"></i>
                                        </span>
                                        </a>

                                    @if ($errors->has('inward_client'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_client') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="col-md-6 form-group input-group{{ $errors->has('inward_test') ? ' has-danger' : '' }}">
                    
                                <select class="form-control form-control-lg custom-select custom-select-lg font-weight-bold text-white bg-gradient-danger {{ $errors->has('inward_test') ? ' is-invalid' : '' }}" name="inward_test" id="inward_test_datalist">
                                    <option selected disabled>-- Select Test -- </option>
                                @foreach($tests as $test)
                                        <option class="display-4 bg-danger"  value="{{ $test['test_id'] }}">{{ $test['test_name'] }}</option>
                                        @endforeach
                                </select>


                                    <a href="{{ route('test.create') }}" class="input-group-append">
                                        <span class="input-group-text  bg-orange text-white">
                                            <i class="fa fa-plus-square"></i>
                                        </span>
                                        </a>

                                    @if ($errors->has('inward_test'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_test') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group input-group {{ $errors->has('inward_material') ? ' has-danger' : '' }}">
                                    
                                    <select name="inward_material" id="inward_material_dropdown" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_material') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>No Test Selected</option>
                                        
                                        
                                    </select>

                                    <a href="{{ route('material.create') }}" class="input-group-append">
                                        <span class="input-group-text  bg-orange text-white">
                                            <i class="fa fa-plus-square"></i>
                                        </span>
                                        </a>

                                    @if ($errors->has('inward_material'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_material') }}</strong>
                                        </span>
                                    @endif
                                   
                                </div> 

                            </div>

                         


                            <div class=" form-group{{ $errors->has('inward_description') ? ' has-danger' : '' }}">
                                    
                                    <textarea name="inward_description" class="form-control form-control-lg text-white bg-gradient-danger" placeholder="Inward Description" ></textarea>

                                    @if ($errors->has('inward_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-block bg-gradient-success  mt-4">{{ __('Add') }}</button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>

    @push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
                            
                                
    @endpush
@endsection