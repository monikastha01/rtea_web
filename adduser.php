<?php $this->load->view('header'); ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Add User
                        </h1>
                        <?php echo $msg; ?>
                    </div>
                </div>
                <!-- /. ROW  -->

               <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add user information
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form method="post" action="<?php echo base_url('home/saveUser'); ?>">

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name" required="required">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <label>License No</label>
                                                <input type="text" name="license_no" class="form-control" placeholder="Enter you license number" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phonenumber" class="form-control" placeholder="Enter your phone number" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Branch</label>
                                                <input type="text" name="branch" class="form-control" placeholder="Enter branch address" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" id="here1" name="username" class="form-control" placeholder="Username" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" id="here2"name="password" class="form-control" placeholder="Password">
                                            </div>
                                           <input type="submit" name="SubmitUser" class="btn btn-success" value="Save User"/> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>