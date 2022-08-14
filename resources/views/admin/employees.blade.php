@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Employee List') }}</h1>
    <div class="text-right">
      <!-- Button trigger modal -->
      <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="addEmployee">Add Employee</a>
      
    </div>
<div class="mt-2">
  <table class="table table-bordered data-table" >
    <thead>
        <tr class="table-primary">
          <td>No.</td>
          <td>Employee Number</td>
          <td>Item Number</td>
          <td>Name</td>
          <td>Position</td>
          <td>Email</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody></tbody>
  </table>
<div>



<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeading" muted>Employee Information</h5>
        <span aria-hidden="true" type="button" data-bs-dismiss="modal" aria-label="Close">X</span>
      </div>
      <div class="modal-body">
        <form id="employeeForm" name="employeeForm" enctype="multipart/form-data">
          {{-- 1st row --}}
          <div id="error"></div>
          <input type="hidden" name="id" id="id">
          <div class="row p-1">
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Last Name</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Dela Cruz" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">First Name</label>
              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Pedro" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Middle Name</label>
              <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Dantes" required>
            </div>
          </div> 
          {{-- end of 1st row --}}
          {{-- 2nd row --}}
          <div class="row p-1">
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="pedro@yahoo.com" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Employee Number</label>
              <input type="text" class="form-control" name="empnumber" id="empnumber" placeholder="00212351" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Item Number</label>
              <input type="text" class="form-control" name="itemnumber" id="itemnumber" placeholder="10023-20351" required>
            </div>
          </div>
          {{-- end of 2nd row --}}
          {{-- 3rd row --}}
          <div class="row p-1">
            <div class="col-md-3">
              <label for="formControlInput" class="form-label font-weight-bold">TIN</label>
              <input type="text" class="form-control" name="tin" id="tin" placeholder="" required>
            </div>
            <div class="col-md-3">
              <label for="formControlInput" class="form-label font-weight-bold">PHILHEALTH</label>
              <input type="text" class="form-control" name="philhealth" id="philhealth" placeholder="" required>
            </div>
            <div class="col-md-3">
              <label for="formControlInput" class="form-label font-weight-bold">PAGIBIG</label>
              <input type="text" class="form-control" name="pagibig" id="pagibig" placeholder="" required>
            </div>
            <div class="col-md-3">
              <label for="formControlInput" class="form-label font-weight-bold">GSIS</label>
              <input type="text" class="form-control" name="gsis" id="gsis" placeholder="" required>
            </div>
          </div>
          {{-- end of 3rd row --}}
          {{-- 4th row --}}
          <div class="row p-1">
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Position</label>
              <input type="text" class="form-control" name="position" id="position" placeholder="Teacher I" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Advisory Class</label>
              <input type="text" class="form-control" name="advisory" id="advisory" placeholder="Grade 7" required>
            </div>
            <div class="col-md-4">
              <label for="formControlInput" class="form-label font-weight-bold">Teaching Loads</label>
              <input type="text" class="form-control" name="loads" id="loads" placeholder="3" required>
            </div>
          </div>
          {{-- end of 4th row --}}
          {{-- last row --}}
          <div class="row p-1">
            <div class="col-md-8">
              <label for="formControlInput" class="form-label font-weight-bold">Subjects Taught</label>
              <input type="text" class="form-control" name="subjects" id="subjects" placeholder="Mathematics, Science, etc." required>
            </div>
          </div>
          {{-- end of last row --}}

      </div>
      <div class="modal-footer">
        <button id="savedata" name="savedata" type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div>
</div> 
              {{-- DELETE MODAL --}}
              {{-- <div class="modal fade" data-backdrop="static"  id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Employee') }}</h5>
                            
                                <span aria-hidden="true" type="button" data-bs-dismiss="modal" aria-label="Close">X</span>
                           
                        </div>
                        <div class="modal-body text-left">Are you sure you want to delete this employee?
                          
                        </div>
                        <div class="modal-footer">
                          <a class="btn btn-success" style="width:4rem;" href="" onclick="event.preventDefault(); document.getElementById('delete-user').submit()">{{ __('Yes') }}</a>
                          <form id="delete-user" action="" method="post" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                          <button type="button" class="btn btn-danger" style="width:4rem;" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div> --}}
              </div>
              {{-- END OF DELETE MODAL --}}

</div>
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
        ajax: "{{route('employees.index')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class:'text-center'},
            {data: 'empnumber', name: 'empnumber'},
            {data: 'itemnumber', name: 'itemnumber'},
            {data: 'lastname', name: 'lastname'},
            {data: 'position', name: 'position'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ],
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'print',
            exportOptions: {
              columns: ':visible'
            }
          },
          'colvis'
        ],

      columnDefs: [ { 
        targets: -1,
        visible: false
      }]
    });

    // SHOW ADD MODAL
    $('#addEmployee').click(function () {
        $('#id').val('');
        $('#savedata').html('Add');
        $('#modalHeading').html("Add Employee");
        $('#employeeForm').trigger("reset");
        $('#addModal').modal('show');
        $('#error').html('');
    });

    // ADD FUNCTION
    $('#savedata').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#employeeForm').serialize(),
                    url: "{{route('employees.store')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#employeeForm').trigger("reset");
                        $('#addModal').modal('hide');
                        table.draw();
                        toastr.success('Employee saved successfully','Success');

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#error').html("<div class='alert alert-danger'>"+data['responseJSON']['message'] + "</div>");
                        $('#savedata').html('Error in saving');
                    }
                });
            });


    // EDIT
    $('body').on('click', '.editEmployee', function () {
                $('#savedata').html('Update');
                var id = $(this).data('id');

                $.ajax({
                    type:"PUT",
                    url: "{{route('employees.index')}}"+'/'+id,
                    data: { id: id },
                    dataType: 'json',
                    success: function(data){
                        $('#modalHeading').html("Edit Employee");
                        $('#addModal').modal('show');
                        $('#id').val(data.id);
                        $('#lastname').val(data.lastname);
                        $('#firstname').val(data.firstname);
                        $('#middlename').val(data.middlename);
                        $('#email').val(data.email);
                        $('#empnumber').val(data.empnumber);
                        $('#itemnumber').val(data.itemnumber);
                        $('#tin').val(data.tin);
                        $('#philhealth').val(data.philhealth);
                        $('#pagibig').val(data.pagibig);
                        $('#gsis').val(data.gsis);
                        $('#position').val(data.position);
                        $('#advisory').val(data.advisory);
                        $('#loads').val(data.loads);
                        $('#subjects').val(data.subjects);
                        $('#error').html('');
                    }
                });

            });

    // DELETE 
    $('body').on('click', '.deleteEmployee', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this employee?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{route('employees.index')}}"+'/'+id,
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Employee deleted successfully','Success');
                },
                error: function (data) {
                  console.log('Error:', data);
                }
            });
        }

    });
});
</script>

@endsection
