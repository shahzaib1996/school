<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Parant;
use App\Klass;

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

    public function fill_class_dd() {
        $classes = Klass::all(['class']);
        return $classes;
    }

    // public function makeStudentsPDF(Request $request) {
    // 	return $request->input('student_id');
    // 	// return "Testgin";
    // }

    public function makeStudentsPDF(Request $request) {
        // $data = ['title' => 'MarryWood School'];
        // $pdf = PDF::loadView('admin.fee_vouchers_pdf', $data);

        // $data['students'] = Student::where('is_deleted',0)->get();
        $std_ids = $request->input('student_id');
        $issueDate = $request->input('issueDate');
        $dueDate = $request->input('dueDate');
        $challanMonth = $request->input('challanMonth');
        if($std_ids != '') {

            $data['students'] = Student::whereIn('id',$std_ids)->get();

            $data['title'] = "Fee Vouchers";
            $data['issueDate'] = Carbon::parse($issueDate)->format('d-M-Y');
            $data['dueDate'] = Carbon::parse($dueDate)->format('d-M-Y');
            $data['challanMonth'] = $challanMonth;
            $fileName = $data['issueDate']." - ".$data['dueDate'];
            // return $data;
            $pdf = PDF::loadView('admin.fee_vouchers_pdf',$data)->setPaper('a4', 'landscape');
            return $pdf->download($fileName.'.pdf');


        } else {
            session()->flash('message','No Student selected!');
            session()->flash('class','alert-danger');
            return redirect('admin/student/pdf/view');
        }

        
    }



}
