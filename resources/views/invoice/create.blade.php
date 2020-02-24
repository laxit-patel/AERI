@extends('layouts.app', ['title' => __('Accounting')])

@section('content')
    @include('users.partials.header', ['title' => __('Invoice')])

    <div class="container-fluid mt--7 ">
        <div class="row ">
            <div class="col-xl-12  order-xl-1">
                <div class="card bg-secondary  shadow-primary">
                    <div class="card-header  bg-white border-0">
                        <div class="row align-items-center ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add New Test') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('test.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-3 form-group{{ $errors->has('test_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-id">{{ __('Invoice Id') }}</label>
                                    <input type="text" name="test_id" id="input-id" class="form-control form-control-lg font-weight-bold text-white bg-gradient-bliss form-control-alternative{{ $errors->has('test_id') ? ' is-invalid' : '' }}"     value="{{ $key }}" required disabled>

                                    @if ($errors->has('test_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('test_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group{{ $errors->has('invoice_clients') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="invoice-clients">{{ __('Client') }}</label>


                                    <select name="invoice_clients" id="invoice_client" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-blue form-control-alternative{{ $errors->has('invoice_clients') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client['client_id'] }}">{{ $client['client_name'] }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('invoice_clients'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invoice_clients') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class=" col-md-5 form-group{{ $errors->has('invoice_inward') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reference">{{ __('Inward') }}</label>

                                    <select name="invoice_inward" id="invoice_inward" class="custom-select custom-select-lg form-control form-control-lg font-weight-bold text-white bg-gradient-red form-control-alternative{{ $errors->has('invoice_inward') ? ' is-invalid' : '' }}" required autofocus>
                                        <option selected disabled>No Client Selected</option>

                                    </select>

                                    @if ($errors->has('invoice_inward'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invoice_inward') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <table class="table ">
                                <thead class="bg-darker text-white   ">
                                <tr>
                                    <th scope="col">Test</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody id="test_table_body">
                                <tr>
                                    <th colspan="5" class="text-center">No <span class="btn btn-sm bg-red text-white">Inward</span> Selected</th>

                                </tr>


                                </tbody>
                            </table>




                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-block btn-success mt-4">{{ __('Add') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>

        @include('layouts.footers.auth')
    </div>
@endsection