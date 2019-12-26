@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Material')])   

    <div class="container-fluid mt--7">
        <div class="row ">
            <div class="col-xl-12  order-xl-1">
                <div class="card bg-secondary  shadow">
                    <div class="card-header  bg-white border-0">
                        <div class="row align-items-center ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Material') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('material.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('material.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            
                            
                            
                            <div class="pl-lg-4">

                            <div class="row">
                            <div class="col-md-6 form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Material ID') }}</label>
                                    <input type="text" name="material_id" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-warning form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}" value="{{ $key }}" required autofocus disabled>

                                    @if ($errors->has('material_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('material_reference') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reference">{{ __('Material Reference') }}</label>
                                    <input type="text" name="material_reference" id="input-reference" class="form-control form-control-lg font-weight-bold text-white bg-gradient-warning form-control-alternative{{ $errors->has('material_reference') ? ' is-invalid' : '' }}" placeholder="{{ $reference }}" value="{{ old('material_reference') }}" required autofocus>

                                    @if ($errors->has('material_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group{{ $errors->has('material_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Material Name') }}</label>
                                    <input type="text" name="material_name" id="input-name" class="form-control form-control-lg font-weight-bold text-white bg-gradient-warning form-control-alternative{{ $errors->has('material_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('material_name') }}" required autofocus>

                                    @if ($errors->has('material_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('material_iscode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-iscode">{{ __('Material I.S Code') }}</label>
                                    <input type="text" name="material_iscode" id="input-iscode" class="form-control form-control-lg font-weight-bold text-white bg-gradient-warning form-control-alternative{{ $errors->has('material_iscode') ? ' is-invalid' : '' }}" placeholder="{{ __('I.S Code') }}" value="{{ old('material_iscode') }}" required autofocus>

                                    @if ($errors->has('material_iscode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_iscode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group{{ $errors->has('material_description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-details">{{ __('Material Description') }}</label>
                                    <textarea  name="material_description" id="input-details" class="form-control form-control-lg font-weight-bold text-white bg-gradient-warning form-control-alternative{{ $errors->has('material_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Material Description') }}" value="{{ old('material_description') }}" required autofocus>
                                    </textarea>
                                    @if ($errors->has('material_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- Remnent of last file operations
                                <div class="row">

                                <div class=" custom-file col-md-6 form-group{{ $errors->has('material_worksheet_format') ? ' has-danger' : '' }}">
                                    <label class="form-control-label " for="input-password">{{ __('Upload Material Format') }}</label>
                                    <input type="file" name="material_worksheet_format" id="input-password" class="  text-white  form-control form-control-lg font-weight-bold  bg-gradient-orange     form-control-alternative{{ $errors->has('material_worksheet_format') ? ' is-invalid' : '' }}" placeholder="{{ __('Upload Material Worksheet') }}" value="{{ old('material_worksheet_format') }}" required>
                                
                                    @if ($errors->has('material_worksheet_format'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_worksheet_format') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group{{ $errors->has('material_report_format') ? ' has-danger' : '' }}">
                                    <label class="form-control-label " for="input-password">{{ __('Upload Material Report') }}</label>
                                    <input type="file" name="material_report_format" id="input-password" class="  text-white  form-control form-control-lg font-weight-bold  bg-gradient-orange     form-control-alternative{{ $errors->has('material_report_format') ? ' is-invalid' : '' }}" placeholder="{{ __('Upload Material Format') }}" value="{{ old('material_report_format') }}" required>
                                
                                    @if ($errors->has('material_report_format'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_report_format') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                </div>
                                -->
                                

                                

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