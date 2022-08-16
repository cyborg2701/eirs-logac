@extends('layouts.user')

@section('main-content')
  <table class="table table-bordered table-hover data-table" >
    <thead>
        <tr class="table-primary">
          <td>No.</td>
          <td>Employee Number</td>
          <td>Item Number</td>
          <td>Name</td>
          <td>Position</td>
          <td>Email</td>
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
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class:'text-center'},
            {data: 'empnumber', name: 'empnumber'},
            {data: 'itemnumber', name: 'itemnumber'},
            {data: 'lastname', name: 'lastname'},
            {data: 'position', name: 'position'},
            {data: 'email', name: 'email'},
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
        ]
    });
});
</script>

@endsection
