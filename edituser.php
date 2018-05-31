<?php $this->load->view('header'); ?>
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            User Edit<small></small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

               <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit user information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                               
                                    <form method="post" action="<?php echo base_url('home/updateuser'); ?>">
                                    <input type="hidden" name="agency_id" value="<?php echo $sagency[0]['agency_id']  ?>" />
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="<?php echo $sagency[0]['first_name']; ?>" placeholder="First Name">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control" value="<?php echo $sagency[0]['middle_name']; ?>" placeholder="Middle Name">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="<?php echo $sagency[0]['last_name']; ?>" placeholder="Last Name">
                                        </div>
                                            <div class="form-group">
                                                <label>License No</label>
                                                <input type="text" name="license_no" class="form-control" 
                                                    value="<?php echo $sagency[0]['license_no']; ?>" placeholder="Enter you license number">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phonenumber" class="form-control" 
                                                    value="<?php echo $sagency[0]['phonenumber']; ?>" placeholder="Enter your phone number">
                                            </div>
                                            <div class="form-group">
                                                <label>Branch</label>
                                                <input type="text" name="branch" class="form-control" 
                                                    value="<?php echo $sagency[0]['branch']; ?>" placeholder="Enter branch address">
                                            </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $sagency[0]['email']; ?>" placeholder="Email">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $sagency[0]['username']; ?>" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" value="<?php echo $sagency[0]['password']; ?>" placeholder="Password">
                                        </div>
                                       
                                        <input type="submit" class="btn btn-success" value="Update User" />
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>      