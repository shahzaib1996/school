@extends('admin.layouts.app')

@section('content')

<section class="content-header">
  <h1>
    Student
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

    @if(session()->has('message'))
    <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
    @endif

    @if($student)
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" id="status">
          Student Details 
        </a></li>

      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

          <div class="box-body">

            <div class="box box-solid">

              <!-- /.box-header -->
              <div class="box-body">
                <h4 style="margin-top:0px;">
                  <input type="checkbox" class="" name="edit" id="edit" value="edit"> Enable Editing
                </h4>
                <form role="form" action="{{route('admin.student.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
               <table class="table table-bordered table-hover f16">
                <tbody>
                  <tr>
                    <td width="30%">ID#</td>
                    <td width="70%" > {{$student->id}} <input type="hidden" name="student_id" value="{{$student->id}}"> <input type="hidden" name="parant_id" value="{{$student->parent_id}}"> </td>
                  </tr>

                  <tr>
                    <td>Student Image</td>
                    <td> <img src="{{asset('students')}}/{{$student->student_pic_path}}" style="height: 100px;width: 100px;border-radius: 50px;border:1px solid grey;"> </td>
                  </tr>

                  <tr>
                    <td>Student First Name</td>
                    <td> <span class="state">{{$student->student_fname}}</span> <input type="hidden" name="fname" value="{{$student->student_fname}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Student Last Name</td>
                    <td> <span class="state">{{$student->student_lname}}</span> <input type="hidden" name="lname" value="{{$student->student_lname}}" class="form-control inhid" required > </td>
                  </tr>
                  
                  <tr>
                    <td>Class </td>
                    <td> <span class="state">{{$student->class_req}}</span> <input type="hidden" name="class_req" value="{{$student->class_req}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Monthly Fees </td>
                    <td> <span class="state">{{$student->monthly_fees}}</span> <input type="hidden" name="monthly_fees" value="{{$student->monthly_fees}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Annual Charges </td>
                    <td> <span class="state">{{$student->annual_charges}}</span> <input type="hidden" name="annual_charges" value="{{$student->annual_charges}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Date of Birth </td>
                    <td> <span class="state">{{$student->date_of_birth}}</span> <input type="hidden" name="dob" value="{{$student->date_of_birth}}" class="form-control inhidd" required > </td>
                  </tr>

                  <tr>
                    <td>Place of Birth </td>
                    <td> <span class="state">{{$student->place_of_birth}}</span> <input type="hidden" name="pob" value="{{$student->place_of_birth}}" class="form-control inhid" required > </td>
                  </tr>


                  <tr>
                    <td>Gender</td>
                    <td> <span class="state">@if($student->gender == 1) Male @else Female @endif</span>
                      <select  id="gender" name="gender" class="form-control" style="display: none;" required >
                        <option value="">Please Select Gender</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>Father name </td>
                    <td> <span class="state">{{$student->parent->father_name}}</span> <input type="hidden" name="father_name" value="{{$student->parent->father_name}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Mother name </td>
                    <td> <span class="state">{{$student->parent->mother_name}}</span> <input type="hidden" name="mother_name" value="{{$student->parent->mother_name}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Guardian </td>
                    <td> <span class="state">{{$student->parent->guardian}}</span> <input type="hidden" name="guardian" value="{{$student->parent->guardian}}" class="form-control inhid" > </td>
                  </tr>

                  <tr>
                    <td>Phone </td>
                    <td> <span class="state">{{$student->parent->phone}}</span> <input type="hidden" name="phone" value="{{$student->parent->phone}}" class="form-control inhid" > </td>
                  </tr>

                  <tr>
                    <td>Mobile </td>
                    <td> <span class="state">{{$student->parent->mobile}}</span> <input type="hidden" name="mobile" value="{{$student->parent->mobile}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Address </td>
                    <td> <span class="state">{{$student->parent->address}}</span> <input type="hidden" name="address" value="{{$student->parent->address}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Father Occupation </td>
                    <td> <span class="state">{{$student->parent->father_occupation}}</span> <input type="hidden" name="occupation" value="{{$student->parent->father_occupation}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Father CNIC </td>
                    <td> <span class="state">{{$student->parent->father_cnic}}</span> <input type="hidden" name="cnic" value="{{$student->parent->father_cnic}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr id="select-file" style="display: none;">
                    <td>Student Image</td>
                    <td> <input type="file" name="pic_path" class="form-control" > </td>
                  </tr>

                  <tr>
                    <td></td>
                    <td> <input type="submit" name="submit" value="Update Information" class="btn btn-lg btn-primary">  
                      <input type="button" name="delete" class="btn btn-lg btn-danger" id="delete-btn" value="Delete" style="margin-left: 20px;"> 
                    </td>
                      
                  </tr>

                </tbody>
              </table>
            </form>

            </div>
            <!-- /.box-body -->

          </div>
        </div>

      </div>
      <!-- /.tab-pane -->

      <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
  </div>
  <script type="text/javascript">
    
    
  </script>
  @endif




</div> <!-- Col end -->

</div>

</section>

@endsection

@push('css')

  <!-- iCheck for checkboxes and radio inputs -->
  <link href="{{ asset('admin/plugins/iCheck/all.css') }}" rel="stylesheet">


<style type="text/css">
  


.table>thead>tr>th {
  vertical-align: middle;
  white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
}
dt,dd {
  font-weight: normal !important;
  line-height: 40px; 
}
.f16 {
  font-size: 16px !important;
}
.red {
  color: red !important;
}
.green{
  color: green !important;
}
</style>

@endpush

@push('scripts')

<!-- iCheck 1.0.1 -->
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>

<script>

  $(function () {

    $('#gender').val('{{$student->gender}}');


    $('#admissionTable').dataTable({
      "aaSorting": []
    });

    $('#edit').on('change', function() {
      if(this.checked) {
        
        // $('input').attr('',false);
        $('.inhid').attr('type','text');
        $('.inhidd').attr('type','date');
        $('.state').hide();
        $('select').show();
        $('#select-file').show();
        
      } else {
        $('.inhid').attr('type','hidden');
        $('.inhidd').attr('type','hidden');
        $('.state').show();
        $('select').hide();
        $('#select-file').hide();

      }
    });


    $('#delete-btn').click(function(){
      var std_id = parseInt('{{$student->id}}');

      $.post("{{url('/admin/student/delete')}}",
      {
       "_token": "{{ csrf_token() }}",
       std_id: std_id

     },
     function(data,status) {

      if(data === "1") {
        $('#status').html('Student Details <label class="label label-danger">Deleted</label>');
        alert("Student Deleted");

      } else {
        $('#status').html('Student Details <label class="label label-success">Active</label>');
        alert("Student Deleted");
      } 



     } 


     );


    }); //end click event
    

  })


</script>
@endpush