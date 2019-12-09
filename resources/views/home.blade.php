<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="icon" href="favicon.ico">
    <title>SPK Peserta Jamkesmas</title>
  </head>
  <body>
    <div class="container" style="width: 25%; margin-top: 15%;">
    <div class="panel panel-primary" >
      <div class="panel-heading">
        <img src="img/logo.png" style="width: 20px; height: 
        20px">
        Form Login SPK Penerima Jamkesmas
      </div>
      <div class="panel-body">
        <form method="post" action="{{route('login.home')}}">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Username" style="width: 200%; margin-left: 10%;">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" style="width: 200%; margin-left: 10%;">
              </div>
            </div>  
          </div>
          <button type="submit" name="submit" class="btn btn-succes" style="margin-left: 5%;">
            <i class="glyphicon glyphicon-send"></i>
            Login
          </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</html>