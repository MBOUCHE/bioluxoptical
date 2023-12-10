



  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          :  <?= (!isset($sub_title) ? $sub_title : ''); ?>

          <a href="<?= site_url('admin/C_Provider/add') ?>" class="btn btn-success" style="border-radius: 0px; font-size: 17px; float: right;" >
            <span class="glyphicon glyphicon-plus" style="margin-left: -8%"></span> Ajouter
          </a> <br> <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: 20%">Partenaire <br> Raison sociale <br>Contact</th>
                    <th style="width: 20%"> Numéro de code <br> Description</th>
                    <th style="width: 50%">Termes du partenariat <br> Gestionnaire</th>
                    <th style="width:  %">Type de partenariat <br>Date de modification</th>
                    <th style="width: "><i class="fa fa-2x fa-dashboard"></i></th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($providers->result() as $provider): ?>

                  <tr class=" <?php 
                      if ($provider->state_prov == -1 ) echo('gradeX'); 
                      elseif ($provider->state_prov == 1 ) echo('gradeA');
                      else echo('gradeC'); ?>">

                    <?php 

                      $user = $this->db->select('genre, first_name, second_name')->where('id_user', $provider->id_user)->get('users')->result_array()[0];
                      $first_name = $user['first_name']; 
                      $second_name = $user['second_name']; 
                      $genre = $user['genre'];

                      if ($genre == 0) {
                         $genre = 'Mme ';
                       } 
                       $genre = 'M. ';
                    ?>


                    <td>
                      <?= $provider->name_prov; ?><hr>

                      <?= $provider->social_reason; ?><hr>

                      <?= $provider->contact; ?>

                    </td>
                    <td>


                      <span><?= $provider->code_number; ?>.<hr></span>
                      <span style="padding-left: 4%"><?= $provider->description; ?></span> 
                          
                      
                    </td>
                    <td class="hidden-phone" style="text-align: justify;">
                      
                      <label style="padding-left: 4%"><?= $provider->termes; ?> </label><br>
                      <label style="float: right;">Géré par : <br><?= $genre.' '.$first_name." ".$second_name; ?></label>
                    </td>
                    
                    <td class="center" style="text-align: justify;">
                      <?= $this->db->select('name_type')->where('id_type', $provider->type_prov)->get('type_prov')->row_object()->name_type; ?><hr>
                      <label style="float: right;">Dernière modification :<br>
                      	<?= (isset($provider->date_reg_prov) and $provider->date_reg_prov != '0000-00-00') ?  date("d-m-Y à H:m:s", strtotime($provider->date_reg_prov)) : '- - / - - / - - - -'; ?>
                      		
                      	</label>
                    </td>
                    <td style="text-align: center;">

                      <a href="<?= site_url('admin/C_Provider/edit/'.$provider->id_prov);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                        <button data-toggle="modal" data-target="#myModal00<?= $provider->id_prov; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                        </button>


                        <!-- Modal 4 : Suppression -->
                        <div class="modal fade" id="myModal00<?= $provider->id_prov; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $provider->id_prov;?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="myModalLabel<?= $provider->id_prov;?>">Alerte de suppression</h4>
                              </div>
                              <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer le partenaire :
                                <?= $provider->name_prov; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a href="<?= site_url('admin/C_Provider/delete/'.$provider->id_prov);?>">
                                <button type="button" class="btn btn-danger">Supprimer</button></a>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!-- Button trigger modal -->
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $provider->id_prov; ?>" style=" border-radius: 4px; font-size: 17px;">
                          <i class="fa fa-eye "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal0<?= $provider->id_prov; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="myModalLabel">Image de présentation : <?= $provider->name_prov; ?></h4>
                              </div>
                              <div class="modal-body">
                                <img style="width: 100%" src="<?= base_url('assets/img/pay/').$provider->img_logo; ?>" alt="<?= $provider->img_logo; ?>" class="img-thumbnail"/>
                              </div>
                              <a href="<?= base_url('admin/C_Provider/activate/').$provider->id_prov.'/'.$provider->state_prov ;?>">
                                <div class="switch demo">
                                  <input type="checkbox" style="width: 50px"
                                    <?php 
                                      if ($provider->state_prov== -1 or $provider->state_prov == 0 ) 
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
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>

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
