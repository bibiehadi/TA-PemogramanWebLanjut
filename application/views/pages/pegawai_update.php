<?php foreach ($pegawai as $key ) {

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
        <div class="col-md-12">
          <form action="<?php echo site_url('pegawai/update'); ?>" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NIP</label>
              <div class="col-md-10">
                <input type="hidden" class="form-control" name="nip" placeholder="NIP" value="<?php echo $key->NIP ?>" >
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?php echo $key->NIP ?>" disabled>
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
              <label class="col-md-2 col-form-label">Unit Kerja</label>
              <div class="col-md-10">
                <select class="form-control" name="unit" required>
                <option  selected value="<?php   echo $key->Unit ?>"><?php   echo $key->Unit ?></option>
                  <option value="PMB" >PMB</option>
                  <option value="BAK" >BAK</option>
                 </select>
              </div>
            </div>
            <a href="<?php echo base_url() ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php } ?>