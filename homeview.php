<?php $this->load->view('header'); ?>
		 <div class="row">
  			<div class="col-sm-8" id="map">
				<?php echo $map['html']; 

				?> 
		    </div>
  			<div class="col-sm-2">
  				<div class="panel-heading">
  					<h1>Victim list</h1>
                </div>
  				<table class="table table-bordered table-striped">
  					<thead>
		            	<tr>
		                    <th>S.N</th>
		                    <th>Victim ID</th>
		                    <th>Latitude</th>
		                    <th>Longitude</th>
						</tr>
					</thead>
					<tbody>
						<?php
								foreach($location as $row)
								{
							
	                	?>
							<tr>
								<td class="trigger_id">Victim&nbsp<?php echo $row->trigger_id; ?></td>
								<td class="mobilenumber">
									 <?php echo form_open('home/victimview'); ?>
										<button name="fetchvictim" type="submit" value="<?php echo $row->mobilenumber; ?>">
											<?php echo $row->mobilenumber; ?>
										</button>
									</form>
								</td>
								<td class="latitude"><?php echo $row->latitude; ?></td>
								<td class="longitude"><?php echo $row->longitude; ?></td>
							</tr>
						</form>		               	
		                <?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
   	</body>
</html>