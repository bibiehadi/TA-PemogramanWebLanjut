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
          <?=$this->session->flashdata('msg')?>
          <form action="<?php echo site_url('mahasiswa/insert'); ?>" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NRP</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nrp" placeholder="NRP" value="" required>
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
              <label class="col-md-2 col-form-label">Tempat Lahir</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="tmpLahir" placeholder="Tempat Lahir" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                <input type="date" class="form-control" name="tglLahir" value="" required>
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
              <label class="col-md-2 col-form-label">Agama</label>
              <div class="col-md-10">
                <select class="form-control" name="agama" required>
                <option disabled selected>Pilih Agama</option>
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
                <option disabled selected>Pilih Jurusan</option>
                  <option value="S1 - Teknik Informatika" >S1 - Teknik Informatika</option>
                  <option value="S1 - Desain Komunikasi Visual" >S1 - Desain Komunikasi Visual</option>
                  <option value="S1 - Sistem Informasi" >S1 - Sistem Informasi</option>
                  <option value="D3 - Managemen Informatika">D3 - Managemen Informatika</option>
                 </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto</label>
              <div class="col-md-10">
                <input type="file" class="form-control" name="foto" value="" >
              </div>
            </div>
            <a href="<?php echo base_url() ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>