
  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          :  <?= (!isset($sub_title) ? $sub_title : ''); ?>
          <?= $this->session->flashdata('flsh_mess'); ?>
          <a href="<?= site_url('admin/ControlPanel/addR') ?>" class="btn btn-success" style="border-radius: 0px; font-size: 17px; float: right;" >
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
                    <th style="width:  %">Designation - Code - prix U.</th>
                    <th style="width:  15%">Origine - Type - Catégorie</th>
                    <th style="width:  40%">Remarque - Gestionnaire</th>
                    <?php if (isset($id_mag)): ?>
                    <th style="width: ">
                      <form action="<?= site_url('admin/ControlPanel/updQtyPropose') ?>" method="post">Qté
                        <input type="hidden" name="id_mag" value="<?= $id_mag; ?>">
                        <button class="btn btn-warning" style="border-radius: 0px; float: right;">
                          <i class="fa fa-refresh"></i>
                        </button>
                    </th>
                    <?php endif; ?>
                    <th style="width: 100px; text-align: center;"><i class="fa fa-2x fa-dashboard"></i></th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($reasons->result_array() as $reason): ?>

                  <tr class=" <?php 
                      if ($reason['state_reason'] == -1 ) echo('gradeX'); 
                      elseif ($reason['state_reason'] == 1 ) echo('gradeA');
                      else echo('gradeC'); ?>">

                    <td>
                      <?= strlen($reason['name_reason'])==0 ? '' : '<br>- Désig. : '.$reason['name_reason']; ?>

                      <?= strlen($reason['code_reason'])==0 ? '' : '<br>- Code : '.$reason['code_reason']; ?>

                      <?= strlen($reason['price_reason'])==0 ? '' : '- Prix : '.$reason['price_reason'].'  FCFA'; ?>

                    </td>
                    <td>

                      <span>Origine : <?= $reason['origine_reason']; ?>.<br></span>
                      <span>Type : <?= $reason['name_type']?></span>
                      <label>Catégorie : <?= $reason['label'] ?></label>
                          
                      
                    </td>
                    <td class="hidden-phone" style="text-align: justify;">
                      
                      <label><?= $reason['note_reason'] ?> </label><br>
                      <label>Enregisté par : <?= $reason['first_name'].' '.$reason['second_name'].' <br> <i>Fonction</i> : '.$reason['function'] ?></label>
                      </label>
                    </td>

                    <?php if (isset($id_mag)): ?>
                      <td style="text-align: left;">
                        <?php if($reason['quantity']!=0) : ?>
                        <label style="width: 100%; text-align: center;" for="qty<?=$reason['id_reason']?>"><?= $reason['quantity']?></label><br>
                        
                        <?= form_input(['name' => 'qty'.$reason['id_reason'], 'qty'.$reason['id_reason'], 'class' => 'form-control', 'type' => "number", 'step' => "1", 'min' => '0', 'style' => "width: 100%; float: right;"], (!empty(set_value('qty'.$reason['id_reason'])) ? set_value('qty'.$reason['id_reason']) : $reason['quantity'])) ?>

                        <div class="<?= empty(form_error('qty'.$reason['id_reason'])) ? "" : "has-error" ?>">
                          <span class="help-block "><?= form_error('qty'.$reason['id_reason']); ?></span >
                        </div>
                        <?php else: ?>
                        <input type="number" name="qty<?= $reason['id_reason']?>" value="0" class="form-control" style="width: 50%; float: right;" disabled="disabled">
                        <?php endif; ?>
                      </td>
                    </form>
                    <?php endif; ?>
                    
                    <td style="text-align: center;">

                      <a href="<?= base_url('admin/ControlPanel/view_updateRea/'.$reason['id_reason']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>

                      <a href="<?= base_url('admin/ControlPanel/view_affectRea/'.$reason['id_reason']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-share"></i>
                      </a>

                      <button data-toggle="modal" data-target="#myModal4<?= $reason['id_reason'];?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                      </button>


                      <!-- Modal 4 : Suppression -->
                      <div class="modal fade" id="myModal4<?= $reason['id_reason'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $reason['id_reason'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel<?= $reason['id_reason'];?>">Alerte de suppression</h4>
                            </div>
                            <div class="modal-body">
                              Êtes-vous sûr de vouloir supprimer le produit :
                              <?= $reason['name_reason']; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a href="<?= base_url('admin/ControlPanel/delRea/').$reason['id_reason'];?>">
                              <button type="button" class="btn btn-danger">Supprimer</button></a>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- Button trigger modal -->
                      <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $reason['id_reason']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                        <i class="fa fa-eye "></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal0<?= $reason['id_reason']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel">Image de présentation : <?= $reason['name_reason']; ?></h4>
                            </div>
                            <div class="img-thumbnail col-lg-6 col-md-6">
                              <?= substr($reason['description_reason'],0,26).'...'.(!empty($reason['article']) ? '<br> - article : '.$reason['article'] : '' ) ?><hr>
                              <label style="float: right;">Date de Fab. : <?= (isset($reason['date_manufacturate']) and $reason['date_manufacturate'] != '0000-00-00') ? $reason['date_manufacturate'] : '- - / - - / - - - -'; ?> <br> Date d'expir. : <?= (isset($reason['date_experation']) and $reason['date_experation'] != '0000-00-00') ? $reason['date_experation'] : '- - / - - / - - - -'; ?>
                              </label>

                            </div>
                            <div class="modal-body col-lg-6 col-md-6">
                              <img style="width: 100%" src="<?= base_url('assets/img/reason/').$reason['img_reason']; ?>" alt="<?= $reason['img_reason']; ?>" class="img-thumbnail"/>
                            </div>
                            <div class="modal-body">
                              <img style="width: 100%" src="<?= base_url('assets/img/reason/').$reason['img2_reason']; ?>" alt="<?= $reason['img2_reason']; ?>" class="img-thumbnail"/>
                            </div>
                            <a href="<?= base_url('admin/ControlPanel/changeRea/').$reason['id_reason'].'/'.$reason['state_reason'] ;?>">
                              <div class="switch demo">
                                <input type="checkbox" style="width: 50px"
                                  <?php 
                                    if ($reason['state_reason']== -1 or $reason['state_reason'] == 0 ) 
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

  <script type="text/javascript" language="javascript" src="<?= base_url('assets/admin/');?>lib/advanced-datatable/js/jquery.js"></script>
