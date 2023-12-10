  
  <!-- jQuery library -->
  <script src="<?= base_url('assets/');?>js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url('assets/');?>js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="<?= base_url('assets/');?>js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="<?= base_url('assets/');?>js/waypoints.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/');?>js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="<?= base_url('assets/');?>js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="<?= base_url('assets/');?>js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="<?= base_url('assets/');?>js/custom.js"></script> 

  <script src="<?= base_url('lib/');?>advanced-form-components.js"></script>

  <script src="<?= base_url('assets/');?>js/classie.js"></script>
  <script src="<?= base_url('assets/');?>js/uisearch.js"></script>


    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url('assets/customer/'); ?>js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?= base_url('assets/customer/'); ?>js/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/customer/'); ?>js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>



  <script>
    new UISearch( document.getElementById( 'sb-search' ) );
  </script>

  <!--script for this page-->
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <script type="text/javascript">
    //wysihtml5 start

    $('.wysihtml5').wysihtml5();

    //wysihtml5 end
  </script>

  </body>
</html>