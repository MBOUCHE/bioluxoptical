
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
  <div class="container-fluid">
      
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <?= $this->session->flashdata('flsh_mess'); ?>

          <a href="<?= site_url('admin/ControlPanel/addPersonal'); ?>" class="btn btn-success" style="border-radius: 0px; font-size: 17px; float: right;" >
            <span class="glyphicon glyphicon-plus" style="margin-left: -8%"></span> Ajouter
          </a>
        </h3><hr>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: %">Nom - Prénom <br> Age - Nationalité</th>
                    <th style="width: %">Matricule - Fonction <br>Affectation</th>
                    <th style="width: 152px">Horaires :<br> N° 1 - N° 2</th>
                    <th style="width: %">Téléphone - Email  <br> Date M. à J.</th>
                    <th style="width: 75px">Actions</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($personals->result_array() as $personal): ?>

                  <tr class="
                    
                    <?php 
                      if ($personal['state'] == -1 ) echo('gradeX'); 
                      elseif ($personal['state'] == 1 ) echo('gradeA');
                      else echo('gradeC');
                    ?>">

                    <td>
                      <?php 
                      if ($personal['genre'] == 0 ) echo('Mme '); 
                      else echo('M.');
                      ?>

                      <?= $personal['first_name']; ?> <?= $personal['second_name']; ?> <br>
                      <label><?= $personal['age']?> ans</label>
                    </td>
                    <td class="hidden-phone">
                      <?= $personal['reg_number'].' - '.$personal['function'];?><br>
                      <?= $this->db->select('description')->where('id_mag', $personal['id_mag'])->get('storeshop')->row_object()->description;?>
                    </td>
                    <td style="text-align: center">
                      <?= $personal['working_time1'].'<br>/\<br>'.$personal['working_time2'];?>
                    </td>
                    
                    <td class="center hidden-phone">
                      
                      <?= $personal['phone'].'<br>'.$personal['email'];?><br>
                      <?= $personal['date_reg'];?>
                    </td>
                    <td style="text-align: center;">
                      
                      <a href="<?= site_url('admin/ControlPanel/updateThisPersonal/'.$personal['id_user']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?= site_url('admin/ControlPanel/affectPersonal/'.$personal['id_user']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs">
                        <i class="fa fa-share"></i>
                      </a>
                        <button data-toggle="modal" data-target="#myModal00<?= $personal['id_user']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                        </button>


                        <!-- Modal 4 : Suppression -->
                        <div class="modal fade" id="myModal00<?= $personal['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $personal['id_user'];?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="myModalLabel<?= $personal['id_user'];?>">Alerte de suppression</h4>
                              </div>
                              <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer le personnel :
                                <?= $personal['first_name'].' '.$personal['second_name'].' - Fonction : '.$personal['function']; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a href="<?= site_url('admin/ControlPanel/deletePersonal/'.$personal['id_user']);?>">
                                <button type="button" class="btn btn-danger">Supprimer</button></a>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!-- Button trigger modal -->
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $personal['id_user']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                          <i class="fa fa-eye "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal0<?= $personal['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>

                                <?php 
                                if ($personal['genre'] == 0 ) $function = $personal['function'].'NE'; 
                                else $function = $personal['function'];
                                ?>

                                <h4 class="modal-title" id="myModalLabel">Image de profile de : <?= $personal['first_name'].' '.$personal['second_name'].' - '.$function; ?></h4>
                              </div>

                              <div class="img-thumbnail">

                                Diplôme : <?= $personal['diploma'].'<br>Années d\'expérience :'.$personal['years_exp'];?> ans<br>
                                Nombre de Manips : <?= $personal['id_mag'];?>
                              </div>

                              <div class="modal-body">
                                <img style="width: 100%" src="<?= base_url('assets/img/personnals/').$personal['profile_img']; ?>" alt="<?= $personal['profile_img']; ?>" class="img-thumbnail"/>
                              </div>
                              <a href="<?= site_url('admin/ControlPanel/activatePersonal/'.$personal['id_user'].'/'.$personal['state'].'/'.$personal['id_role']) ;?>">
                                <div class="switch demo">
                                  <input type="checkbox" style="width: 50px"
                                    <?php 
                                      if ($personal['state']== -1 or $personal['state'] == 0 ) 
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
