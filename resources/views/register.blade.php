<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<!-- REGISTER -->


<div class="panel panel-primary box-body col-md-8 col-md-offset-2" style="margin-top:5%">
  <div class="panel-body">
  <h3><center>Customer Registration</center></h3>
  <hr>
<form class="form-horizontal col-md-offset-1" role="form" data-toggle="validator" method = "post" action = "" id="">

        <div class="box-body">
        <div class="col-md-5">
          <div class="form-group">
            <label>Firstname *</label>
            <input type="text" class="form-control" id="cust_fname" placeholder="Firstname">
          </div>

          <div class="form-group">
            <label>Middlename</label>
            <input type="text" class="form-control" id="cust_mname" placeholder="Middlename">
          </div>

          <div class="form-group">
            <label>Lastname*</label>
            <input type="text" class="form-control" id="cust_lname" placeholder="Lastname">
          </div>   
      </div>

      <div class="col-md-5 col-md-offset-1">                
        <div class="form-group">
            <label>Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker">
              </div>                
            </div>
      
        <div class="form-group">
            <label>Mobile Number*</label>
            <input type="text" class="form-control" id="cust_mobile" placeholder="Mobile Number">
          </div>   
      </div>

      <div class="col-sm-12 modal-footer">
        <center>
          <button type="submit" class="btn btn-primary column-md-4 span4 text-right">Submit</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>  
</form>  
</div>
</div>


<!-- REGISTER -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
