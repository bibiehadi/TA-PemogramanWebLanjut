<?php foreach ($mahasiswa as $key ) {

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
          <form action="<?php echo site_url('mahasiswa/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-5">
              <img src="<?php echo base_url('fotoProfil/').$this->session->userdata('photo') ?>" style="width: 100px; height: 100px;">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NRP</label>
              <div class="col-md-10">
                <input type="hidden" class="form-control" name="nrp" placeholder="NRP" value="<?php echo $key->NRP ?>" required>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nrp" placeholder="NRP" value="<?php echo $key->NRP ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $key->Nama ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $key->Alamat ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tempat Lahir</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="tmpLahir" placeholder="Tempat Lahir" value="<?php echo $key->Tempat_Lahir ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                <input type="date" class="form-control" name="tglLahir" value="<?php echo $key->Tanggal_Lahir ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Jenis Kelamin</label>
              <div class="col-md-10">
                <select class="form-control" name="jk" required>
                <option selected value="<?php echo $key->JK ?>"><?php echo $key->JK; ?></option>
                  <option value="L" >Laki - Laki</option>
                  <option value="P" >Perempuan</option>
                 </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Agama</label>
              <div class="col-md-10">
                <select class="form-control" name="agama" required>
                <option selected value="<?php echo $key->Agama ?>"><?php echo $key->Agama ?></option>
                  <option value="Islam" >Islam</option>
                  <option value="Kristen" >kristen</option>
                  <option value="Katolik" >Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Tionghoa">Tionghoa</option>
                 </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Program Studi</label>
              <div class="col-md-10">
                <select class="form-control" name="program" required>
                  <!-- <option disabled selected>Pilih Program Studi</option> -->
                  <option  selected value="<?php   echo $key->Program_Studi ?>"><?php   echo $key->Program_Studi ?></option>
                  <option value="S1 - Teknik Informatika" >S1 - Teknik Informatika</option>
                  <option value="S1 - Desain Komunikasi Visual" >S1 - Desain Komunikasi Visual</option>
                  <option value="S1 - Sistem Informasi" >S1 - Sistem Informasi</option>
                  <option value="D3 - Managemen Informatika">D3 - Managemen Informatika</option>
                 </select>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto</label>
              <div class="col-md-10">
                <input type="file" name="fotoProfil" class="form-control">
              </div>
            </div> -->
            <a href="<?php echo base_url() ?>" class="btn btn-danger">Kembali</a>
            <input type="submit" name="submit" class="btn btn-primary" value ="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

<?php } ?>