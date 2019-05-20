<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Klass;

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

    public function addClasses() {
    	$data['klasses'] = Klass::all();
    	return view('admin.add_class',$data);
    }

    public function addNewClass(Request $request) {
    	$klass = new Klass;
    	$klass->class = $request->input('class_name');

    	if($klass->save()) {
			session()->flash('message','Class has been created!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Class has not been created!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/class/new');		

    }

    public function deleteClass($id) {
    	
        $klass = Klass::find($id);
		if($klass->delete()) {
			session()->flash('message','Class has been Deleted!');
			session()->flash('class','alert-success');
			
		} else {
			session()->flash('message','Class has not been Deleted!');
			session()->flash('class','alert-danger');
		}

		return redirect('admin/class/new');		


    }

}
