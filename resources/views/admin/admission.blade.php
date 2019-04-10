@extends('admin.layouts.app')

@section('content')

<section class="content-header">
      <h1>
        Dashboard
      </h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

<!--------------------------
 | Your Page Content Here |
-------------------------->
    <div class="row">
      <!-- ./col -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h2 class="box-title">Admission Form</h2>

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            

            <form role="form" action="{{route('admin.admission.create')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="box-body">

                @if(session()->has('message'))
                <div class="alert {{session('class')}}">
                  {{session('message')}}
                </div>
                @endif

                <div class="col-md-6">

                  <h3>Student Information</h3>
                   
                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" class="form-control" id="" name="std_fname" placeholder="Enter here..." required>
                </div>
                
                <div class="form-group">
                  <label >Last Name</label>
                  <input type="text" class="form-control" id="" name="std_lname" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Date of Birth</label>
                  <input type="date" class="form-control" id="" name="dob" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Place of Birth</label>
                  <input type="text" class="form-control" id="" name="pob" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" id="" name="gender" required>
                    <option value="">Please Select Gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                  </select>
                </div>

                <div class="form-group">
                  <label >Class Required</label>
                  <input type="text" class="form-control" id="" name="class_req" placeholder="Enter here..." required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Select Student Picture</label>
                  <input type="file" id="exampleInputFile" name="pic_path">
                </div>
                
                </div>


                <div class="col-md-6">
                  <h3>Parent Information</h3>

                <div class="form-group">
                  <label >Father Name</label>
                  <input type="text" class="form-control" id="" name="father_name" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Mother Name</label>
                  <input type="text" class="form-control" id="" name="mother_name" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Guardian Name (IF ANY)</label>
                  <input type="text" class="form-control" id="" name="guardian" placeholder="Enter here..." >
                </div>

                <div class="form-group">
                  <label >Address</label>
                  <input type="text" class="form-control" id="" name="address" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Father's Occupation</label>
                  <input type="text" class="form-control" id="" name="father_occupation" placeholder="Enter here..." required>
                </div>

                <div class="form-group">
                  <label >Father's CNIC</label>
                  <input type="text" class="form-control" id="" name="father_cnic" placeholder="e.g 42101-1234567-8" required>
                </div>

                <div class="form-group">
                  <label >Phone Number</label>
                  <input type="text" class="form-control" id="" name="phone" placeholder="Enter here...">
                </div>

                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="text" class="form-control" id="" name="mobile" placeholder="Enter here..." required>
                </div>

                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="text-align: right;">
                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg">
              </div>
            </form>

          </div>
          <!-- /.box -->

        </div>



    </div>

</section>

@endsection