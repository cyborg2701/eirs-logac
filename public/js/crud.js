
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        select: true,
        info: false,
        paging: false,
        filter:false,
        ajax: {
            url: "{{ route('admin.employees.index') }}",
            type: "get"
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class:'text-center'},
            {data: 'empnumber', name: 'empnumber'},
            {data: 'itemnumber', name: 'itemnumber'},
            {data: 'lastname', name: 'lastname'},
            {data: 'position', name: 'position'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ]
    });
});
