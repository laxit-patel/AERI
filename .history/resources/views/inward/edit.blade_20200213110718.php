@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' =>  'Inward',
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
    
        <div class="row">
        
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow-primary">
                <div class="card-header bg-gradient-red border-0">
                        <div class="row align-items-center ">
                            <h3 class="col-12 mb-0 text-white">Tests</h3>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center md-5">

                                   
                                @foreach ($inwards as $inward)
                                <div class="container bg-gradient-red rounded text-white">
                                {{ $inward->test_name }}
                                </div>
                                @endforeach
                                

                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="btn btn-success btn-block btn-lg">Add New</div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1 ">
                <div class="card bg-secondary shadow-primary">
                    <div class="card-header bg-gradient-red border-0">
                        <div class="row align-items-center">

                        <div class="accordion container-fluid" id="accordionExample">
                        <span class="text-white">{{ $inward->client_name }}</span>
                        <div class="bg-transparent float-right text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        
                                <i class="fas fa-caret-down text-white"></i>            
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table  table-dark rounded">
                        <thead>
                        <tr>
                            <td> GSTIN </td>
                            <td> number </td>
                        <tr>
                        <tr>
                            <td> Mobile </td>
                            <td> number </td>
                        <tr>
                        <tr>
                            <td> Email </td>
                            <td> number </td>
                        <tr>
                        <tr>
                            <td> Address </td>
                            <td> number </td>
                        <tr>
                        </thead>
                        </table>
                    </div>
                    </div>

  

</div>

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