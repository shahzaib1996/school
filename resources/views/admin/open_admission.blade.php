@extends('admin.layouts.app')

@section('content')

<section class="content-header">
  <h1>
    Admission Form
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

    @if($admission)
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" id="status">
          Admission Details 
          @if($admission->is_approved == 1 )
          <label class="label label-success">Approved</label>
          @else
          <label class="label label-danger">Pending</label>
          @endif
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
                <form role="form" action="{{route('admin.admission.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
               <table class="table table-bordered table-hover f16">
                <tbody>
                  <tr>
                    <td width="30%">ID#</td>
                    <td width="70%" > {{$admission->id}} <input type="hidden" name="admission_id" value="{{$admission->id}}"> </td>
                  </tr>

                  <tr>
                    <td>Admission Date</td>
                    <td> {{$admission->admission_date}} </td>
                  </tr>

                  <tr>
                    <td>Student Image</td>
                    <td> <img src="{{asset('students')}}/{{$admission->student_pic_path}}" style="height: 100px;width: 100px;border-radius: 50px;border:1px solid grey;"> </td>
                  </tr>

                  <tr>
                    <td>Student First Name</td>
                    <td> <span class="state">{{$admission->student_fname}}</span> <input type="hidden" name="fname" value="{{$admission->student_fname}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Student Last Name</td>
                    <td> <span class="state">{{$admission->student_lname}}</span> <input type="hidden" name="lname" value="{{$admission->student_lname}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Date of Birth </td>
                    <td> <span class="state">{{$admission->date_of_birth}}</span> <input type="hidden" name="dob" value="{{$admission->date_of_birth}}" class="form-control inhidd" required > </td>
                  </tr>

                  <tr>
                    <td>Place of Birth </td>
                    <td> <span class="state">{{$admission->place_of_birth}}</span> <input type="hidden" name="pob" value="{{$admission->place_of_birth}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Admission required in class </td>
                    <td> <span class="state">{{$admission->class_req}}</span> <input type="hidden" name="class_req" value="{{$admission->class_req}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Gender</td>
                    <td> <span class="state">@if($admission->gender == 1) Male @else Female @endif</span>
                      <select  id="gender" name="gender" class="form-control" style="display: none;" required >
                        <option value="">Please Select Gender</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>Father name </td>
                    <td> <span class="state">{{$admission->father_name}}</span> <input type="hidden" name="father_name" value="{{$admission->father_name}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Mother name </td>
                    <td> <span class="state">{{$admission->mother_name}}</span> <input type="hidden" name="mother_name" value="{{$admission->mother_name}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Guardian </td>
                    <td> <span class="state">{{$admission->guardian}}</span> <input type="hidden" name="guardian" value="{{$admission->guardian}}" class="form-control inhid" > </td>
                  </tr>

                  <tr>
                    <td>Phone </td>
                    <td> <span class="state">{{$admission->phone}}</span> <input type="hidden" name="phone" value="{{$admission->phone}}" class="form-control inhid" > </td>
                  </tr>

                  <tr>
                    <td>Mobile </td>
                    <td> <span class="state">{{$admission->mobile}}</span> <input type="hidden" name="mobile" value="{{$admission->mobile}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Address </td>
                    <td> <span class="state">{{$admission->address}}</span> <input type="hidden" name="address" value="{{$admission->address}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Father Occupation </td>
                    <td> <span class="state">{{$admission->father_occupation}}</span> <input type="hidden" name="occupation" value="{{$admission->father_occupation}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr>
                    <td>Father CNIC </td>
                    <td> <span class="state">{{$admission->father_cnic}}</span> <input type="hidden" name="cnic" value="{{$admission->father_cnic}}" class="form-control inhid" required > </td>
                  </tr>

                  <tr id="select-file" style="display: none;">
                    <td>Student Image</td>
                    <td> <input type="file" name="pic_path" value="{{$admission->father_cnic}}" class="form-control" > </td>
                  </tr>

                  <tr>
                    <td></td>
                      @if($admission->is_approved != 1)
                    <td> <input type="submit" name="submit" value="Update Information" class="btn btn-lg btn-primary">  
                      <input type="button" name="approve" class="btn btn-lg btn-success" id="approve-btn" value="Approve" style="margin-left: 20px;"> 
                    </td>
                      @endif
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

    $('#gender').val('{{$admission->gender}}');


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


    $('#approve-btn').click(function(){
      var adm_id = parseInt('{{$admission->id}}');

      $.post("{{url('/admin/admission/approve')}}",
      {
       "_token": "{{ csrf_token() }}",
       adm_id: adm_id

     },
     function(data,status) {

      if(data === "1") {
        $('#status').html('Admission Details <label class="label label-success">Approved</label>');
        alert("Approved!");

      } else {
        $('#status').html('Admission Details <label class="label label-danger">Pending</label>');
        alert("Failed to Approve");
      } 



     } 


     );


    }); //end click event
    

  })


</script>
@endpush