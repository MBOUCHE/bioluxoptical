
  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; //var_dump($materials->result_array()); die; ?>
          :  <?= (!isset($sub_title) ? $sub_title : ''); ?><?= $this->session->flashdata('flsh_mess'); ?>

          
        </h3><hr>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width:  %">Nom et Prénom</th>
                    <th style="width:  15%">Tranche </th>
                    <th style="width:  %">Profession </th>
                    <th style="width:  %">Téléphone - Email <br> Date d'enregistrement</th>
                    <th style="width:  100px">Actions</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($customers->result_array() as $customer): ?>

                  <tr class=" <?php 
                    if ($customer['state'] == -1 ) echo('gradeX'); 
                    elseif ($customer['state'] == 1 ) echo('gradeA');
                    else echo('gradeC'); ?>">

                    <?php 
                      if ($customer['genre'] == 0 ) $genre = "Mme "; 
                      else $genre = "M. ";;
                    ?>

                    <td>
                      <?= $genre. ' '. $customer['fname_cost']. ' '. $customer['sname_cost']; ?>
                    </td>

                    <?php 
                      $slice = $this->db->where('id_slice_age', $customer['id_slice_age'])->get('slice_age')->row_object();
                    ?>

                    <td>
                      <?= $slice->content.' '.$slice->label; ?>                         
                      
                    </td>

                    <?php 
                      $user = $this->db->select('first_name, second_name')->where('id_user', $customer['id_user'])->get('users')->row_object();

                      if (is_null($user)) {
                        if ($customer['state'] == 1 and ($customer['state_account'] == -1 or $customer['state_account'] == 0)) {
                          $first_name = "<span style='color:red'>Compte Activé</span> : En attente de validation";
                        }
                        elseif($customer['state'] == 1 and ($customer['state_account'] == 1)){
                          $first_name = "Compte Activé et validé";
                        }
                        elseif($customer['state'] == -1 and ($customer['state_account'] == -1 or $customer['state_account'] == 0)){
                          $first_name = "En attente de validation et d'activation";
                        }
                        elseif($customer['state'] == 0){
                          $first_name = "Compte désactivé ";
                        }
                        $second_name = "";
                      }
                      else{

                        $first_name = 'Compte validé par '.$user->first_name;
                        $second_name = $user->second_name;
                      }
                    ?>

                    <td class="hidden-phone" style="text-align: justify;">
                      <?= $customer['profession'].'<hr> '.$first_name.' '.$second_name; ?> 
                    </td>

                    <?php 
                      $num_zone = $this->db->select('num_zone')->where('id_country', $customer['id_country'])->get('country')->row_object();
                    ?>
                    
                    <td class="center" style="text-align: justify;">
                      <?= $num_zone->num_zone.' '.$customer['phone']. '<br>' .$customer['email_cost'].'<hr>'.date("d/m/Y à H:i:s", strtotime($customer['reg_date_cost'])); ?> 
                    </td>
                    <td style="text-align: center;">

                      <a href="<?= base_url('admin/ControlPanel/view_updateCus/'.$customer['id_costomer']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?= base_url('admin/ControlPanel/viewOrtherCus/'.$customer['id_costomer']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs">
                        <i class="fa fa-share"></i>
                      </a>
                      
                      <button data-toggle="modal" data-target="#myModal4-<?= $customer['id_costomer']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                      </button>


                      <!-- Modal 4 : Suppression -->
                      <div class="modal fade" id="myModal4-<?= $customer['id_costomer']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $customer['id_costomer'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel<?= $customer['id_costomer'];?>">Alerte de suppression</h4>
                            </div>
                            <div class="modal-body">
                              Êtes-vous sûr de vouloir supprimer le client :
                              <?= $genre. ' '. $customer['fname_cost']. ' '. $customer['sname_cost']; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a href="<?= base_url('admin/ControlPanel/delCus/').$customer['id_costomer'];?>">
                              <button type="button" class="btn btn-danger">Supprimer</button></a>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- Button trigger modal -->
                      <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $customer['id_costomer']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                        <i class="fa fa-eye "></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal0<?= $customer['id_costomer']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel">Image de présentation :
                                <?= $genre. ' '. $customer['fname_cost']. ' '. $customer['sname_cost']; ?>
                              </h4>
                            </div>
                            <div class="modal-body">
                              <img style="width: 100%" src="<?= base_url('assets/img/customers/').$customer['profile_img']; ?>" alt="<?= $customer['profile_img']; ?>" class="img-thumbnail"/>
                            </div>
                            <a href="<?= base_url('admin/ControlPanel/changeCus/').$customer['id_costomer'].'/'.$customer['state'] ;?>">
                              <div class="switch demo">
                                <input type="checkbox" style="width: 50px"
                                  <?php 
                                    if ($customer['state']== -1 or $customer['state'] == 0 ) 
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
