@extends('layout.default')

@section('content')
<h1>Registration Page</h1>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <br />
        <h2>Fee Deposite : 
          <?php   
            if($fee){
              $total = 0;
              foreach ($fee as $key => $value) {
                
               $total = $total + $value['amount'];
              }
              echo $total;
            } 
          ?>
        </h2>
        <form action="{{url('fee-add')}}" method="post" id="demo-form2"  class="form-horizontal form-label-left">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Amount <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="amount" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12">
              <input type="hidden" name="id" value="{{$id}}">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
