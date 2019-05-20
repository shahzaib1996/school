@extends('admin.layouts.app')

@section('content')

<section class="content-header">
      <h1>
        Classes
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
              <h2 class="box-title">Class</h2>

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            

            <form role="form" action="{{route('admin.class.create')}}" method="POST">
              @csrf
              <div class="box-body">

                @if(session()->has('message'))
                <div class="alert {{session('class')}}">
                  {{session('message')}}
                </div>
                @endif

                <div class="col-md-6">
                   
                <div class="form-group">
                  <label>Class Name</label>
                  <input type="text" class="form-control" id="" name="class_name" placeholder="Enter here..." required>
                </div>
                
                                
                </div>

                <div class="col-md-12">
                   
                
                 <input type="submit" name="submit" value="Add" class="btn btn-success">
                
                                
                </div>


              </div>
              <!-- /.box-body -->
            </form>

          </div>
          <!-- /.box -->

          <div class="box box-danger">

            <div class="box-header with-border">
              <h2 class="box-title">Classes</h2>

            </div>
            <!-- /.box-header -->
            
              <div class="box-body">

                <table class="table">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Class</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $a = 1;
                    @endphp
                    @foreach($klasses as $klass)
                    <tr>
                      <td width=>{{$a}}</td>
                      <td>{{$klass->class}}</td>
                      <td> <a href="../class/delete/{{$klass->id}}" class="btn btn-danger"> <i class="fa  fa-trash-o"></i> </a> </td>
                    </tr>
                    @php
                    $a++;
                    @endphp
                    @endforeach

                  </tbody>
                </table>
                
                                
                </div>


              </div>
              <!-- /.box-body -->
            

          </div>
          <!-- /.box -->

        </div>



    </div>

</section>

@endsection

