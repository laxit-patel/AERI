@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                            
                                <h2 class="text-white mb-0">
                                <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                <i class="fas fa-sign-in-alt"></i>
                                    </div> Inward</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills   justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" >
                                        <a href="{{ route('inward.create') }}" class="nav-link py-2 px-3 m-3 active bg-success" >
                                            <span class="d-none d-md-block">Add New</span>
                                            <span class="d-md-none ">+</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert text-white alert-success text-default alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close test-default" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                        
                        <div class="table-responsive">
    <table class="table align-items-center ">
    <thead class="text-white bg-gradient-danger ">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Client</th>
            <th scope="col">Material</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
                        
        </tr>
    </thead>
    <tbody class="text-white">
    
    @foreach ($inwards as $inward)
       

      <tr>
           
           <td>{{ $inward->inward_reference }}</td>
           <td>{{ $inward->inward_client }}</td>
           <td>{{ $inward->inward_material }}</td>
           <td>{{ $inward->inward_date }}</td>
           <td>{{ $inward->inward_status }}</td>
            
         </tr>
         <tr>

    @endforeach
    

           

    </tbody>
</table>

</div>







                    </div>
                </div>
            </div>
            
        </div>
       

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush