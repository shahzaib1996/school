<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Parant;
use PDF;
use Carbon\Carbon;

class FeesController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewStudentsPDF() {
        $data['students'] = Student::where('is_deleted',0)->get();
    	$data['issueDate'] = Carbon::parse(now())->format('Y-m-d');
    	return view('admin.view_student_pdf',$data);
    }

    // public function makeStudentsPDF(Request $request) {
    // 	return $request->input('student_id');
    // 	// return "Testgin";
    // }

    public function makeStudentsPDF(Request $request) {
        // $data = ['title' => 'MarryWood School'];
        // $pdf = PDF::loadView('admin.fee_vouchers_pdf', $data);

        // $data['students'] = Student::where('is_deleted',0)->get();

        $pdf = PDF::loadView('admin.fee_vouchers_pdf')->setPaper('a4', 'landscape');
  
        return $pdf->download('test.pdf');
    }



}
