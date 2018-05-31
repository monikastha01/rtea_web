<?php $this->load->view('header'); ?>
<div class="col-sm-12">
    	<table class="table table-striped">
        	<thead>
            	<tr>
                	<th>S.N</th>
                    <th>Victim ID</th>
                    <th>Triggered Date</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Fetched By</th>
				</tr>
			</thead>
			
            <tbody>
            
				<?php
					if($victimdetail->num_rows() != 0)
					{
						foreach($victimdetail->result() as $row)
						{
                ?>
                <form method="post" action="">
            	<tr>
                	<td><?php echo $row->trigger_id;?></td>
                   	<td><?php echo $row->mobilenumber;?></td>
                    <td><?php echo $row->triggered_date;?></td>
                    <td><?php echo $row->latitude;?></td>
                    <td><?php echo $row->longitude;?></td>
                    <td><?php echo $row->username;?></td>
                </tr>
                </form>
               	<?php
            			}
					}
					else
					{
				?>
               	<tr>
                	<td></td>
                    <td></td>
                    <td></td>
                    <td>No Records</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
					}
				?>
            </tbody>
			
		</table>
	</div>