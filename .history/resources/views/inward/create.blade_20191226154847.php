@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Inward')])   

    <div class="container-fluid mt--7">
        <div class="row ">
            <div class="col-xl-12  order-xl-1">
                <div class="card bg-secondary  shadow">
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
                            
                            
                            <div class="pl-lg-4">

                            <div class="row">

                                <div class=" col-md-2 form-group{{ $errors->has('inward_id') ? ' has-danger' : '' }}">
                                    
                                    <input type="text" name="inward_id" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_id') ? ' is-invalid' : '' }}" placeholder="{{ $reference }}" value="{{ old('inward_id') }}" required autofocus>

                                    @if ($errors->has('inward_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class=" col-md-4 form-group{{ $errors->has('inward_reference') ? ' has-danger' : '' }}">
                                    
                                    <input type="text" name="inward_reference" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_reference') ? ' is-invalid' : '' }}" placeholder="{{ $reference }}" value="{{ old('inward_reference') }}" required autofocus>

                                    @if ($errors->has('inward_reference'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inward_reference') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class=" col-md-6 form-group input-group{{ $errors->has('inward_client') ? ' has-danger' : '' }}">
                                    
                                    <select name="inward_client" id="input-material" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_client') ? ' is-invalid' : '' }}" required autofocus>
                                        <option class="form-input " selected disabled>Select Client</option>
                                        @foreach($clients as $client)
                                        <option class="display-4 " value="{{ $client }}">{{ $client }}</option>
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
                            </div>


                            <div class="row">
                                <div class="col-md-6 form-group input-group {{ $errors->has('inward_material') ? ' has-danger' : '' }}">
                                    
                                    <select name="inward_material" id="inward-material" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_material') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>Select Material</option>
                                        @foreach($materials as $material)
                                        <option class="display-4" value="{{ $material }}">{{ $material }}</option>
                                        @endforeach
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


                                <div class="col-md-6 form-group input-group{{ $errors->has('inward_test') ? ' has-danger' : '' }}">
                                    
                                    <select name="inward_test" id="input-material" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-danger form-control-alternative{{ $errors->has('inward_test') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>Select Test</option>
                                        @foreach($tests as $test)
                                        <option class="display-4" value="{{ $test }}">{{ $test }}</option>
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
                            </div>

                           

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
                                            <input name="inward_due_date" class="form-control form-control-lg text-white bg-gradient-danger" placeholder="Invard Due Date" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>


                               
                              

                                

                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg  btn-success mt-4">{{ __('Add') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection