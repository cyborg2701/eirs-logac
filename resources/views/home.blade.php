@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-muted">Employee Information</div>
                <div class="card-body">
                   @foreach($employees as $employee)
                         {{-- NAME --}}
                            <div class="row p-2">
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">Name</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->lastname }}, {{ $employee->firstname }} {{ $employee->middlename }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">Employee Number</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->empnumber }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">Position</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->position }}" readonly>
                            </div>
                        </div>      
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label for="formControlInput" class="form-label">TIN</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->tin }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="formControlInput" class="form-label">PAGIBIG</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->pagibig }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="formControlInput" class="form-label">PHILHEALTH</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->philhealth }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="formControlInput" class="form-label">GSIS</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->gsis }}" readonly>
                            </div>
                        </div> 
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">ITEM NUMBER</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->itemnumber }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="formControlInput" class="form-label">SUBJECTS</label>
                                <textarea name="subjects" id="subjects" cols="30" rows="2" class="form-control" readonly>{{ $employee->subjects }}</textarea>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">ADVISORY CLASS</label>
                                <input type="email" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->advisory }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="formControlInput" class="form-label">TEACHING LOADS</label>
                                <input type="number" class="form-control" id="formControlInput" placeholder="name@example.com" value="{{ $employee->loads }}" readonly>
                            </div>
                        </div>        
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection