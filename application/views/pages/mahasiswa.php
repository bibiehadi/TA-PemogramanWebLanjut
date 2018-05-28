
<div class="row-lg-12" style="margin: 5px">
	<div class="col-xs-9"></div>
	<div class="col-xs-3">
		<div class="input-group custom-search-form" >
			<form action="<?php echo site_url('mahasiswa/index') ?>" method="post">
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
<div class="row-lg-12" style="margin: 5px">
<?=$this->session->flashdata('msg')?>
<table class="table">
	<tr>
		<th>#</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>Program Studi</th>
		<th>Action</th>
	</tr>
	

<?php $i = $page;  foreach ($results as $datMhs) { ?>
	
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $datMhs['NRP']; ?></td>
		<td><?php echo $datMhs['Nama']; ?></td>
		<td><?php echo $datMhs['Tempat_Lahir']; ?></td>
		<td><?php echo $datMhs['Tanggal_Lahir']; ?></td>
		<td><?php echo $datMhs['JK']; ?></td>
		<td><?php echo $datMhs['Agama']; ?></td>
		<td><?php echo $datMhs['Alamat']; ?></td>
		<td><?php echo $datMhs['Program_Studi']; ?></td>
		<td>
			 <a class="btn btn-primary glyphicon glyphicon-edit" href="<?php echo site_url('mahasiswa/update_form/'.$datMhs['NRP']); ?>"></a>
			
			 <?php if ($this->session->userdata('level')=='Super User'): ?>
			 <a class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo site_url('mahasiswa/delete/'.$datMhs['NRP']); ?>"></a>
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