@extends('layouts.user')

@section('main-content')
    <div class="text-right">
      <!-- Button trigger modal -->
      <a href="javascript:void(0)" class="btn btn-primary mb-1" id="addEmployee">Add Employee</a>
      
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

<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading" muted>Employee Information</h5>
          <span aria-hidden="true" type="button" data-bs-dismiss="modal" aria-label="Close">X</span>
        </div>
        <div class="modal-body">
          <form id="employeeForm" name="employeeForm" enctype="multipart/form-data">
            {{-- 1st row --}}
            <div class="row">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      <span class="badge bg-success fs-6">Personal Information</span>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Last Name</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_lastname" id="view_lastname" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">First Name</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_firstname" id="view_firstname" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Middle Name</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_firstname" id="view_firstname" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Email</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_email" id="view_email" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      <span class="badge bg-success fs-6">Government Numbers</span>
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Employee Number</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_empnumber" id="view_empnumber" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Item Number</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_itemnumber" id="view_itemnumber" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">TIN</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_tin" id="view_tin" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">GSIS</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_gsis" id="view_gsis" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">PHILHEALTH</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_philhealth" id="view_philhealth" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">PAGIBIG</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_pagibig" id="view_pagibig" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      <span class="badge bg-success fs-6">Item Information</span>
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Position</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_position" id="view_position" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Coordinatorship</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_coordinatorship" id="view_coordinatorship" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Advisory Class</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_advisory" id="view_advisory" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Teaching Loads</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_loads" id="view_loads" placeholder="" readonly>
                      </div>
                      <div class="col-md-5 m-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Subjects Taught</label>
                        <textarea class="form-control-plaintext" id="view_subjects" rows="3" readonly></textarea>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                      <span class="badge bg-success fs-6">Vaccination Details</span>
                    </button>
                  </h2>
                  <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">1st Dose</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_firstdose" id="view_firstdose" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">2nd Dose</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_seconddose" id="view_seconddose" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Additional Dose</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_additional" id="view_additional" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Vaccine Brand</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_firstbrand" id="view_firstbrand" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Vaccine Brand</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_secondbrand" id="view_secondbrand" placeholder="" readonly>
                      </div>
                      <div class="col-md-auto m-3">
                        <label for="formControlInput" class="form-label">Vaccine Brand</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_additionalbrand" id="view_additionalbrand" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
  
  
              </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button  type="button" class="btn btn-danger">Print</button> --}}
          <button  type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   <!-- end of view modal -->

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
        ]

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
    // VIEW
     // View
     $('body').on('click', '.viewEmployee', function () {
                var id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    url: "{{ url('employees/show') }}",
                    data: { id: id},
                    dataType: 'json',
                    success: function(data){
                        $('#viewModal').modal('show');
                        $('#view_id').val(data.id);
                        $('#view_lastname').val(data.lastname);
                        $('#view_firstname').val(data.firstname);
                        $('#view_middlename').val(data.middlename);
                        $('#view_email').val(data.email);
                        $('#view_empnumber').val(data.empnumber);
                        $('#view_itemnumber').val(data.itemnumber);
                        $('#view_tin').val(data.tin);
                        $('#view_gsis').val(data.gsis);
                        $('#view_philhealth').val(data.philhealth);
                        $('#view_pagibig').val(data.pagibig);
                        $('#view_position').val(data.position);
                        $('#view_coordinatorship').val(data.coordinatorship);
                        $('#view_advisory').val(data.advisory);
                        $('#view_loads').val(data.loads);
                        $('#view_subjects').val(data.subjects);
                        $('#view_firstdose').val(data.firstdose);
                        $('#view_seconddose').val(data.seconddose);
                        $('#view_additional').val(data.additional);
                        $('#view_firstbrand').val(data.firstbrand);
                        $('#view_secondbrand').val(data.secondbrand);
                        $('#view_additionalbrand').val(data.additionalbrand);
                    }
                });
            });
});
</script>

@endsection
