<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = DB::table('employees')
                        ->where('email', '=',  Auth::user()->email)
                        ->get();
        return view('/home', compact('employees'));
    }
    public function adminHome()
    {

        $employees = Employee::all()->count();

        // $users = User::where('is_admin', '=', '0')->count();
        $widget = [
            'employees' => $employees,
            //...
        ];
        return view('admin_home', compact('widget'));
    }
}
