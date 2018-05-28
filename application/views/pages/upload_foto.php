<?php   ?>

<?php foreach ($data as $key ) {

  // var_dump($key);
?>
<div class="py-1">
	<div class="container">
	  <div class="row">
	    <div class="col-md-12" style="margin-bottom: 20px">
	    </div>
	  </div>
	</div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <?=$this->session->flashdata('msg')?>
        <div class="col-md-10">
          <form action="<?php 
              if ($this->session->userdata('level')=='Mahasiswa') {
                  echo site_url('profilMhs/updateFoto');
              } else{
                  echo site_url('profil/updateFoto');
              }
              ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <?php if ($this->session->userdata('level')=='Mahasiswa') { ?>
                <label class="col-md-2 col-form-label">NRP</label>
                  <div class="col-md-10">
                    <input type="hidden" class="form-control" name="nrp" value="<?php echo $key->NRP ?>" required>
                    <input type="text" class="form-control" name="nrp" value="<?php echo $key->NRP ?>" disabled>
                  </div>
              <?php } else{ ?>
                <label class="col-md-2 col-form-label">NIP</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nip" value="<?php echo $key->NIP ?>" required>
                  </div>
              <?php } ?>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto</label>
              <div class="col-md-10">
                <input type="file" name="fotoProfil" class="form-control" required>
              </div>
            </div>
            <a href="<?php echo base_url() ?>" class="btn btn-danger">Kembali</a>
            <input type="submit" name="submit" class="btn btn-primary" value ="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

<?php } ?>