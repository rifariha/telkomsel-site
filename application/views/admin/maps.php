     <div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
      <div style="padding-left:30px">
        <button class="btn btn-warning" onclick="window.history.go(-1); return false;"> <i class="ni ni-bold-left"></i> Kembali </button>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Foto Kode Lokasi <?php echo $this->uri->segment(4) ?></h3>
            </div>
                <?php foreach($maps as $row) {?>
                                   <head>
                                  <style>
                                     /* Set the size of the div element that contains the map */
                                    #map {
                                      height: 400px;  /* The height is 400 pixels */
                                      width: 100%;  /* The width is the width of the web page */
                                     }
                                  </style>
                                </head>
                                <body>
                                  <div id="map"></div>
                                  <script>
                              // Initialize and add the map
                              function initMap() {
                                // The location of Uluru
                                var uluru = {lat: <?php echo $row->latitude?>, lng: <?php echo $row->longitude?>};
                                // The map, centered at Uluru
                                var map = new google.maps.Map(
                                    document.getElementById('map'), {zoom: 18, center: uluru});
                                // The marker, positioned at Uluru
                                var marker = new google.maps.Marker({position: uluru, map: map});
                              }
                                  </script>
                                  <!--Load the API from the specified URL
                                  * The async attribute allows the browser to render the page while the API loads
                                  * The key parameter will contain your own API key (which is not needed for this tutorial)
                                  * The callback parameter executes the initMap() function
                                  -->
                                  <script async defer
                                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2hsu1pXS2cShO-Hx5VtzKvBrfYnPqdII&callback=initMap">
                                  </script>
                                </body>

             <br>                
            <div class="col-md-12 row">
              <div class="col-md-6">
                <a href="<?php echo base_url()?>assets/foto/<?php echo $row->foto_satu ?>" target="_blank">
                  <img src="<?php echo base_url()?>assets/foto/<?php echo $row->foto_satu ?>" width="100%">
                </a>
              </div>
              <div class="col-md-6">
                <a href="<?php echo base_url()?>assets/foto/<?php echo $row->foto_dua ?>" target="_blank">
                <img src="<?php echo base_url()?>assets/foto/<?php echo $row->foto_dua ?>" width="100%">
                  </a>
              </div>
            </div>
            <br>
              <div class="col-md-6">
                <a href="<?php echo base_url()?>assets/foto/<?php echo $row->foto_tiga ?>" target="_blank">
                  <img src="<?php echo base_url()?>assets/foto/<?php echo $row->foto_tiga ?>" width="100%">
                </a>
              </div>
              <?php
                if($row->foto_empat != Null)
                  {
                    ?>
                    <div class="col-md-6">
                      <a href="<?php echo base_url()?>assets/foto/<?php echo $row->foto_empat ?>" target="_blank">
                        <img src="<?php echo base_url()?>assets/foto/<?php echo $row->foto_empat ?>" width="100%">
                      </a>
                    </div>
                 <?php } ?>
            
            </div>
            <br>
            <div class="col-md-12" align="center">
                <a href="<?php echo base_url()?>assets/foto/<?php echo $row->foto_lokasi ?>" target="_blank">
                   <img src="<?php echo base_url()?>assets/foto/<?php echo $row->foto_lokasi ?>" width="100%">
                </a>
            </div>
                <?php }?>
          </div>
        </div>
      </div>