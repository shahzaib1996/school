<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Parant;

class FeesController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewStudentsPDF() {
    	$data['students'] = Student::where('is_deleted',0)->get();
    	return view('admin.view_student_pdf',$data);
    }

    public function makeStudentsPDF(Request $request) {
    	return $request->input('student_id');
    	// return "Testgin";
    }

}
