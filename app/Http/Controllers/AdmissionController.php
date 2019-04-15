<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use Carbon\Carbon;
use App\Student;
use App\Parant;

class AdmissionController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.admission');
	}

	public function createAdmission(Request $request) {

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

		$admission = new Admission;

		$admission->student_fname = $request->input('std_fname');
		$admission->student_lname = $request->input('std_lname');
		$admission->date_of_birth = $request->input('dob');
		$admission->gender = $request->input('gender');
		$admission->place_of_birth = $request->input('pob');
		$admission->class_req = $request->input('class_req');
		$admission->monthly_fees = $request->input('monthly_fees');
		$admission->annual_charges = $request->input('annual_charges');
		$admission->father_name = $request->input('father_name');
		$admission->mother_name = $request->input('mother_name');
		$admission->guardian = $request->input('guardian');
		$admission->father_occupation = $request->input('father_occupation');
		$admission->father_cnic = $request->input('father_cnic');
		$admission->address = $request->input('address');
		$admission->phone = $request->input('phone');
		$admission->mobile = $request->input('mobile');
		$admission->student_pic_path = $name;

		$admission->admission_date = Carbon::parse(now('Asia/Karachi'))->format('Y-m-d H:i:s');


		if($admission->save()) {
			session()->flash('message','Admission Form Sucessfully Submitted!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Admission Form Not Submitted!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/admission/new');			

	}

	
	public function updateAdmission(Request $request) {

		$this->validate($request, [
			'pic_path' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);


		$id = $request->input('admission_id');
		$admission = Admission::find($id);
		
		if ($request->hasFile('pic_path')) {
			$image = $request->file('pic_path');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/students');
			$image->move($destinationPath, $name);
			$admission->student_pic_path = $name;
		}

		$admission->student_fname = $request->input('fname');
		$admission->student_lname = $request->input('lname');
		$admission->date_of_birth = $request->input('dob');
		$admission->gender = $request->input('gender');
		$admission->place_of_birth = $request->input('pob');
		$admission->class_req = $request->input('class_req');
		$admission->monthly_fees = $request->input('monthly_fees');
		$admission->annual_charges = $request->input('annual_charges');
		$admission->father_name = $request->input('father_name');
		$admission->mother_name = $request->input('mother_name');
		$admission->guardian = $request->input('guardian');
		$admission->father_occupation = $request->input('occupation');
		$admission->father_cnic = $request->input('cnic');
		$admission->address = $request->input('address');
		$admission->phone = $request->input('phone');
		$admission->mobile = $request->input('mobile');
		


		if($admission->save()) {
			session()->flash('message','Admission Details Updated Sucessfully!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Admission Details Not Updated!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/admission/'.$id);			

	}


	public function admission($id) {
		$data['admission'] = Admission::where('is_deleted',0)->find($id);
		return view('admin.open_admission',$data);
	}

	public function viewAdmissions() {
		$data['admissions'] = Admission::where('is_deleted',0)->orderBy('id','desc')->get();
		return view('admin.view_admissions',$data);
	}

	public function approveAdmission(Request $request) {
        Admission::where('id', $request->adm_id)
        ->update([ 
            'is_approved' => 1
        ]);

        $adm = Admission::find($request->adm_id);

        $parent = new Parant;
        $parent->father_name = $adm->father_name;
        $parent->mother_name = $adm->mother_name;
        $parent->guardian = $adm->guardian;
        $parent->father_occupation = $adm->father_occupation;
        $parent->father_cnic = $adm->father_cnic;
        $parent->address = $adm->address;
        $parent->phone = $adm->phone;
        $parent->mobile = $adm->mobile;

        $parent->save();
        $parent_id=$parent->id;

        $std = new Student;
        $std->student_fname = $adm->student_fname;
        $std->student_lname = $adm->student_lname;
        $std->date_of_birth = $adm->date_of_birth;
        $std->place_of_birth = $adm->place_of_birth;
        $std->class_req = $adm->class_req;
        $std->monthly_fees = $adm->monthly_fees;
        $std->annual_charges = $adm->annual_charges;
        $std->student_pic_path = $adm->student_pic_path;
        $std->gender = $adm->gender;
        $std->parent_id = $parent_id;

        $std->save();


        return "1";
    }

}
