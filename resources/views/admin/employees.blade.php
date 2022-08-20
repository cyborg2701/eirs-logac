@extends('layouts.admin')

@section('main-content')
<style>
  #title {
    display: none;
  }
  @media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #title {
      display: block;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
    }
}
</style>
    <h1 class="h3 mb-2 text-gray-800" hidden>{{ __('Employee List') }}</h1>
    
    <div class="text-right">
      <!-- Button trigger modal -->
      <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addEmployee">Add Employee</a>
      
    </div>
<div class="mt-2">
  <table class="table table-bordered data-table nowrap" style="width:100%">
    <thead>
        <tr class="table-primary">
          <td class="text-center">No.</td>
          <td class="text-center">Employee Number</td>
          <td class="text-center">Item Number</td>
          <td class="text-center">Name</td>
          <td class="text-center">Position</td>
          <td class="text-center">Email</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody></tbody>
  </table>
<div>

  {{-- add modal --}}
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeading" muted>Employee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <input type="text" class="form-control text-capitalize" name="lastname" id="lastname" placeholder="Dela Cruz" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control text-capitalize" name="firstname" id="firstname" placeholder="Pedro" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Middle Name</label>
                            <input type="text" class="form-control text-capitalize" name="middlename" id="middlename" placeholder="Dantes">
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
                            <input type="text" class="form-control text-capitalize" name="empnumber" id="empnumber" placeholder="00212351" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Item Number</label>
                            <input type="text" class="form-control text-capitalize" name="itemnumber" id="itemnumber" placeholder="10023-20351" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">TIN</label>
                            <input type="text" class="form-control text-capitalize" name="tin" id="tin" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">PHILHEALTH</label>
                            <input type="text" class="form-control text-capitalize" name="philhealth" id="philhealth" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">PAGIBIG</label>
                            <input type="text" class="form-control text-capitalize" name="pagibig" id="pagibig" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">GSIS</label>
                            <input type="text" class="form-control text-capitalize" name="gsis" id="gsis" placeholder="" required>
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
                            <input type="text" class="form-control text-capitalize" name="position" id="position" placeholder="Teacher I" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Coordinatorship</label>
                            <input type="text" class="form-control text-capitalize" name="coordinatorship" id="coordinatorship" placeholder="">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Advisory Class</label>
                            <input type="text" class="form-control text-capitalize" name="advisory" id="advisory" placeholder="Grade 7">
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Teaching Loads</label>
                            <input type="text" class="form-control text-capitalize" name="loads" id="loads" placeholder="3" required>
                        </div>
                        <div class="col-md-8 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Subjects Taught</label>
                            <input type="text" class="form-control text-capitalize" name="subjects" id="subjects" placeholder="Mathematics, Science, etc." required>
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
                            <input type="text" class="form-control text-capitalize" name="firstbrand" id="firstbrand" placeholder="" required>
                        </div>
                        <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Vaccine Brand</label>
                            <input type="text" class="form-control text-capitalize" name="secondbrand" id="secondbrand" placeholder="" required>
                        </div>
                         <div class="col-md-4 p-1">
                            <label for="formControlInput" class="form-label fw-bold">Vaccine Brand</label>
                            <input type="text" class="form-control text-capitalize" name="additionalbrand" id="additionalbrand" placeholder="Optional" required>
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




{{-- view modal --}}
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeading" muted>Employee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="printThis">
        <h2 id="title">Employee Information</h2>
        <form id="employeeForm" name="employeeForm" enctype="multipart/form-data">
          {{-- 1st row --}}
          <div class="row">
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <span class="badge bg-success fs-6">Personal Information</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
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
                      <div class="col-md-4 m-3">
                        <label for="formControlInput" class="form-label">Email</label>
                        <input type="text" class="form-control-plaintext fw-bold text-uppercase" name="view_email" id="view_email" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <span class="badge bg-success fs-6">Government Numbers</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
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
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    <span class="badge bg-success fs-6">Item Information</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                  <div class="accordion-body">
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
                        <textarea class="form-control-plaintext fw-bold text-uppercase" id="view_subjects" rows="3" readonly></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                    <span class="badge bg-success fs-6">Item Information</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                  <div class="accordion-body">
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
      </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-primary" id="print">Print</button>
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
        responsive: true,
        select: true,
        ajax: "{{ url('admin/employees') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'empnumber', name: 'empnumber'},
            {data: 'itemnumber', name: 'itemnumber'},
            {data: 'lastname', name: '', class:'text-capitalize'},
            {data: 'position', name: 'position', class:'text-capitalize'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ],
        columnDefs: [ 
          {
            'targets': 3,
            'render': function(data, type, row){
              return data +', '+row.firstname+' ' +row.middlename;
            },
            'targets': 3
        }
      ]
    });
    new $.fn.dataTable.FixedHeader( table );

    // SHOW ADD MODAL
    $('#addEmployee').click(function () {
        $('#id').val('');
        $('#employeeForm').trigger("reset");
        $('#addModal').modal('show');
        $('#savedata').show();
        $('#updatedata').hide();
        $('#cancel').html('Cancel');
        $('#error').html('');
    });


    // ADD FUNCTION
    $('#savedata').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#employeeForm').serialize(),
                    url: "{{ url('admin/store') }}",
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
                $.ajax({
                    data: $('#employeeForm').serialize(),
                    url: "{{ url('admin/update') }}",
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
                var id = $(this).data('id');
                $('#savedata').hide();
                $('#cancel').html('Cancel');
                $('#updatedata').show();
                $.ajax({
                    type:"GET",
                    url: "{{ url('admin/edit') }}",
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

            // View
    $('body').on('click', '.viewEmployee', function () {
                var id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    url: "{{ url('admin/show') }}",
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


    // DELETE 
    $('body').on('click', '.deleteEmployee', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this employee?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Employee deleted successfully','Success');
                },
                error: function (data) {
                  toastr.error(data['responseJSON']['message'],'Error has occured');
                }
            });
        }

    });
    document.getElementById("print").onclick = function () {
    printElement(document.getElementById("printThis"));
};
function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
});
</script>

@endsection
