
  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          <?= (!isset($sub_title) ? $sub_title : ''); ?>
          <hr>
          <span style="font-size: 17px; color: blue;"><?= $store_shop->description; ?></span>
          <span style="float: right;"><?= $this->session->flashdata('flsh_mess'); ?></span>

        </h3><hr>

        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width:  %">Désignation</th>
                    <th style="width:  15%">Code </th>
                    <th style="width:  100%">Description</th>
                    <th style="width:  %">Date d'enregistrement</th>
                    <th style="width:  %">Actions</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($materials->result_array() as $material): ?>

                  <tr class=" <?php 
                      if ($material['state_mat'] == -1 ) echo('gradeX'); 
                      elseif ($material['state_mat'] == 1 ) echo('gradeA');
                      else echo('gradeC'); ?>">

                    <td>
                      <?= $material['name_mat']; ?><br> Qté : <?= $material['quantity']; ?>
                    </td>
                    <td>
                      <?= $material['reg_num_mat']; ?>                         
                      
                    </td>
                    <td class="hidden-phone" style="text-align: justify;">
                      <?= $material['desc_mat']; ?> 
                    </td>
                    
                    <td class="center" style="text-align: justify;">
                      <?= $material['date_reg']; ?> 
                    </td>
                    <td style="text-align: center;">

                      <a href="<?= base_url('admin/ControlPanel/view_affectMat/'.$material['id_mat']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-share"></i>
                      </a>


                        <!-- Button trigger modal -->
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $material['id_mat']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                          <i class="fa fa-eye "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal0<?= $material['id_mat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="myModalLabel">Image de présentation : <?= $material['name_mat']; ?></h4>
                              </div>
                              <div class="modal-body">
                                <img style="width: 100%" src="<?= base_url('assets/img/materials/').$material['img_mat']; ?>" alt="<?= $material['img_mat']; ?>" class="img-thumbnail"/>
                              </div>
                              <a href="<?= base_url('admin/ControlPanel/changeMat/').$material['id_mat'].'/'.$material['state_mat'] ;?>">
                                <div class="switch demo">
                                  <input type="checkbox" style="width: 50px"
                                    <?php 
                                      if ($material['state_mat']== -1 or $material['state_mat'] == 0 ) 
                                        echo('');
                                      else echo('checked');
                                    ?> >
                                  <label><i></i></label>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                         

                    </td>
                  </tr>

                <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>

    </section>

  </div>
<!-- Spécialement pour le problème du tableau de cette vue. -->

  <!-- <script type="text/javascript" language="javascript" src="<?= base_url('assets/admin/');?>lib/advanced-datatable/js/jquery.js"></script> -->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

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
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
