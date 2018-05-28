
<div class="panel panel-body row-lg-12">
	<table class="table">
		<tr>
			<th>ID </th>
			<th>Tanggal Pengajuan</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Program Studi</th>
			<th>Status Pengajuan</th>
		</tr>
	

	<?php $i=$pages; foreach ($pengajuan as $datMhs) { ?>
			
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $datMhs['tgl_pengajuan']; ?></td>
				<td><?php echo $datMhs['NRP']; ?></td>
				<td><a href="<?php echo site_url('pengajuan/viewDetail/'.$datMhs['id']); ?>"><?php echo $datMhs['Nama']; ?></a></td>
				<td><?php echo $datMhs['Alamat']; ?></td>
				<td><?php echo $datMhs['Program_Studi']; ?></td>
				<td><?php if ($datMhs['status']=='0') {
					echo "Menunggu Validasi";
				}else if($datMhs['status']=='1'){
					echo "Data Ada yang Kurang atau Salah";
				}else if($datMhs['status']=='2'){
					echo "Data Masih Ditampung";
				}else if ($datMhs['status']=='3'){
					echo "Proses Pembuatan";
				}else if ($datMhs['status']=='4'){
					echo "KTM sudah Jadi";
				} ?></td>
				
			</tr>
	

		<?php $i++; } ?>


	</table>
	<ul class="pagination">
	<?php foreach ($links as $link) {
	echo "<li>". $link."</li>";
	} ?>
	</ul>
</div>