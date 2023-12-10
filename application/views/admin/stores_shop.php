
  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          : <?= $this->session->flashdata('flsh_mess'); ?>

          <a href="<?= site_url('admin/ControlPanel/add');?>" class="btn btn-success" style="border-radius: 0px; font-size: 17px; float: right;" >
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
                    <th style="width:  %">P.O. BOX.</th>
                    <th style="width:  %">Description du Lieu</th>
                    <th style="width:  %">Contact</th>
                    <th style="width: 100px">Actions</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($stores_shop->result_array() as $store_shop): ?>

                  <tr class="
                    
                    <?php 
                      if ($store_shop['state_mag'] == -1 ) echo('gradeX'); 
                      elseif ($store_shop['state_mag'] == 1 ) echo('gradeA');
                      else echo('gradeC');
                    ?>">

                    <td><?= $store_shop['po_box']; ?></td>
                    <td><?= $store_shop['description']; ?> <HR>
                      <label>Date d'enregistrement : <?= $store_shop['date_reg_mag']?></label>
                    </td>
                    <?php $num_zone = $this->db->select('num_zone')->from('country')->where('id_country', $store_shop['id_country'])->get()->result_array(); ?>
                    <td class="center hidden-phone">
                      <?= $num_zone[0]['num_zone'].' - '.$store_shop['phone_ss']?><br>
                      
                    </td>
                    <td style="text-align: center;">




                      <a href="<?= base_url('admin/ControlPanel/view_updateMag/'.$store_shop['id_mag']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                        <button data-toggle="modal" data-target="#myModal4" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                        </button>


                        <!-- Modal 4 : Suppression -->
                        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Alerte de suppression</h4>
                              </div>
                              <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer le magasin :
                                <?= $store_shop['description']; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a href="<?= base_url('admin/ControlPanel/delMag/').$store_shop['id_mag'];?>">
                                <button type="button" class="btn btn-danger">Supprimer</button></a>
                              </div>
                            </div>
                          </div>
                        </div>


                      <!-- Button trigger modal -->
                      <button class="btn btn-primary btn-xs" style="margin: 2%; border-radius: 4px; font-size: 17px;" data-toggle="modal" data-target="#myModal<?= $store_shop['id_mag']; ?>">
                        <span class="fa fa-building-o"></span>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal<?= $store_shop['id_mag']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Image de présentation du magasin : <?= $store_shop['description']; ?></h4>
                            </div>

                          <div class="img-thumbnail">
                            <?= 'Longitude : '.$store_shop['longitude'].' <br> Latitude : '.$store_shop['latitude'].' <br> Altitude : '.$store_shop['altitude'] ?>
                          </div>
                          
                            <div class="modal-body">
                              <img style="width: 100%" src="<?= base_url('assets/img/storeshop/').$store_shop['building_img']; ?>" alt="<?= $store_shop['building_img']; ?>" class="img-thumbnail"/>
                            </div>
                            <a href="<?= base_url('admin/ControlPanel/changeState/').$store_shop['id_mag'];?>">
                        <div class="switch demo">
                          <input type="checkbox" style="width: 50px"
                            <?php 
                              if ($store_shop['state_mag']== -1 or $store_shop['state_mag'] == 0 ) 
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

