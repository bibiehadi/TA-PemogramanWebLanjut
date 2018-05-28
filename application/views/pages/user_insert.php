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
          <form action="<?php echo site_url('user/insert'); ?>" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Username</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="Username" placeholder="Username" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Password</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="Password" placeholder="Password" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Level</label>
              <div class="col-md-10">
                <select class="form-control" name="Level" required>
                <option disabled selected>Pilih Level User</option>
                  <option value="admin" >Admin</option>
                  <option value="mahasiswa" >Mahasiswa</option>
                 </select>
              </div>
            </div>
            <a href="<?php echo site_url('index') ?>" class="btn btn-danger">Kembali</a>
            <input name="submit" type="submit" class="btn btn-primary" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>