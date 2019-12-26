@extends('layouts.app')


@push('css')
<!-- Fresh Bootrsap Table-->
<link type="text/css" href="{{ asset('argon') }}/vendor/fresh-table/fresh-bootstrap-table.css" rel="stylesheet">
        
@endpush

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" >
                                        <a href="{{ route('test.create') }}" class="nav-link py-2 px-3 active bg-success" >
                                            <span class="d-none d-md-block">Add New</span>
                                            <span class="d-md-none">+</span>
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
                        
                            <div class="fresh-table full-color-blue">
                            <!--
                            Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                            Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->
                            <div class="toolbar">

                            <div class=" icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="fas fa-vial"></i>
                                    </div>
                                <span class="h3 text-white">Clients</span>
                            </div>

                            <table id="fresh-table" class="table">
                                <thead>
                                <th data-field="id">ID</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="iscode" data-sortable="true">IS Code</th>
                                <th data-field="material" data-sortable="true">Material</th>
                                <th data-field="rate">Rate</th>
                                <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                                </thead>
                                <tbody>
                                
                                @foreach ($tests as $test)
                                <tr>
                                <td>{{ $test->test_id }}</td>
                                <td>{{ $test->test_name }}</td>
                                <td>{{ $test->test_iscode }}</td>
                                <td>{{ $test->test_material }}</td>
                                <td>{{ $test->test_rate }}</td>
                                </tr>
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

    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

    <script type="text/javascript">
    var $table = $('#fresh-table')
    var $alertBtn = $('#alertBtn')

    window.operateEvents = {
      'click .like': function (e, value, row, index) {
        alert('You click like icon, row: ' + JSON.stringify(row))
        console.log(value, row, index)
      },
      'click .edit': function (e, value, row, index) {
        alert('You click edit icon, row: ' + JSON.stringify(row))
        console.log(value, row, index)
      },
      'click .remove': function (e, value, row, index) {
        $table.bootstrapTable('remove', {
          field: 'id',
          values: [row.id]
        })
      }
    }

    function operateFormatter(value, row, index) {
      return [
        '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
          '<i class="fa fa-heart"></i>',
        '</a>',
        '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
          '<i class="fa fa-edit"></i>',
        '</a>',
        '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
          '<i class="fa fa-window-close"></i>',
        '</a>'
      ].join('')
    }

    $(function () {
      $table.bootstrapTable({
        classes: 'table table-hover table-striped',
        toolbar: '.toolbar',

        search: true,
        showRefresh: false,
        showToggle: true,
        showColumns: false,
        pagination: true,
        striped: true,
        sortable: true,
        pageSize: 8,
        pageList: [8, 10, 25, 50, 100],

        formatShowingRows: function (pageFrom, pageTo, totalRows) {
          return ''
        },
        formatRecordsPerPage: function (pageNumber) {
          return pageNumber + ' rows visible'
        }
      })

      $alertBtn.click(function () {
        alert('You pressed on Alert')
      })
    })

   
  </script>

@endpush
@endpush