     <div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
        <div style="padding-right:40px" align="right">
        <?php if($this->session->userdata('level') == 2){ ?>
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Export ke Excel</button>
      <?php } ?>
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Pilih Rentang Tanggal Input</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              <div class="col-md-12 row">
                
                <div class="col-md-6">
                  <center>
                  <label> Mulai </label>
                  </center>
                  <form action="<?php echo base_url()?>Admin/Site/export" method="POST">
                  <input type="date" class="form-control" name="start">
                </div>
                 <div class="col-md-6">
                  <center>
                  <label style="text-align:center"> Sampai </label>
                  </center>
                  <input type="date" class="form-control" name="end">

                </div>
                
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Export</button>
              </form>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <?=$this->session->flashdata('notif')?>
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Daftar Site</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center" width="100%" id="dataTables-example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Kode Lokasi</th>
                    <th scope="col">Region</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Cluster</th>
                    <th scope="col">Kabupaten</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kelurahan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach($list as $row){ ?>
                  <tr>
                    <td>
                        <?php echo $row->kode_lokasi ?>
                    </td>
                    <td>
                      <?php echo  strtoupper($row->nama_region) ?>
                    </td>
                   <td>
                      <?php echo strtoupper($row->nama_branch) ?>
                    </td>
                    <td>
                      <?php echo strtoupper($row->nama_cluster) ?>
                    </td>
                    <td>
                      <?php echo strtoupper($row->nama_kabupaten) ?>
                    </td>
                    <td>
                      <?php echo strtoupper($row->kecamatan) ?>
                    </td>
                    <td>
                      <?php echo strtoupper($row->kelurahan)   ?>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item"  data-toggle="modal" data-target="#modal-default<?php echo $no?>">Lihat Selengkapnya</a>
                          <a class="dropdown-item"  href="<?php echo base_url()?>Admin/Site/lokasi/<?php echo $row->kode_lokasi?>">Foto Lokasi</a>
                          <?php if($this->session->userdata('level') == 2){ ?>
                          <a class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo $no?>">Edit</a>
                          <a class="dropdown-item" href="<?php echo base_url()?>Admin/Site/hapus/<?php echo $row->kode_lokasi?>">Hapus</a>
                        <?php } ?>
                        </div>
                      </div>
                    </td>

                    <div class="modal fade" id="modal-default<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                          
                            <div class="modal-header">
                                <h3 class="modal-title" id="modal-title-default">Detail Data</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                  
                                 <div class='col-md-12 row'>
                                  <div class="col-md-6">
                                    <b> Populasi </b> : <?php echo $row->populasi?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Arpu </b> : <?php echo $row->arpu?>
                                  </div> 
                                  <div class="col-md-6">
                                    <b> Tower usulan </b> : <?php echo $row->tower_usulan?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Band usulan </b> : <?php echo $row->band_usulan?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Jarak ke Site exiting </b> : <?php echo $row->jarak?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Site Terdekat : </b> <?php echo $row->site?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Jumlah Outlet : </b> <?php echo $row->outlet?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Potensi Revenue : </b> <?php echo $row->reg_dev?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Kat POI : </b> <?php echo $row->kat_poi?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Form Survey : </b> <?php echo $row->form?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Summary Survey : </b> <?php echo $row->summary_survey?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Competitor : </b> <?php echo $row->competitor?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Network Competitor : </b> 
                                    <?php echo $row->network

                                    #str_replace("|", "/", $row->network)?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Remark : </b> <?php echo $row->remark?>
                                  </div>
                                  <div class="col-md-6">
                                    <b> Link Video : </b> <?php echo $row->video?>
                                  </div>
                              </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                    </div>
                    </div>


                    

                  </tr>

                  <div class="modal fade" id="edit<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                          
                            <div class="modal-header">
                                <h3 class="modal-title" id="modal-title-default">Edit Data</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                             <form action="<?php echo base_url()?>Admin/Site/edit/<?php echo $row->kode_lokasi?>" method="POST">
                            <div class="modal-body">
                                 
                                 <div class='col-md-12 row'>
                                  <div class="col-md-6">
                                    <label> Populasi </label> 
                                    <input type="number" name="populasi" class="form-control" value="<?php echo $row->populasi?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label> Arpu </label>
                                    <input type="number" name="arpu" class="form-control" value="<?php echo $row->arpu?>">
                                  </div> 
                                  <div class="col-md-6">
                                    <label>Tower Infra</label>
                                     <select name="tower_usulan" class="form-control" required>
                                      <option value="<?php echo $row->tower_usulan?>"><?php echo $row->tower_usulan?></option>
                                      <option value="New Infra">New Infra</option>
                                      <option value="Collocation">Collocation</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Band usulan</label>
                                     <select name="band_usulan" class="form-control" required>
                                      <option value="<?php echo $row->band_usulan?>"><?php echo $row->band_usulan?></option>
                                      <option value="2G">2G</option>
                                      <option value="2G 3G">2G 3G</option>
                                      <option value="3G">3G</option>
                                      <option value="3G 4G">3G 4G</option>
                                      <option value="2G 3G 4G">2G 3G 4G</option>
                                    </select> 
                                  </div>
                                  <div class="col-md-6">
                                    <label> Jarak ke Site exiting (KM) </label> 
                                    <input type="number" name="jarak" class="form-control" value="<?php echo $row->jarak?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label> Site Terdekat (Meter) </label> 
                                    <input type="number" name="site" class="form-control" value="<?php echo $row->site?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label> Jumlah Outlet </label>
                                    <input type="number" name="outlet" class="form-control" value="<?php echo $row->outlet?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label> Potensi Revenue </label>
                                    <input type="number" name="reg_dev" class="form-control" value="<?php echo $row->reg_dev?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label> Kat POI </label>
                                    <select name="kat_poi" class="form-control" required>
                                      <option value="<?php echo $row->kat_poi?>"><?php echo $row->kat_poi?></option>
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
                                  <div class="col-md-6">
                                    <label> Form Survey  </label>
                                    <select class="form-control" name="form_survey" class="form-control" required>
                                      <option value="<?php echo $row->form_survey?>"><?php echo $row->form_survey?></option>
                                      <option value="Complete"> Complete </option>
                                      <option value="Not Complete"> Not Complete </option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <label> Summary Survey </label>
                                    <select class="form-control" name="summary_survey" required>
                                      <option value="<?php echo $row->summary_survey?>"><?php echo $row->summary_survey?></option>
                                      <option value="OK">Ok</option>
                                      <option value="Not OK">Not Ok</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <label> Remark </label>
                                    <textarea class="form-control" name="remark"><?php echo $row->remark?></textarea>
                                     
                                  </div>
                                  <div class="col-md-6">
                                    <label> Link Video </label> 
                                    <input type="text" name="video" class="form-control" value="<?php echo $row->video?>">

                                  </div>
                              </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                <?php $no++;} ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>

      