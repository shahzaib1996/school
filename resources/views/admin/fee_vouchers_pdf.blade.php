<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title}}</title>
  <!-- Google Font -->
</head>
<style type="text/css">
  td {
    padding-left: 5px;
    height: 25px;
  }
  table {
    border: 1px solid #CCC;
    border-collapse: collapse;
}

td.sep {
    border: none;
}

.page-break {
    page-break-after: always;
}


</style>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">

    @foreach($students as $std)

<table style="width: 100%;" cellspacing="0" border="1">
      
      <tr>
        <td colspan="16" style="height: 50px;text-align: center;font-family: Old English Text MT;font-size: 20px;"> MarryWood Academy </td>
        <td colspan="4" class="sep"></td>
        <td colspan="16" style="height: 50px;text-align: center;font-family: Old English Text MT;font-size: 20px;"> MarryWood Academy </td>
      </tr>
      <tr>
        <td colspan="16" style="text-align: center;">Account Copy</td>
        <td colspan="4" class="sep"></td>

        <td colspan="16" style="text-align: center;">Parents Copy</td>

      </tr>
      <tr>
        <td colspan="8">Issue Date: <b>{{$issueDate}}</b></td>
        <td colspan="8">Due Date: <b>{{$dueDate}}</b></td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Issue Date: <b>{{$issueDate}}</b></td>
        <td colspan="8">Due Date: <b>{{$dueDate}}</b></td>


      </tr>
      <tr>
        <td colspan="16">Challan Month: <b>{{$challanMonth}}</b></td>
        <td colspan="4" class="sep"></td>
        
        <td colspan="16">Challan Month: <b>{{$challanMonth}}</b></td>



      </tr>
      <tr>
        <td colspan="16">Student Name: <b> {{$std->student_fname}} {{$std->student_lname}}  </b></td>
        <td colspan="4" class="sep"></td>

        <td colspan="16">Student Name: <b> {{$std->student_fname}} {{$std->student_lname}} </b></td>


      </tr>
      <tr>
        <td colspan="8">Challan# </td>
        <td colspan="8">Class: <b> {{$std->class_req}} </b></td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Challan# </td>
        <td colspan="8">Class: <b> {{$std->class_req}} </b></td>

      </tr>
      <tr>
        <td colspan="16" style="height: 30px;font-size: 18px;text-align: center;">Fee Challan</td>
        <td colspan="4" class="sep"></td>

        <td colspan="16" style="height: 30px;font-size: 18px;text-align: center;">Fee Challan</td>


      </tr>
      <tr>
        <td colspan="8" style="height: 30px;font-size: 15px;text-align: center;">Description</td>
        <td colspan="8" style="height: 30px;font-size: 15px;text-align: center;">Amount</td>
        <td colspan="4" class="sep"></td>

        <td colspan="8" style="height: 30px;font-size: 15px;text-align: center;">Description</td>
        <td colspan="8" style="height: 30px;font-size: 15px;text-align: center;">Amount</td>

      </tr>
      <tr>
        <td colspan="8">Registration Fee</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Registration Fee</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>


      </tr>
      <tr>
        <td colspan="8">Admission Fee</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Admission Fee</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>


      </tr>
      <tr>
        <td colspan="8">Tuition Fee</td>
        <td colspan="8" style="text-align: center;"> <b> {{$std->monthly_fees}} </b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Tuition Fee</td>
        <td colspan="8" style="text-align: center;"> <b> {{$std->monthly_fees}} </b> </td>


      </tr>
      
      <tr>
        <td colspan="8">Annual Charges</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Annual Charges</td>
        <td colspan="8" style="text-align: center;"> <b>-</b> </td>


      </tr>
      <tr>
        <td colspan="8">Stationary Fee</td>
        <td colspan="8" style="text-align: center;"> <b> </b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Stationary Fee</td>
        <td colspan="8" style="text-align: center;"> <b> </b> </td>


      </tr>
      <tr>
        <td colspan="8">Total</td>
        <td colspan="8" style="text-align: center;"> <b> </b> </td>
        <td colspan="4" class="sep"></td>

        <td colspan="8">Total</td>
        <td colspan="8" style="text-align: center;"> <b> </b> </td>

      </tr>
     
      <tr>
        <td colspan="16" style=""><b>Payment Terms</b> <br> 
          1- Late payment Surcharge Rs. 100.<br>
          2- Fee Voucher would be checked at a time of submission of so kindly bring it.
        </td>
        <td colspan="4" class="sep"></td>

        <td colspan="16" style=""><b>Payment Terms</b> <br> 
          1- Late payment Surcharge Rs. 100.<br>
          2- Fee Voucher would be checked at a time of submission of so kindly bring it.
        </td>
        
      </tr>
      
      <tr>
        <td colspan="16" style="height: 40px;text-align: center;"> SCHOOL STAMP </td>
        <td colspan="4" class="sep"></td>

        <td colspan="16" style="height: 40px;text-align: center;"> SCHOOL STAMP </td>
      </tr>
      
   </table>


    <div class="page-break"></div>


    @endforeach




  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
