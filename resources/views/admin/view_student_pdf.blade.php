@extends('admin.layouts.app')

@section('content')

<section class="content-header">
  <h1>
    Student Fee Vouchers
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
                    <input type="checkbox" name="student_id[]" class="pdf-check" value="{{$std->class_req}}">
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
  width: 20px; /*Desired width*/
  height: 20px; /*Desired height*/
}
</style>
@endpush

@push('scripts')


<script>
  $(function () {

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