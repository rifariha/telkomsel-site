<style type="text/css">
  label{
    color:white;
    padding-top:10px;
  }
</style>
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <?=$this->session->flashdata('notif')?>
        <div class="header-body">
          <!-- Card stats -->
        <form action="<?php echo base_url()?>User/Change_pwd/ubah" method="post">
        
          <br>
        <div class="col-md-12 row">
        <legend style="color:white">Ubah Password</legend> 
            <div class="col-md-12">
            <label>Masukkan Password Lama</label>
              <input type="password" name="old_pwd" class="form-control" required>
            </div>
            <div class="col-md-12">
            <label>Masukkan Password Baru</label>
              <input type="password" name="new_pwd" class="form-control" required>
            </div>
            <div class="col-md-12">
            <label>Ulang Password Baru</label>
              <input type="password" name="re_new_pwd" class="form-control" required>
            </div>
              <br>
        </div>
          <br>

        <div class="col-md-12">
        <br>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
        </form>
        </div>
      </div>
    </div>

