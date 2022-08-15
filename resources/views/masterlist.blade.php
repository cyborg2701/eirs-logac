@extends('layouts.user')

@section('main-content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Employee List') }}</h1>
    <div class="text-right">
      <!-- Button trigger modal -->
      <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="addEmployee">Add Employee</a>
      
    </div>
<div class="mt-2">
  <table class="table table-bordered table-hover data-table" >
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

{{-- add moda --}}

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
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title badge bg-primary fs-6"><strong>Personal Information</strong></h5>
                    <div class="row">
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Dela Cruz" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Pedro" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Dantes">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="pedro@yahoo.com" required>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title badge bg-primary fs-6"><strong>Government Numbers</strong></h5>
                    <div class="row">
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Employee Number</label>
                            <input type="text" class="form-control" name="empnumber" id="empnumber" placeholder="00212351" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Item Number</label>
                            <input type="text" class="form-control" name="itemnumber" id="itemnumber" placeholder="10023-20351" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">TIN</label>
                            <input type="text" class="form-control" name="tin" id="tin" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">PHILHEALTH</label>
                            <input type="text" class="form-control" name="philhealth" id="philhealth" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">PAGIBIG</label>
                            <input type="text" class="form-control" name="pagibig" id="pagibig" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">GSIS</label>
                            <input type="text" class="form-control" name="gsis" id="gsis" placeholder="" required>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title badge bg-primary fs-6"><strong>Item Information</strong></h5>
                    <div class="row">
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Position</label>
                            <input type="text" class="form-control" name="position" id="position" placeholder="Teacher I" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Coordinatorship</label>
                            <input type="text" class="form-control" name="coordinatorship" id="coordinatorship" placeholder="">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Advisory Class</label>
                            <input type="text" class="form-control" name="advisory" id="advisory" placeholder="Grade 7">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Teaching Loads</label>
                            <input type="text" class="form-control" name="loads" id="loads" placeholder="3" required>
                        </div>
                        <div class="col-md-8 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Subjects Taught</label>
                            <input type="text" class="form-control" name="subjects" id="subjects" placeholder="Mathematics, Science, etc." required>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title badge bg-primary fs-6"><strong>Vaccination Details</strong></h5>
                    <div class="row">
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">1st Dose</label>
                            <input type="date" class="form-control" name="firstdose" id="firstdose" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">2nd Dose</label>
                            <input type="date" class="form-control" name="seconddose" id="seconddose" placeholder="">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Additional Dose</label>
                            <input type="date" class="form-control" name="additional" id="boostoer" placeholder="">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Vaccine Brand</label>
                            <input type="text" class="form-control" name="firstbrand" id="firstbrand" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Vaccine Brand</label>
                            <input type="text" class="form-control" name="secondbrand" id="secondbrand" placeholder="" required>
                        </div>
                         <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Vaccine Brand</label>
                            <input type="text" class="form-control" name="additionalbrand" id="additionalbrand" placeholder="Optional" required>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button id="savedata" name="savedata" type="button" class="btn btn-success">Save</button>
        <button id="updatedata" name="updatedata" type="button" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div>
</div>   <!-- end of add modal -->



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
        ajax: "{{ route('employees.index') }}",
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

      // columnDefs: [ { 
      //   targets: -1,
      //   visible: false
      // }]
    });

    // SHOW ADD MODAL
   $('#addEmployee').click(function () {
        $('#id').val('');
        $('#employeeForm').trigger("reset");
        $('#addModal').modal('show')
        $('#empnumber').prop('disabled', false);
        $('#itemnumber').prop('disabled', false);
        $('#position').prop('disabled', false);
        $('#tin').prop('disabled', false);
        $('#gsis').prop('disabled', false);
        $('#philhealth').prop('disabled', false);
        $('#pagibig').prop('disabled', false);
        $('#savedata').show();
        $('#updatedata').hide();
        $('#error').html('');
    });

    // ADD FUNCTION
    $('#savedata').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#employeeForm').serialize(),
                    url: "{{ url('employees/store') }}",
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
                        toastr.error(data['responseJSON']['message'],'Error has occured');
                    }
                });
            });

    // update
    $('#updatedata').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#empnumber').prop('disabled', false);
                $('#itemnumber').prop('disabled', false);
                $('#position').prop('disabled', false);
                $('#tin').prop('disabled', false);
                $('#gsis').prop('disabled', false);
                $('#philhealth').prop('disabled', false);
                $('#pagibig').prop('disabled', false);
                $.ajax({
                    data: $('#employeeForm').serialize(),
                    url: "{{ url('employees/update') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#employeeForm').trigger("reset");
                        $('#addModal').modal('hide');
                        table.draw();
                        toastr.success('Employee updated successfully','Success');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        toastr.error(data['responseJSON']['message'],'Error has occured');
                    }
                });
            });

    // EDIT
    $('body').on('click', '.editEmployee', function () {
                $('#savedata').hide();
                $('#updatedata').show();
                $('#empnumber').prop('disabled', true);
                $('#itemnumber').prop('disabled', true);
                $('#position').prop('disabled', true);
                $('#tin').prop('disabled', true);
                $('#gsis').prop('disabled', true);
                $('#philhealth').prop('disabled', true);
                $('#pagibig').prop('disabled', true);
                var id = $(this).data('id');

                $.ajax({
                    type:"GET",
                    url: "{{ url('employees/edit') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(data){
                        $('#modelHeading').html("Edit Employee");
                        $('#addModal').modal('show');
                        $('#id').val(data.id);
                        $('#lastname').val(data.lastname);
                        $('#firstname').val(data.firstname);
                        $('#middlename').val(data.middlename);
                        $('#email').val(data.email);
                        $('#empnumber').val(data.empnumber);
                        $('#itemnumber').val(data.itemnumber);
                        $('#tin').val(data.tin);
                        $('#gsis').val(data.gsis);
                        $('#philhealth').val(data.philhealth);
                        $('#pagibig').val(data.pagibig);
                        $('#position').val(data.position);
                        $('#coordinatorship').val(data.coordinatorship);
                        $('#subjects').val(data.subjects);
                        $('#advisory').val(data.advisory);
                        $('#loads').val(data.loads);
                        $('#firstdose').val(data.firstdose);
                        $('#seconddose').val(data.seconddose);
                        $('#additional').val(data.additional);
                        $('#firstbrand').val(data.firstbrand);
                        $('#secondbrand').val(data.secondbrand);
                        $('#additionalbrand').val(data.additionalbrand);
                    }
                });

            });
});
</script>

@endsection
