  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?= base_url('assets/admin/');?>lib/jquery/jquery.min.js"></script>

  
  <script src="<?= base_url('assets/admin/');?>lib/bootstrap/js/bootstrap.min.js"></script>

  <script class="include" type="text/javascript" src="<?= base_url('assets/admin/');?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?= base_url('assets/admin/');?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?= base_url('assets/admin/');?>lib/jquery.nicescroll.js" type="text/javascript"></script>

  <script type="text/javascript" language="javascript" src="<?= base_url('assets/admin/');?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
  
  <script src="<?= base_url('assets/admin/');?>lib/jquery.sparkline.js"></script>

  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/gritter-conf.js"></script>
  <!--script for this page-->



  <!--script for this page-->
  <script src="<?=base_url('assets/admin/');?>lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- La ligne qui suit etait commentee -->
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/admin/');?>lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="<?=base_url('assets/admin/');?>lib/advanced-form-components.js"></script>

  <!-- js placed at the end of the document so the pages load faster -->

  <!--common script for all pages-->
  <script src="<?= base_url('assets/admin/');?>lib/common-scripts.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="<?= base_url('assets/admin/');?>lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "<?=base_url('assets/admin/');?>lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "<?= base_url('assets/admin/');?>lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>

  <script type="text/javascript">
    ///////////////////////////////////////////////////////////

    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Notification',
        // (string | mandatory) the text inside the notification
        text: '<?= (!isset($flsh_mess) or sizeof($flsh_mess)==0) ? $sub_title : $flsh_mess; ?>',
        // (string | optional) the image to display on the left
        image: '<?= base_url('assets/');?>img/personnals/<?= $this->session->userdata['auth_user']['profile_img']; ?>',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>

  <script type="text/javascript">
    //////////////////////////////////////////////////

    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>


  <!--script for this page-->
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <script type="text/javascript">
    //wysihtml5 start

    $('.wysihtml5').wysihtml5();

    //wysihtml5 end
  </script>


  <script src="<?= base_url('assets/admin/');?>lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?= base_url('assets/admin/');?>lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?= base_url('assets/admin/');?>lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="<?= base_url('assets/admin/');?>lib/form-component.js"></script>

</body>

</html>
