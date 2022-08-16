@extends('layouts.user')

@section('main-content')
  <table class="table table-bordered table-hover data-table" >
    <thead>
      <tr class="table-primary">
        <td class="text-center">No.</td>
        <td class="text-center">Employee Number</td>
        <td class="text-center">Item Number</td>
        <td class="text-center">Position</td>
        <td class="text-center">Name</td>
        <td class="text-center">Loads</td>
        <td class="text-center">Advisory</td>
        <td class="text-center">Subjects</td>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // TOASTR OPTIONS
    toastr.options = {
                "debug": false,
                "newestOnTop": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "500",
                "timeOut": "3000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

    // LOAD TABLE
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        select: true,
        ajax: "{{ route('employees.report') }}",
        columns: [
            {data: 'DT_RowIndex', name: '', class:'text-left'},
            {data: 'empnumber', name: 'empnumber'},
            {data: 'itemnumber', name: 'itemnumber'},
            {data: 'position', name: 'position'},
            {data: 'lastname', name: 'lastname'},
            {data: 'loads', name: 'loads'},
            {data: 'advisory', name: 'advisory'},
            {data: 'subjects', name: 'subjects'},
        ],
        dom: 'Bfrtip',
        buttons: [
            'colvis',
            {
                extend: 'spacer',
                style: 'bar',
                text: 'Export files'
            },
            'csv',
            'spacer',
            'pdf',
            'spacer',
            'print'
        ],
        columnDefs: [ 
          {
            'targets': 4,
            'render': function(data, type, row){
              return data +', '+row.firstname+' ' +row.middlename;
            },
            'targets': 4
        }
      ]
    });
});
</script>

@endsection
