@extends('layouts.app')


@push('css')
<!-- Fresh Bootrsap Table-->
<link type="text/css" href="{{ asset('argon') }}/vendor/fresh-table/fresh-bootstrap-table.css" rel="stylesheet">
  
@endpush

@section('content')
    @include('layouts.headers.cards')
    
       

        <div class="container-fluid mt--7 ">

<div class="row">
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
    <div class="col-xl-12 mb-5 mb-xl-0 ">
    <div class="fresh-table full-color-azure shadow-primary bg-gradient-darker">
                    <!--
                    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                    -->
                    <div class="toolbar ">
                      
                    &nbsp;
                    <div class=" icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fas fa-sign-in-alt "></i> 
                            </div> &nbsp;Inwards
                        
                    </div>

                    <table id="fresh-table" class="table font-weight-bolder bg-darker" >
                        <thead class="text-white font-weight-900 bg-gradient-red">
                        <th data-field="name">Name</th>
                        <th data-field="test" data-sortable="true">Test</th>
                        <th data-field="report_date" data-sortable="true">Report Date</th>
                        <th data-field="material" data-sortable="true">Material</th>
                        <th data-field="assign" data-sortable="true">Assign</th>
                        <th data-field="status" data-sortable="true">Progress</th>
                        <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                        
                        </thead>
                        
                        
                        <tbody>
                                
                                @foreach ($inwards as $inward)
                                <tr class="text-white ">
                                <td  >{{ $inward->client_name }}</td>
                                <td>{{ $inward->test_name }}</td>
                                <td>{{ $inward->inward_report_date }}</td>
                                <td>{{ $inward->material_name }}</td>
                                <td>
                                  @if( $inward->inward_assign_to == NULL )
                                  
                                   <select class="custom-select custom-select-sm" onchange="javascript:handleSelect(this)">
                                     <option selected disabled>--Assign--</option>
                                     @foreach ($users as $user)
                                      <option value="assign/{{ $inward->inward_id }}/to/{{$user->id }}" > {{ $user->name }} </option>
                                     @endforeach
                                   </select> 
                                  
                                  @else
                                  
                                    {{$inward->name}}
                                  @endif
                                </td>

                                <td>
                                @if($inward->inward_status == "Enlisted")
                                <div class="d-flex align-items-center">
                                  <span class="mr-2">25%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                    </div>
                                  </div>
                                </div>
                                @elseif($inward->inward_status == "Tested")
                                <div class="d-flex align-items-center">
                                  <span class="mr-2">50%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                  </div>
                                </div>
                                @elseif($inward->inward_status == "Paid")
                                <div class="d-flex align-items-center">
                                  <span class="mr-2">75%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                    </div>
                                  </div>
                                </div>
                                @elseif($inward->inward_status == "Completed")
                                <div class="d-flex align-items-center">
                                  <span class="mr-2">100%</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                  </div>
                                </div>
                                @else
                                <div class="d-flex align-items-center">
                                  <span class="mr-2">0</span>
                                  <div>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>
                                  </div>
                                </div>
                                @endif

                                </td>
                                <!-- open this td when edit functionality is available
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a class=" icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="fas fa-edit "></i>
                                </a>
                                </div>
                                </td>
                                -->
                                </tr>
                                @endforeach

                                </tbody>
                    </table>
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
    <script src="{{ asset('argon') }}/vendor/fresh-table/fresh-table.js"></script>  

<!-- Handle Task Assignment -->
<script type="text/javascript">
function handleSelect(elm)
{
window.location = elm.value;
}
</script>
<!-- task assignment ends -->

<script type="text/javascript">


var $table = $('#fresh-table')
var $alertBtn = $('#alertBtn')

window.operateEvents = {
  
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
    showRefresh: true,
    showToggle: true,
    showFullscreen: true,
     
    
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

function router()
{
  window.location.href = "/inward/create";
}

</script>

@endpush
@endpush