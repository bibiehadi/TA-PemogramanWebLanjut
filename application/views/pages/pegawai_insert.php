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
          <form action="<?php echo site_url('pegawai/insert'); ?>" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NIP</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nip" placeholder="NIP" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Jenis Kelamin</label>
              <div class="col-md-10">
                <select class="form-control" name="jk" required>
                <option disabled selected>Pilih Jenis Kelamin</option>
                  <option value="L" >Laki - Laki</option>
                  <option value="P" >Perempuan</option>
                 </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Unit Kerja</label>
              <div class="col-md-10">
                <select class="form-control" name="unit" required>
                <option disabled selected>Pilih Unit</option>
                  <option value="PMB" >PMB</option>
                  <option value="BAK" >BAK</option>
                 </select>
              </div>
            </div>
            <a href="<?php echo site_url('index') ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>