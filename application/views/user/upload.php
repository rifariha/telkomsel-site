<style type="text/css">
  label{
    color:white;
    padding-top:10px;
  }
</style>
<?php $kode = $this->uri->segment(4);?>
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
        <form action="<?php echo base_url()?>User/Form/upload/insert" method="post" enctype="multipart/form-data">
        <div class="col-md-12 row">
          <input type="hidden" name="kode" value="<?php echo $this->uri->segment(4) ?>">
        <legend style="color:white">Upload Foto Potensi</legend> 
            <div class="col-md-6">
            <input type="hidden" name="kode" value="<?php echo $kode?>">
            <label>Foto 1 <span style="color:yellow">*</span></label>
              <input type="file" name="foto_satu" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label>Foto 2 <span style="color:yellow">*</span></label>
              <input type="file" name="foto_dua" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label>Foto 3 <span style="color:yellow">*</span></label>
              <input type="file" name="foto_tiga" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label>Foto 4 <span style="color:yellow">*</span></label>
              <input type="file" name="foto_empat" class="form-control">
            </div>
        </div>
          <br>
        <div class="col-md-12">
        <legend style="color:white">Masukkan Foto Site Surrounding</legend> 
            <div class="col-md-12">
            <label>Foto Lokasi <span style="color:yellow">*</span></label>
              <input type="file" name="foto_lokasi" class="form-control" required>
            </div>
            <a data-toggle="modal" data-target="#modal-default" style="padding-left:20px"> 
                <small style="color:white"><i class="fa fa-info-circle"></i> Cotoh foto site surrounding </small>
              </a>
              <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Foto Site Surrounding</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                  <p><img src="<?php echo base_url()?>assets/img/area.jpeg" width="100%"></p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
    </div>
        </div>
        <br>
        <legend style="color:white">Masukkan Video</legend>
        <div class="col-md-12">
            <div class="col-md-12">
            <label>Link Video</label>
              <input type="text" name="link_video" class="form-control" placeholder="Masukkan Link video" required>
              <a data-toggle="modal" data-target="#potensi"> 
                <small style="color:white"><i class="fa fa-info-circle"></i>  Link Video </small>
              </a>
              <div class="modal fade" id="potensi" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title-default">Link Video</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                          <h2>Masukkan Link video yang anda upload ke FTP ataupun Google Drive </h2>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
              </div>
            </div>
            </div>
        </div>
        <br>
        <p> <span style="color:yellow">*</span> <i style="color:white"> : File harus berformat .jpg atau .png dengan ukuran < 2MB</i></p>
          <br>
        
        <div class="col-md-12">
        <br>
        <button class="btn btn-primary" type="submit">Save</button>
        <a onclick="return confirm('Membatalkan akan menghapus data anda sebelumnya. Proses?')"href="<?=base_url();?>User/Form/delete_data/<?=$kode?>" class="btn btn-warning">Cancel</a>
        </div>
        </form>
        </div>
      </div>
    </div>

