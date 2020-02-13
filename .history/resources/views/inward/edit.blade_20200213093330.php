@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' =>  'Inward',
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
    
        <div class="row">
        
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    

                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                   <h1>Invoice</h1>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                Some Data
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
                            <h3 class="col-12 mb-0">Some Data</h3>
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

                            

                            

                                <span class="mr-2 progress-meter"></span>
                                <div>
                                <div class="progress" >
                                    <div class="progress-bar bg-info" role="progressbar" id="progress-bar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                </div>
                                </div>


                                <div class="btn-group " role="group" style="width:100%">
                                <a href="{{ route('lab') }}" class="btn btn-block btn-primary float-left mt-4">{{ __('Back') }}</a>
                                <a href="#" class="btn btn-block btn-success float-right mt-4 submit-test">{{ __('Submit') }}</a>
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