<div class="row-lg-12" style="margin: 5px">
	<div class="col-xs-9"></div>
	<div class="col-xs-3">
		<div class="input-group custom-search-form" >
			<form action="<?php echo site_url('user/index') ?>" method="post">
		    <input type="text" name="search" class="form-control" placeholder="Search...">
		    </form>
		    <span class="input-group-btn">
		    	<button class="btn btn-default" type="submit">
		    		<i class="fa fa-search"></i>
				</button>
		    </span>
	    </div>
	</div>
</div>
<div class="col-lg-12" style="margin: 5px">
	<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Action</th>
		</tr>

	<?php $i = $page; foreach ($results as $datUser) { ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $datUser['username']; ?></td>
			<td><?php echo $datUser['password']; ?></td>
			<td><?php  
				if ($datUser['level']=='admin') {
					echo "Admin";
				}else if ($datUser['level']=='super'){
					echo "Super User";
				}
				else{
					echo "Mahasiswa";
				}; ?></td>
			<td>
				 <a class="btn btn-primary glyphicon glyphicon-edit" href="<?php echo site_url('user/updateForm/'.$datUser['username']); ?>"></a>
				 <?php if ($this->session->userdata('level')=='Super User'): ?><!-- 
				 <a class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo site_url('user/delete/'.$datUser['username']); ?>"></a> -->
				<?php endif ?>
			</td>
		</tr>
		

		<?php $i++; } ?>
		</table>
		<ul class="pagination">
		<?php foreach ($links as $link) {
		echo "<li>". $link."</li>";
		} ?>
		</ul>
</div>