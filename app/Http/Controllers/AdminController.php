<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class AdminController extends Controller
{
    //

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$data['studentsCount'] = Student::all()->count();
    	return view('admin.index',$data);
    }
}
