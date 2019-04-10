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

        @if(session()->has('message'))
        <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
        @endif

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Admissions Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="admissionTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>Student Name</th>
                  <th>Father Name</th>
                  <th>Mobile</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach( $admissions as $adm )
                <tr>
                  <td> {{$adm->id}} </td>
                  <td>{{$adm->student_fname}} {{$adm->student_lname}}</td>
                  <td>{{$adm->father_name}}</td>
                  <td>{{$adm->mobile}}</td>
                  <td>{{ Carbon\Carbon::parse($adm->admission_date)->format('Y-m-d') }}</td>
                  <td>
                      @if( $adm->is_approved == 1 )
                        <label class="label label-success">Approved</label>
                      @else
                        <label class="label label-danger">Pending</label>
                      @endif
                  </td>
                  <td>
                      <a href="../admission/{{$adm->id}}" class="btn btn-success"> <i class="fa fa-list"></i> </a>
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

@push('scripts')


<script>
    $(function () {

        $('#admissionTable').dataTable({
          "aaSorting": []
        });

    })


</script>
@endpush