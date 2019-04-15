<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Parant;

class StudentController extends Controller
{	

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.student');
	}

    public function viewStudents() {
    	$data['students'] = Student::where('is_deleted',0)->get();
    	return view('admin.view_students',$data);
    }

    public function student($id) {
    	$data['student'] =  Student::where('is_deleted',0)->find($id);
    	if( !isset($data['student']->id) ) {
    		session()->flash('message','Student with an ID:'.$id.' doesn\'t exist!');
			session()->flash('class','alert-danger');
    		return redirect('admin/student/view');
    	}
    	return view('admin.open_student',$data);
    }

    public function updateStudent(Request $request) {

		$this->validate($request, [
			'pic_path' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);


		$id = $request->input('student_id');
		$parant_id = $request->input('parant_id');
		$student = Student::find($id);
		$parant = Parant::find($parant_id);
		
		if ($request->hasFile('pic_path')) {
			$image = $request->file('pic_path');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/students');
			$image->move($destinationPath, $name);
			$student->student_pic_path = $name;
		}

		$student->student_fname = $request->input('fname');
		$student->student_lname = $request->input('lname');
		$student->date_of_birth = $request->input('dob');
		$student->gender = $request->input('gender');
		$student->place_of_birth = $request->input('pob');
		$student->class_req = $request->input('class_req');
		$student->monthly_fees = $request->input('monthly_fees');
		$student->annual_charges = $request->input('annual_charges');

		$parant->father_name = $request->input('father_name');
		$parant->mother_name = $request->input('mother_name');
		$parant->guardian = $request->input('guardian');
		$parant->father_occupation = $request->input('occupation');
		$parant->father_cnic = $request->input('cnic');
		$parant->address = $request->input('address');
		$parant->phone = $request->input('phone');
		$parant->mobile = $request->input('mobile');
		


		if($student->save() && $parant->save() ) {
			session()->flash('message','Student Details Updated Sucessfully!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Student Details Not Updated!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/student/'.$id);			

	}

	public function deleteStudent(Request $request) {
        Student::where('id', $request->std_id)
        ->update([ 
            'is_deleted' => 1
        ]);

        return "1";
    }

    public function createStudent(Request $request) {

		$this->validate($request, [
			'pic_path' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);


		$name = 'avatar5.png';
		if ($request->hasFile('pic_path')) {
			$image = $request->file('pic_path');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/students');
			$image->move($destinationPath, $name);
		} else {
			if($request->input('gender') == 0) {
				$name = 'avatar2.png';
			}
		}

		$std = new Student;
		$parant = new Parant;

		
		$parant->father_name = $request->input('father_name');
		$parant->mother_name = $request->input('mother_name');
		$parant->guardian = $request->input('guardian');
		$parant->father_occupation = $request->input('father_occupation');
		$parant->father_cnic = $request->input('father_cnic');
		$parant->address = $request->input('address');
		$parant->phone = $request->input('phone');
		$parant->mobile = $request->input('mobile');
		$parant->save();
		
		$std->parent_id = $parant->id;
		$std->student_fname = $request->input('std_fname');
		$std->student_lname = $request->input('std_lname');
		$std->date_of_birth = $request->input('dob');
		$std->gender = $request->input('gender');
		$std->place_of_birth = $request->input('pob');
		$std->class_req = $request->input('class_req');
		$std->monthly_fees = $request->input('monthly_fees');
		$std->annual_charges = $request->input('annual_charges');
		$std->student_pic_path = $name;

		// $admission->admission_date = Carbon::parse(now('Asia/Karachi'))->format('Y-m-d H:i:s');


		if($std->save()) {
			session()->flash('message','Student Sucessfully Added!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Student Not Added!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/student/new');			

	}


}
