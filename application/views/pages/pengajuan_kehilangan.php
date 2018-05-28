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
        <div class="col-md-12">
          <form action="<?php echo site_url('pengajuan/insertPeng'); ?>" method="post" enctype="multipart/form-data">
            <!-- <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="" required>
              </div>
            </div> -->
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NRP</label>
              <div class="col-md-10">
                <?php if($this->session->userdata('level')=='Mahasiswa'){ ?>
                <input type="hidden" class="form-control" name="nrp" placeholder="NRP" required value="<?php echo $this->session->userdata('username'); ?>
                "> <?php } ?>
                <input type="text" class="form-control" name="nrp" placeholder="NRP" required value="<?php if($this->session->userdata('level')=='Mahasiswa'){
                  echo $this->session->userdata('username');
                } ?>" <?php if ($this->session->userdata('level')=='Mahasiswa') { ?>
                  disabled <?php } ?>
                 >
              </div>
            </div>
            <!-- <div class="form-group row"> -->
              <!-- <label class="col-md-2 col-form-label">Alamat</label> -->
              <!-- <div class="col-md-10"> -->
              <!-- </div> -->
            <!-- <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tempat Lahir</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="tLahir" placeholder="Tempat Lahir" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                <input type="date" class="form-control" name="tglLahir" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Program Studi</label>
              <div class="col-md-10">
                <select class="form-control" name="jurusan" required>
                <option disabled selected>Pilih Jurusan</option>
                  <option value="S1 - Teknik Informatika" >S1 - Teknik Informatika</option>
                  <option value="S1 - Desain Komunikasi Visual" >S1 - Desain Komunikasi Visual</option>
                  <option value="S1 - Sistem Informasi" >S1 - Sistem Informasi</option>
                  <option value="D3 - Managemen Informatika">D3 - Managemen Informatika</option>
                 </select>
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto</label>
              <div class="col-md-10">
                <input type="file" class="form-control" name="foto" value="" >
              </div>
            </div> -->
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Surat Keterangan Kehilangan</label>
              <div class="col-md-10">
                <input type="file" class="form-control" name="srt_kehilangan" value="">
              </div>
            </div>
            <a href="<?php echo base_url() ?>index.php/ktm" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary" value="upload" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>