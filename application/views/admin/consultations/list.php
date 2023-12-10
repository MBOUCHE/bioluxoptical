
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
  <div class="container-fluid">
      
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= mb_strtoupper($sub_title); ?>

          <a href="<?= site_url('admin/C_Forum/mangeIndex'); ?>" class="btn btn-primary" style="border-radius: 0px; font-size: 17px; float: right;" >
            <span class="fa fa-file-text" style="margin-left: -8%"></span> Conditions générales
          </a>
          <a href="<?= site_url('admin/ControlPublic/addConsult'); ?>" class="btn btn-success" style="margin-right: 1%; border-radius: 0px; font-size: 17px; float: right;" >
            <span class="glyphicon glyphicon-plus" style="margin-right: 1%"></span> Gérer
          </a><br>
          <span style="color: red; font-size: 17px">
            <?= $this->session->flashdata('flsh_mess'); ?>
          </span>
        </h3><hr>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: %">Client / Patient / Abonné </th> 
                    <th style="width: %">Personnel</th>
                    <th style="width: 125px">Période : Début - Fin</th>
                    <th style="width: 100%">Echanges </th>
                    <th style="width: 20px; text-align: center;"><i class="fa fa-2x fa-dashboard"></i></th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($communications->result_array() as $communication): ?>

                  <tr class="
                    
                    <?php 
                      if ($communication['state'] == -1 ) echo('gradeX'); 
                      //elseif (empty($communication['date_end'])) echo('gradeU');
                      elseif ($communication['state'] == 1 ) echo('gradeA');
                      else echo('gradeC');

                      $customer = $this->db->where('id_costomer', $communication['subject'])
                                          ->join('country', 'country.id_country=customer.id_country')
                                          ->get('customer')->row_object();
                    ?>">

                    <td>
                      <?= $customer->fname_cost.' '.$customer->sname_cost.'<br><i>'.$customer->profession.'</i>'.'<hr>'.'
                      <span style="font-size: 15px; padding: 0px; margin-top: -20%"> [
                        <span style="font-size: 22px;" class="fa fa-phone"></span>
                        '.$customer->num_zone.' <a href="tel:'.$customer->phone.'">'.$customer->phone.'</a>]
                      </span>'; ?>
                      <br>
                      <span style="font-size: 13px;">
                        <img src="<?= base_url('assets/img/logo_gm.png'); ?>" alt="logo" style="width: 17px;">
                        <a style="font-size: 15px" href="mailto:<?= $customer->email_cost; ?>"><?= $customer->email_cost; ?></a>
                      </span>
                    </td>

                    <?php $user = $this->db->select('first_name, second_name, genre, profile_img, phone, diploma, function, email')->where('id_user', $communication['id_user'])->get('users')->row_object();?>

                    <td class="hidden-phone">

                      <?php if(isset($user)): ?>
                      <?= $user->first_name.' '.$user->second_name.'<br><i>'.$user->diploma.'</i> - '.$user->function.'<hr>'.'
                        <span style="font-size: 15px; padding: 0px; margin-top: -20%"> [
                          <span style="font-size: 22px;" class="fa fa-phone"></span>
                        (+---) <a href="tel:'.$user->phone.'">'.$user->phone.'</a>]
                        </span>'; ?>
                      <br>
                      <span style="font-size: 13px">
                        <img src="<?= base_url('assets/img/logo_gm.png'); ?>" alt="logo" style="width: 17px;">
                        <a style="font-size: 15px" href="mailto:<?= $customer->email_cost; ?>"><?= $user->email; ?></a>
                      </span>
                      <?php else: ?>
                        <i>En attente d'attribution</i>
                        <?php if($communication['state'] != -1): ?>
                        <form>
                          <select name="id_user<?= $communication['id_com'];?>" id="id_user<?= $communication['id_com'];?>" class="form-control">
                            <option value="">
                              ------ Choisir un personnel -------
                            </option>

                            <?php foreach ($opticians->result_array() as $optician): ?>
                            <option value="<?= $optician['id_user']; ?>" <?= (!empty(set_value('id_user'.$communication['id_com'])) and set_value('id_user'.$communication['id_com']) == $optician['id_user']) ? ' selected="selected"' : '' ; ?>>
                              <?= $optician['genre'] == 1 ? 'M. ' : 'Mme ' ?><?= $optician['first_name'].' '.$optician['second_name'].' - <i>'.$optician['name_role'].'<i/>'.' - <b>'.$optician['function'].'<b/>'; ?>
                            </option>
                            <?php endforeach ?>

                            <?php foreach ($consultants->result_array() as $optician): ?>
                            <option value="<?= $optician['id_user']; ?>" <?= (!empty(set_value('id_user'.$communication['id_com'])) and set_value('id_user'.$communication['id_com']) == $optician['id_user']) ? ' selected="selected"' : '' ; ?>>
                              <?= $optician['genre'] == 1 ? 'M. ' : 'Mme ' ?><?= $optician['first_name'].' '.$optician['second_name'].' - <i>'.$optician['name_role'].'<i/>'.' - <i>'.$optician['function'].'<i/>'; ?>
                            </option>
                            <?php endforeach ?>

                          </select>
                          <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $communication['id_com']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                            <i class="fa fa-check "></i>
                          </button>
                        </form>
                        <?php endif; ?>
                      <?php endif; ?>
                    </td>
                    <td style="text-align: center">
                      <?= date('d/m/Y - H:i:s', strtotime($communication['date_init'])).'<br>/\<br>';?><?= (strlen($communication['date_end']) !=0) ? date('d/m/Y - H:i:s', strtotime($communication['date_end'])) : '<label style="color: red">Sujet non clos</label>'; ?>
                    </td>
                    
                    <td class="center hidden-phone">
                      <?= $this->db->select('id_issue')->from('issue')->where('id_com', $communication['id_com'])->where('state_msg', 1)->count_all_results();?> Echanges visibles et
                      <br><?= $this->db->select('id_issue')->from('issue')->where('id_com', $communication['id_com'])->where('state_msg', -1)->count_all_results();?> Echanges non visibles
                      <br>
                      Pour 
                      <?= $this->db->distinct('customer.id_costomer')->from('issue')->where('id_com', $communication['id_com'])->where('state_account', 1)->where('state_msg', 1)->join('customer', 'customer.id_costomer=issue.issuer_id')->count_all_results(); ?> participants activés.
                    </td>
                    <td style="text-align: center;">
                      <?php if(isset($user)): ?>
                      <a href="<?= site_url('admin/ControlPublic/inThiscom/'.$communication['id_com']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <?php endif; ?>
                        <button data-toggle="modal" data-target="#myModal00<?= $communication['id_com']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                        </button>
                        <!-- Modal 4 : Suppression -->
                        <div class="modal fade" id="myModal00<?= $communication['id_com']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $communication['id_com'];?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                <h4 class="modal-title" id="myModalLabel<?= $communication['id_com'];?>">Alerte de suppression</h4>
                              </div>
                              <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer la communication de :
                                <?= $customer->fname_cost.' '.$customer->sname_cost; ?> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a href="<?= site_url('admin/C_Forum/delete/'.$communication['id_com']);?>">
                                <button type="button" class="btn btn-danger">Supprimer</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $communication['id_com']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                          <i class="fa fa-eye "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal0<?= $communication['id_com']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>

                                <?php if(isset($user)): ?>
                                <h4 class="modal-title" id="myModalLabel">Image de présentation : <?= $customer->fname_cost.' '.$customer->sname_cost.'<br> & '.($user->genre == 0 ? 'Mme ' : 'M. ').$user->first_name.' - '.$user->second_name; ?></h4>
                                <?php else: ?>
                                <h4 class="modal-title" id="myModalLabel">Image de présentation : <?= $customer->fname_cost.' '.$customer->sname_cost.'<br> & -----En attente-----'; ?></h4>
                                <?php endif; ?>
                              </div>

                              <div class="modal-body">
                                <div class="col-lg-5 col-md-5">
                                  <img style="width: 100%" src="<?= base_url('assets/img/customers/').$customer->profile_img; ?>" alt="<?= $customer->profile_img; ?>" class="img-thumbnail"/>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                  <span class="fa fa-4x <?= $communication['img_com']; ?>"></span>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                  <?php if(isset($user)): ?>
                                  <img style="width: 100%" src="<?= base_url('assets/img/personnals/').$user->profile_img; ?>" alt="<?= $user->profile_img; ?>" class="img-thumbnail"/>
                                  <?php else: ?>
                                  <h4 class="modal-title" id="myModalLabel"><br> & -----En attente-----</h4>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <?php if(isset($user)): ?>
                                <a href="<?= site_url('admin/ControlPublic/stateConsult/'.$communication['id_com'].'/'.$communication['state']) ;?>">
                                  <div class="switch demo">
                                    <input type="checkbox" style="width: 50px"
                                      <?php 
                                        if ($communication['state']== -1 or $communication['state'] == 0 ) 
                                          echo('');
                                        else echo('checked');
                                      ?> >
                                    <label><i></i></label>
                                  </div>
                                </a>
                                <?php else: ?>
                                <h4 class="modal-title" id="myModalLabel"><br> & -----En attente-----</h4>
                                <?php endif; ?>
                              </div>
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
