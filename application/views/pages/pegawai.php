<div class="panel panel-heading row-lg-12" style="margin: 5px">
	<div class="col-xs-9"></div>
	<div class="col-xs-3">
		<div class="input-group custom-search-form" >
			<form action="<?php echo site_url('pegawai/index') ?>" method="post">
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
<div class="panel panel-body row-lg-12" style="margin: 5px">
	<?=$this->session->flashdata('msg')?>
	<table class="table">
		<tr>
			<th>#</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>JK</th>
			<th>Alamat</th>
			<th>Unit</th>
			<th>Action</th>
		</tr>
		

	<?php $i = 1; foreach ($pegawai as $datPeg) { ?>
		
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $datPeg['NIP']; ?></td>
			<td><?php echo $datPeg['Nama']; ?></td>
			<td><?php echo $datPeg['JK']; ?></td>
			<td><?php echo $datPeg['Alamat']; ?></td>
			<td><?php echo $datPeg['Unit']; ?></td>
			<td>
				 <a class="btn btn-primary glyphicon glyphicon-edit" href="<?php echo site_url('pegawai/update_form/'.$datPeg['NIP']); ?>"></a>
				

				 <a class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo site_url('pegawai/delete/'.$datPeg['NIP']); ?>"></a>

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

