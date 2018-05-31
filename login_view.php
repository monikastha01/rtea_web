<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/css/rtea.css'); ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>login View page</title>
  </head>
  <body>
      <div align="center" id="container" class="wrapper">
          <div class="form-signin">
              <h1 class="form-signin-heading"> Login </h1>
              <div class="form-group">
                  <img src="application/assets/images/logo.jpg" class="img-responsive" alt="Cinque Terre" style="width:60%; height:60%"/>
              </div>
              <?php echo form_open('verifylogin'); ?>
              <div style="width:350px;" class="form-group">
                  <label style="margin-top:-0.5%; width:150px;" for="username" class="control-label col-sm-2">
                  <span class="glyphicon glyphicon-user"></span> Username</label>
                  <input type="text" class="form-control" size="20" name="username" placeholder="Username" required autofocus/>
              </div>
              <div style="width:350px;" class="form-group">
                  <label style="margin-top:-1.5%; width:150px;" for="password" class="control-label col-sm-2">
                  <span class="glyphicon glyphicon-lock"></span> Password</label>
                  <input type="password" class="form-control" size="20" name="password" placeholder="Password" required/>
              </div>
              <button type="submit" class="btn btn-success">Login
                      &nbsp<span class="glyphicon glyphicon-log-in"></span> 
              </button>
          </div>
        </form>
        <?php echo validation_errors(); ?>
      </div>
   </body>
</html> 