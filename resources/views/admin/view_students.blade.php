@extends('admin.layouts.app')

@section('content')

<section class="content-header">
      <h1>
        Students
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

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Students List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="studentTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>ID#</th>
                  <th>Student Name</th>
                  <th>Father Name</th>
                  <th>Class</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach( $students as $std )
                <tr>
                  <td style="width: 50px;text-align: center;"> <img src="{{asset('students/avatar5.png')}}" class="std-pic"> </td>
                  <td> {{$std->id}} </td>
                  <td>{{$std->student_fname}} {{$std->student_lname}}</td>
                  <td>{{$std->parent->father_name}}</td>
                  <td>{{$std->class_req}}</td>
                  <td style="width: 60px;text-align: center;">
                      <a href="../student/{{$std->id}}" class="btn btn-success"> <i class="fa fa-list"></i> </a>
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
              </table>
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
</style>
@endpush

@push('scripts')


<script>
    $(function () {

        $('#studentTable').dataTable({
          "aaSorting": []
        });

    })


</script>
@endpush