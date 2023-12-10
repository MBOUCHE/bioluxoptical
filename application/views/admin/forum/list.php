
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
          <a href="<?= site_url('admin/C_Forum/forum'); ?>" class="btn btn-success" style="margin-right: 1%; border-radius: 0px; font-size: 17px; float: right;" >
            <span class="glyphicon glyphicon-plus" style="margin-right: 1%"></span> Ajouter
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
                    <th style="width: %">Sujet </th> 
                    <th style="width: %">Manager / Personnel</th>
                    <th style="width: ">Période : Début - Fin</th>
                    <th style="width: %">Echanges </th>
                    <th style="width: 75px">Actions</th>
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
                    ?>">

                    <td>
                      <?= $communication['subject']; ?> 
                    </td>

                    <?php 
                      $user = $this->db->select('first_name, second_name, genre')->where('id_user', $communication['id_user'])->get('users')->row_object();
                      $user2 = $this->db->select('fname_cost, sname_cost, genre')
                                        ->where('title_rm', 'indexForum')
                                        ->where('id_com', $communication['id_com'])
                                        ->join('issue', 'issue.issuer_id=customer.id_costomer')
                                        ->get('customer')->row_object();

                    ?>

                    <td class="hidden-phone">
                      <?= ($user->genre ==1 ? 'M. ' : 'Mme '). $user->first_name.' '. $user->second_name; ?> <br> Proposé par : <?= isset($user2) ? (($user2->genre ==1 ? 'M. ' : 'Mme '). $user2->fname_cost.' '. $user2->sname_cost) : '-------------------------------------'; ?>
                    </td>
                    <td style="text-align: center">
                      <?= $communication['date_init'].'<br>/\<br>';?><?= (strlen($communication['date_end']) !=0) ? $communication['date_end'] : '<label style="color: red">Sujet non clos</label>'; ?>
                    </td>
                    
                    <td class="center hidden-phone">
                      <?= $this->db->select('id_issue')->from('issue')->where('id_com', $communication['id_com'])->where('state_msg', 1)->count_all_results();?> Echanges visibles et
                      <br><?= $this->db->select('id_issue')->from('issue')->where('id_com', $communication['id_com'])->where('state_msg', -1)->count_all_results();?> Echanges non visibles
                      <br>
                      Pour 
                      <?= $this->db->distinct('customer.id_costomer')->from('issue')->where('id_com', $communication['id_com'])->where('state_account', 1)->where('state_msg', 1)->join('customer', 'customer.id_costomer=issue.issuer_id')->count_all_results(); ?> participants activés.
                    </td>
                    <td style="text-align: center;">
                      
                      <a href="<?= site_url('admin/C_Forum/updateThiscom/'.$communication['id_com']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <!-- <a href="<?= site_url('admin/C_Forum/affectcommunication/'.$communication['id_com']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs">
                        <i class="fa fa-share"></i>
                      </a> -->
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
                                Êtes-vous sûr de vouloir supprimer le sujet :
                                <?= $communication['subject']; ?> 
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

                                <h4 class="modal-title" id="myModalLabel">Image de présentation du sujet : <?= $communication['subject'].'<br> par '.($user->genre == 0 ? 'Mme ' : 'M. ').$user->first_name.' - '.$user->second_name; ?></h4>
                              </div>

                              <div class="modal-body">
                                <img style="width: 100%" src="<?= base_url('assets/img/communication/').$communication['img_com']; ?>" alt="<?= $communication['img_com']; ?>" class="img-thumbnail"/>
                              </div>
                              <a href="<?= site_url('admin/C_Forum/activate/'.$communication['id_com'].'/'.$communication['state']) ;?>">
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
