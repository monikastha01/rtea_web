<?php $this->load->view('header'); ?>
		 <div class="row">
  			<div class="col-sm-8" id="googleMap" style="width: 70%;height:660px;"></div>
  			<div class="col-sm-2">
	  			<?php
	  				if($victimprofile->num_rows() != 0)
					{
	  					foreach($victimprofile->result() as $row)
	  					{
	  			?>
							<div class="container">
							<br style="clear:both" />
								<div class="form-group">
									<label style="margin-top:-1.5%;" for="mobilenumber" class="control-label col-sm-2">
										Victim ID:
										&nbsp<?php echo $row->mobilenumber; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:450px;" for="full_name" class="control-label col-sm-2">
										Name:
										&nbsp<?php echo $row->full_name; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:250px;" for="eye_color" class="control-label col-sm-2">
										Eye Color:
										&nbsp<?php echo $row->eye_color; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:250px;" for="hair_color" class="control-label col-sm-2">
										Hair Color:
										&nbsp<?php echo $row->hair_color; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:150px;" for="height" class="control-label col-sm-2">
										Height:
										&nbsp<?php echo $row->height; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:150px;" for="age" class="control-label col-sm-2">
										Age: 
										&nbsp<?php echo $row->age; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:150px;" for="gender" class="control-label col-sm-2">
										Gender: 
										&nbsp <?php echo $row->gender; ?>
									</label>
									<br style="clear:both" />
								</div>
								<div class="form-group">
									<label style="margin-top:-1.5%; width:450px;" for="email" class="control-label col-sm-2">
										Email: 
										&nbsp <?php echo $row->email; ?>
									</label>
									<br style="clear:both" />
								</div>
								<form method="post" action="<?php echo base_url('home/saveData'); ?>">
									<div class="form-group">
	                                    <label style="margin-top:-1.5%;" for="branch" class="control-label col-sm-2">
	                                    	Assigned Branch: 
	                                    </label>
	                                        <!-- <input type="text" name="branch" class="form-control" 
	                                                    value="" placeholder="Enter branch address" /> -->
	                                       <select>
	                                       	<option value="">select</option>
	                                       	<?php
	                                       	foreach($branchlist -> result() as $asd)
	                                       	{
	                                       	?>
	                                       	<option value="<?php echo $asd->branch ;?>"><?php echo $asd->branch ;?></option>
	                                       	<?php
	                                       	}
	                                       	?>
	                                       </select>
	                                </div>
	                                <div class="form-group">
	                                    <label style="margin-top:-1.5%; width:250px;" for="feedback" class="control-label col-sm-2">
	                                    	Feedback: 
	                                    	<input type="hidden" name="vid" value="<?php echo $row->mobilenumber; ?>" />
	                                        <input type="text" name="feedback" class="form-control" placeholder="Enter provided feedback" />
	                                    </label>
	                                    <br style="clear:both" />  	
	                                </div>
	                                <input type="submit" name="SubmitData" class="btn btn-success" value="Save Data"/>
	                            </form>
							</div>
	  			<?php 
	  					}
	  				}
	  				else
	  				{
	  			?>
	  					<div>
	  						<label> No records</label>
	  					</div>
	  			<?php
	  				}
	  			?>
			</div>
		</div>
   	</body>
</html>