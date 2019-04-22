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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$studentsCount}}</h3>

              <p>Total Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
          </div>
        </div>

    </div>

</section>

@endsection