@extends('admin.layouts.app')

@section('content')

<section class="content-header">
  <h1>
    Students Monthly Fee Vouchers
  </h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <!-- ./col -->
    <div class="col-md-12">

      @if(session()->has('message'))
      <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
      @endif

      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Students List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <form action="{{route('admin.student.pdf.make')}}" method="POST">
            @csrf

            <input type="button" class="btn btn-primary check-all" value="Check All" style="margin-right: 20px;">
            <input type="button" class="btn btn-warning uncheck-all" value="Uncheck All" style="margin-right: 20px;">
            <input type="submit" name="submit" class="btn btn-success" value="Make PDF" style="">


            <div class="row">

              <div class="form-group col-md-3">
                <label for="">Issue Date</label>
                <input type="date" class="form-control" id="issueDate" name="issueDate" value="{{$issueDate}}" required>
              </div>

              <div class="form-group col-md-3">
                <label for="">Due Date</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" required>
              </div>

              <div class="form-group col-md-3">
                <label for="">Challan for Month</label>
                <select name="challanMonth" class="form-control" required>
                  <option value="">Select Month...</option>
                  <option value="January">January</option>
                  <option value="Febraury">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
              </div>

            </div>

            <div class="row">


              <div class="form-group col-md-3">
                <label for="">Select Class To Filter</label>
                <select id="classFilter" class="form-control">
                  <option value="">Select class...</option>

                </select>
              </div>

            </div>

            <table id="studentTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Image</th>

                  <th>Student Name</th>
                  <th>Father Name</th>
                  <th>Class</th>
                  <th>PDF</th>
                </tr>
              </thead>
              <tbody>


                @foreach( $students as $std )
                <tr>
                  <td style="width: 50px;text-align: center;"> <img src="{{asset('students')}}/{{$std->student_pic_path}}" class="std-pic"> </td>
                  
                  <td >{{$std->student_fname}} {{$std->student_lname}}</td>
                  <td>{{$std->parent->father_name}}</td>
                  <td>{{$std->class_req}}</td>
                  <td style="width: 40px;text-align: center;">
                    <input type="checkbox" name="student_id[]" class="pdf-check" value="{{$std->id}}">
                  </td>

                </tr>
                @endforeach

                
              </tbody>
            </table>



          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>

  </div>

</section>

@endsection

@push('css')
<style type="text/css">
table td {
  vertical-align: middle !important;
}
.std-pic {
  height: 40px;width: 40px;border-radius: 20px;
}
input[type="checkbox"].pdf-check {
  width: 20px;
  height: 20px;
}
</style>
@endpush

@push('scripts')


<script>
  $(function () {


    $.post("{{url('/admin/class/all')}}",
    {
     "_token": "{{ csrf_token() }}"
   },
   function(data,status) {
    $.each(data,function(index,value){
      $('#classFilter').append(`<option value="${value['class']}">${value['class']}</option>`)
    })

  }
  );


    $('#classFilter').change(function(){

      if(this.value == "") {
        $('#studentTable_filter input').val("");
        $('#studentTable_filter input').keyup();
      } else {
        $('#studentTable_filter input').val(this.value);
        $('#studentTable_filter input').keyup();
        $('#studentTable_filter input').val("");
      }

    });


    $('#studentTable').dataTable({
      paging:false,
      "drawCallback": function( settings ) {
        $('.check-all').click(function(){
          $('.pdf-check').attr('checked',true);
        })

        $('.uncheck-all').click(function(){
          $('.pdf-check').attr('checked',false);
        })


      }
    });

  })


</script>
@endpush