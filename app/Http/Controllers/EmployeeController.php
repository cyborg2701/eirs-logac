<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use DataTables;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = [];
        if($request->ajax()) {
            $employees = Employee::latest()->get();
            return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'"  class="btn btn-info btn-sm viewEmployee"><i class="fas fa-fw fa-eye"></i> View</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-success btn-sm editEmployee"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteEmployee"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:employees',
            'empnumber' => 'required',
            'itemnumber' => 'required',
            'tin' => 'required',
            'philhealth' => 'required',
            'pagibig' => 'required',
            'gsis' => 'required',
            'position' => 'required',
            'subjects' => 'required',
            'loads' => 'required',
        ]);


        Employee::updateOrCreate(
            ['id' => $request->id],
            [
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'email' => $request->email,
                'empnumber' => $request->empnumber,
                'itemnumber' => $request->itemnumber,
                'tin' => $request->tin,
                'philhealth' => $request->philhealth,
                'pagibig' => $request->pagibig,
                'gsis' => $request->gsis,
                'position' => $request->position,
                'coordinatorship' => $request->coordinatorship,
                'subjects' => $request->subjects,
                'advisory' => $request->advisory,
                'loads' => $request->loads,
                'firstdose' => $request->firstdose,
                'seconddose' => $request->seconddose,
                'additional' => $request->additional,
                'firstbrand' => $request->firstbrand,
                'secondbrand' => $request->secondbrand,
                'additionalbrand' => $request->additionalbrand
            ]
        );
        return response()->json(['success'=>'Employee saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $where = [
            'id' => $request->id
        ];
        $employees  = Employee::where($where)->first();
        return response()->json($employees,);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employees = Employee::where('id', '=' ,$request->id)->first();

        $employees->lastname = $request->lastname;
        $employees->firstname = $request->firstname;
        $employees->middlename = $request->middlename;
        $employees->email = $request->email;
        $employees->empnumber = $request->empnumber;
        $employees->itemnumber = $request->itemnumber;
        $employees->tin = $request->tin;
        $employees->gsis = $request->gsis;
        $employees->philhealth = $request->philhealth;
        $employees->pagibig = $request->pagibig;
        $employees->position = $request->position;
        $employees->coordinatorship = $request->coordinatorship;
        $employees->advisory = $request->advisory;
        $employees->loads = $request->loads;
        $employees->subjects = $request->subjects;
        $employees->firstdose = $request->firstdose;
        $employees->seconddose = $request->seconddose;
        $employees->additional = $request->additional;
        $employees->firstbrand = $request->firstbrand;
        $employees->secondbrand = $request->secondbrand;
        $employees->additionalbrand = $request->additionalbrand;

        $employees->save();
        return response()->json(['success'=>'Employee updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employees = Employee::where('id', $request->id)->delete();
        return response()->json([
            'success'=>'Employee deleted successfully.'
        ]);
    }
}
