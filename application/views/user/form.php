<style type="text/css">
  label{
    color:white;
    padding-top:10px;
  }
</style>
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
        <form action="<?php echo base_url()?>User/Form/input_data" method="post">
        <div class="col-md-12 row">
        <legend style="color:white">Masukkan Data Daerah</legend> 
            <div class="col-md-6">
            <label>Region</label>
              <select name="region" id="region" class="form-control" required>
                <option value="">- Pilih Region -</option>
                <?php foreach ($region as $reg) { ?>
                <option value="<?php echo $reg->id_region?>"><?php echo $reg->nama_region ?></option>
                <?php } ?>    
              </select>
            </div>
            <div class="col-md-6">
            <label>Branch</label>
              <select name="branch" id="branch" class="form-control" required>
                <option value="">- Pilih Branch -</option>
              </select>
            </div>

            <div class="col-md-6">
            <label>Cluster Sales</label>
              <select name="cluster" id="cluster" class="form-control" required>
                <option value="">- Pilih Cluster Sales -</option>
              </select>
            </div>
            <div class="col-md-6">
            <label>Kabupaten</label>
              <select name="kabupaten" id="kabupaten" class="form-control" required>
                <option value="">- Pilih Kabupaten -</option>
              </select>
            </div>

            <div class="col-md-6">
            <label>Kecamatan</label>
              <input type="text" name="kecamatan" placeholder="Masukkan nama kecamatan" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label>Kelurahan</label>
              <input type="text" name="kelurahan" placeholder="Masukkan nama kelurahan" class="form-control" required>
            </div>
        </div>
          <br>
        <div class="col-md-12 row">
        <legend style="color:white">Masukkan Titik Lokasi</legend> 
            <div class="col-md-6">
            <label>Latitude</label>
              <input type="text" name="latitude" placeholder="Contoh : 3.567466" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label>Longitude</label>
              <input type="text" name="longitude" placeholder="Contoh : 98.652733" class="form-control" required>
            </div>
              <br>
            <a data-toggle="modal" data-target="#modal-default" style="padding-left:20px"> 
                <small style="color:white"><i class="fa fa-info-circle"></i> Cara mengetahui latitude dan longitude </small>
              </a>
              <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Cara mengetahui Lat-Long</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                  <p> 1. Akses website <a href="https://www.mapcoordinates.ne">https://www.mapcoordinates.net/en</a></p>
                  <p> 2. Masukkan alamat lokasi atau drag point ke lokasi yang diinginkan </p>
                  <p> 3. Klik pin untuk menampilakan latitude dan longitude </p>
                  <p><img src="<?php echo base_url()?>assets/img/mapsnetwork.png" width="100%"></p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
    </div>
        </div>
          <br>
        <div class="col-md-12 row">
        <legend style="color:white">Masukkan Data Potensi</legend> 
            
            <div class="col-md-4">
            <label>Populasi</label>
              <input type="number" name="populasi" placeholder="Populasi" class="form-control" required>
            </div>
            <div class="col-md-4">
            <label>Arpu</label>
              <input type="number" name="arpu" placeholder="Arpu" class="form-control" required>
            </div>
            <div class="col-md-4">
            <label>Tower Infra</label>
               <select name="tower_usulan" class="form-control" required>
                <option value="">- Pilih Tower  -</option>
                <option value="New Infra">New Infra</option>
                <option value="Collocation">Collocation</option>
              </select>
            </div>
            <div class="col-md-3">
            <label>Band usulan</label>
               <select name="band_usulan" class="form-control" required>
                <option value="">- Pilih Band Usulan -</option>
                <option value="2G">2G</option>
                <option value="2G 3G">2G 3G</option>
                <option value="3G">3G</option>
                <option value="3G 4G">3G 4G</option>
                <option value="2G 3G 4G">2G 3G 4G</option>
              </select>
            </div>
            <div class="col-md-3">
            <label>Jarak ke site Exiting (KM)</label>
              <input type="number" name="jarak" placeholder="Masukkan Jarak" class="form-control" required>
            </div>
            <div class="col-md-3">
            <label>Site terdekat (Meter)</label>
              <input type="number" name="site" placeholder="Masukkan Site terdekat" class="form-control" required>
            </div>
            <div class="col-md-3">
            <label>Jumlah Outlet</label>
              <input type="number" name="outlet" placeholder="Masukkan Outlet" class="form-control" required>
            </div>
            <div class="col-md-3">
            <label>Potensi Revenue</label>
              <input type="number" name="reg_dev" placeholder="Potensi Revenue" class="form-control" required>
              <a data-toggle="modal" data-target="#potensi"> 
                <small style="color:white"><i class="fa fa-info-circle"></i> Potensi Revenue </small>
              </a>
              <div class="modal fade" id="potensi" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title-default">Potensi Revenue</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                          <h2> Berapa potensi revenue yang memungkinkan diperoleh dari daerah ini </h2>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
              </div>
            </div>
            </div>

            

            <div class="col-md-3">
            <label>Kat POI</label>
              <select name="kat_poi" class="form-control" required>
                <option value="">- Pilih Kategori -</option>
                <option value="SCHOOL">SCHOOL</option>
                <option value="CAMPUS">CAMPUS</option>
                <option value="HIGH RISE BUILDING & OFFICE (HRBO)">HIGH RISE BUILDING & OFFICE (HRBO)</option>
                <option value="HP CENTER">HP CENTER</option>
                <option value="MALL & HANGOUT PLACE">MALL & HANGOUT PLACE</option>
                <option value="PUBLIC AREA">PUBLIC AREA</option>
                <option value="RESIDENTIAL">RESIDENTIAL</option>
                <option value="TOURIST DISTRICT">TOURIST DISTRICT</option>
                <option value="OTHERS">OTHERS</option>
              </select>
            </div>
            
            <div class="col-md-3">
            <label>Form survey</label>
              <select class="form-control" name="form_survey" class="form-control" required>
                <option value=""> Pilih Status </option>
                <option value="Complete"> Complete </option>
                <option value="Not Complete"> Not Complete </option>
              </select> 
            </div>
            <div class="col-md-3">
            <label>Summary survey</label>
              <select class="form-control" name="summary_survey" required>
                <option value=""> Pilih Status </option>
                <option value="OK">Ok</option>
                <option value="Not OK">Not Ok</option>
              </select>
            </div>
            </div>
            <br>
            <div class="col-md-12 row">
            <legend style="color:white">Network Competitor Info</legend> 
            <div class="col-md-3">
            <label >Network Competitor</label><br>
               <label class="checkbox-inline">
                   <input type="checkbox" name="competitor[]" value="XL">XL
              </label>
              <label class="checkbox-inline">
                    <input type="checkbox" name="competitor[]"value="Indosat">Indosat
              </label>
             <label class="checkbox-inline">
                   <input type="checkbox" name="competitor[]" value="Three">Three
              </label>
              <label class="checkbox-inline">
                    <input type="checkbox" name="competitor[]" value="Smartfren">Smartfren
              </label>
            </div>
            <div class="col-md-3">
            <label>Network Competitor</label>
              <select name="network" class="form-control" required>
                <option value="">- Pilih Network -</option>
                <option value="2G">2G</option>
                <option value="2G 3G">2G 3G</option>
                <option value="3G">3G</option>
                <option value="3G 4G">3G 4G</option>
                <option value="2G 3G 4G">2G 3G 4G</option>
              </select>
            </div>
            <div class="col-md-6">
            <label>Remark</label>
              <input type="text" name="remark" placeholder="Remark" class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
        <br>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
        </form>
        </div>
      </div>
    </div>

