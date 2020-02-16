@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' =>  $records[0]->test_name,  
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
    
        <div class="row">
        
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                <img src="{{ asset('argon') }}/img/brand/ISMARK.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Printout') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Download') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                   <h1>{{ $record->test_iscode }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $record->test_name }}
                            </h3>
                            
                            <div class="h5 font-weight-300">

                            </div>
                          
                            <hr class="my-4" />
                            <p>{{ __('Details of I.S code will come here in future scale. add separate schema for iscodes along with their pdf documents') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ $record->material_name }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif   

                            <input type="hidden" value="{{ $record->record_id}}" id="inward_id">

                            <div class="text-center row">

                                    <div class="col-md-6">
                                    <a href="/download?path={{$record->test_worksheet}}"  class="btn btn-block btn-lg btn-success mt-4">{{ __('Download Worksheet Format') }}</a>
                                    </div>

                                    <div class="col-md-6">
                                    <a href="/download?path={{$record->test_worksheet}}"  class="btn btn-block btn-lg btn-primary mt-4">{{ __('Download Report Format') }}</a>
                                    </div>

                                </div>
                                <hr>

                                <div class="progress-container ">

                                

                                <div class="card progress-card bg-gradient-cyan card-stats  mb-lg-0" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">First Phase</h5>
                                                <span class="h2 font-weight-bold mb-0">Preparations</span>
                                            </div>
                                            <div class="col-auto ">
                                            <button type="button" onclick="progress(this)" class="btn btn-round bg-danger text-white" id="phase_one" data-phase="inward_phase_one" data-status="{{$record->inward_phase_one}}"></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="card progress-card bg-gradient-cyan card-stats  mb-lg-0" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Second Phase</h5>
                                                <span class="h2 font-weight-bold mb-0">Preparations</span>
                                            </div>
                                            <div class="col-auto ">
                                            <button type="button" onclick="progress(this)" class="btn btn-round bg-danger text-white" id="phase_two" data-phase="inward_phase_two" data-status="{{$record->inward_phase_two}}"></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="card progress-card bg-gradient-cyan card-stats  mb-lg-0" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Third Phase</h5>
                                                <span class="h2 font-weight-bold mb-0">Preparations</span>
                                            </div>
                                            <div class="col-auto ">
                                            <button type="button" onclick="progress(this)" class="btn btn-round bg-danger text-white" id="phase_three" data-phase="inward_phase_three" data-status="{{$record->inward_phase_three}}"></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="card progress-card bg-gradient-cyan card-stats  mb-lg-0" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Fourth Phase</h5>
                                                <span class="h2 font-weight-bold mb-0">Preparations</span>
                                            </div>
                                            <div class="col-auto ">
                                            <button type="button" onclick="progress(this)" class="btn btn-round bg-danger text-white" id="phase_four" data-phase="inward_phase_four" data-status="{{$record->inward_phase_four}}"></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                </div>

                                <hr>

                                <span class="mr-2 progress-meter"></span>
                                <div>
                                <div class="progress" >
                                    <div class="progress-bar bg-info" role="progressbar" id="progress-bar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                </div>
                                </div>


                                <div class="btn-group " role="group" style="width:100%">
                                <a href="{{ route('lab') }}" class="btn btn-block btn-primary float-left mt-4">{{ __('Back') }}</a>
                                <a href="/completed/{{ $record->record_id }}" class="btn btn-block btn-success float-right mt-4 submit-test">{{ __('Submit') }}</a>
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