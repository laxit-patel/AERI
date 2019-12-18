@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add New Test')])   

    <div class="container-fluid mt--7">
        <div class="row ">
            <div class="col-xl-12  order-xl-1">
                <div class="card bg-secondary  shadow">
                    <div class="card-header  bg-white border-0">
                        <div class="row align-items-center ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add New Test') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('material.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('test.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            
                            
                            
                            <div class="pl-lg-4">

                            <div class="form-group{{ $errors->has('test_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-id">{{ __('Test Id') }}</label>
                                    <input type="text" name="test_id" id="input-id" class="form-control form-control-lg font-weight-bold text-white bg-gradient-info form-control-alternative{{ $errors->has('test_id') ? ' is-invalid' : '' }}" placeholder="{{ $reference }}" value="{{ old('test_id') }}" required autofocus>

                                    @if ($errors->has('test_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('test_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Test Name') }}</label>
                                    <input type="text" name="test_name" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-info form-control-alternative{{ $errors->has('test_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('test_name') }}" required >

                                    @if ($errors->has('test_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                
                                <div class="form-group{{ $errors->has('test_material') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-material">{{ __('Test Material') }}</label>
                                    

                                    <select name="test_material" id="input-material" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-info form-control-alternative{{ $errors->has('test_material') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>Select Material</option>
                                        @foreach($materials as $material)
                                        <option value="{{ $material }}">{{ $material }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('test_material'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_material') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('test_duration') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-material">{{ __('Test Duration') }}</label>
                                    <input type="time" name="test_duration" id="input-material" class="form-control form-control-lg font-weight-bold text-white bg-gradient-info form-control-alternative{{ $errors->has('test_duration') ? ' is-invalid' : '' }}" placeholder="{{ __('Duration') }}" value="{{ old('test_duration') }}" required >

                                    @if ($errors->has('test_duration'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_duration') }}</strong>
                                        </span>
                                    @endif
                                </div>
                             

                                <div class="form-group{{ $errors->has('test_parameter') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-material">{{ __('Test Parameters') }}</label>
                                    <input type="text" name="test_parameter" id="input-material" class="form-control form-control-lg font-weight-bold text-white bg-gradient-info form-control-alternative{{ $errors->has('test_parameter') ? ' is-invalid' : '' }}" placeholder="{{ __('Parameter') }}" value="{{ old('test_parameter') }}" required >

                                    @if ($errors->has('test_parameter'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_paramter') }}</strong>
                                        </span>
                                    @endif
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