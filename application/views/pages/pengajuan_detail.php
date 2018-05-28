<?php foreach ($pengajuan as $key) {
// var_dump($key)
  ?>

<div class="py-1">
  <div class="container">
    <div class="row">
      
    </div>
  </div>
  </div>
  <div class="py-5">
    <div class="container">
      <?=$this->session->flashdata('msg')?>
      <div class="row">
        <div class="col-md-3" style="margin-bottom: 20px">
        <img style="width: 250px;height: 250px;" src="<?php echo base_url().'fotoProfil/'.$key->photo;?>">
      </div>
        <div class="col-md-7">
          <form action="<?php echo site_url('pengajuan/updatePengajuan'); ?>" method="post">
            <div class="form-group row">
              <!-- <label class="col-md-2 col-form-label">Id</label> -->
              <div class="col-md-10">
                <input type="hidden" class="form-control" name="id" placeholder="id" value='<?php echo $key->id; ?>' >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">NRP</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nrp" placeholder="NRP" value="<?php echo $key->NRP; ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Nama</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $key->Nama ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $key->Alamat ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tempat Lahir</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="tmpLahir" placeholder="Tempat Lahir" value="<?php echo $key->Tempat_Lahir ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                <input type="date" class="form-control" name="tglLahir" value="<?php echo $key->Tanggal_Lahir ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Jenis Kelamin</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="jk" value="<?php echo $key->JK ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Agama</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="agama" value="<?php echo $key->Agama ?>" disabled>
                
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Program Studi</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="program" value="<?php echo $key->Program_Studi ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Status Pengajuan</label>
              <div class="col-md-10">
                <select class="form-control" name="status" required>
                <option selected value="<?php echo $key->status ?>">Pilih Status Pengajuan</option>
                  <option value='0' >Menunggu Validasi</option>
                  <option value='1' >Data Ada Yang Kurang atau Salah</option>
                  <option value='2' >Data Masih Ditampung </option>
                  <option value='3' >Proses Pembuatan</option>
                  <option value='4' >KTM Sudah Jadi</option>
                 </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Bukti Pengajuan</label>
              <div class="col-md-10">
              <?php 
              if ($key->src_surat==null) {
                ?>Surat Pengajuan tidak ada 
                </div>
              <?php
              }else{ ?>
              
              <div class="col-md-10">
                <a href="<?= base_url()?>bukti/<?= $key->src_surat;?>"> Klik here!! </a>
                <!-- <img src="<?= base_url()?>bukti/<?= $key->src_surat;?>"> -->
              </div>
               <?php } ?>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Note</label>
              <div class="col-md-10">
                <textarea type="text" class="form-control" name="note" style="height: 100px"><?php echo $key->Note ?></textarea>
              </div>
            </div>
            <div>
            <a href="<?php echo site_url('pengajuan') ?>" class="btn btn-danger">Kembali</a>
            <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>