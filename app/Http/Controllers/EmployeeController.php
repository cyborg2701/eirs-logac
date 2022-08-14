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
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'"  class="btn btn-warning btn-sm editEmployee">Edit</a> ';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteEmployee">Delete</a>';
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
            'middlename' => 'required',
            'email' => 'required|unique:employees',
            'empnumber' => 'required',
            'itemnumber' => 'required',
            'tin' => 'required',
            'philhealth' => 'required',
            'pagibig' => 'required',
            'gsis' => 'required',
            'position' => 'required',
            'subjects' => 'required',
            'advisory' => 'required',
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
                'subjects' => $request->subjects,
                'advisory' => $request->advisory,
                'loads' => $request->loads,
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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $where = [
            'id' => $request->id
        ];
        $employees  = Employee::where($where)->first();
        return response()->json($employees);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return response()->json([
            'success'=>'Employee deleted successfully.'
        ]);
    }
}
