  <!-- Footer -->
      <footer class="footer container-fluid">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="http://telkomsel.com" target="_blank">Powered by Telkomsel</a>
            </div>
          </div>
          
        </div>
      </footer>
    </div>
  </div>

</html>
  <!--   Core   -->
  <script src="<?php echo base_url()?>assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="<?php echo base_url()?>assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="<?php echo base_url()?>assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

      <script>
        $(document).ready(function(){
            $("#region").change(function (){
                var url = "<?php echo base_url()?>User/Form/add_ajax_branch/"+$(this).val();
                $('#branch').load(url);
                return false;
            });
            });
    </script>

    <script>
        $(document).ready(function(){
            $("#branch").change(function (){
                var url = "<?php echo base_url()?>User/Form/add_ajax_cluster/"+$(this).val();
                $('#cluster').load(url);
                return false;
            });
            });
    </script>

    <script>
        $(document).ready(function(){
            $("#cluster").change(function (){
                var url = "<?php echo base_url()?>User/Form/add_ajax_kabupaten/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            });
            });
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/se-2.2.13/dt-1.10.18/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>