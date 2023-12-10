
      
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPublic/consultations')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%">
          <span class="fa fa-reply" style=""></span> Retour
        </a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= mb_strtoupper($sub_title); ?> <br>
          <span style="float: left; color: red; font-size: 17px"><?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <div class="row mb col-lg-7 col-md-6">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: 100%">Sujet </th>
                    <th style="width: 100px">Emetteur<br> + Date d'émission</th>
                    <th style="width: 50px"></th>
                  </tr>
                </thead>
                <tbody>
                <?php $I=1; ?>
                <?php foreach ($messages->result_array() as $message): ?>

                  <tr class="
                    
                    <?php 
                      if ($message['state_msg'] == -1 ) echo('gradeX'); 
                      elseif (($message['state_msg'])==0 ) echo('gradeU');
                      elseif ($message['state_msg'] == 1 ) echo('gradeA');
                      else echo('gradeC');
                    ?>">

                    <td>
                      <div style="padding: 4%">
                        <?= $message['content']; ?> 
                      </div>
                    </td>

                    <?php $user = $this->db->select('fname_cost, sname_cost, genre')->where('id_costomer', $message['issuer_id'])->get('customer')->row_object();?>

                    <td style="text-align: center">
                      <?= $user->fname_cost; ?> <?= $user->sname_cost; ?><hr>
                      <?= $message['date_issue']; ?>
                    </td>
                    
                    <td style="text-align: center;">
                      
                      <button style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-default btn-xs"><i><?= $I++; ?></i>
                      </button>
                      <button data-toggle="modal" data-target="#myModal00<?= $message['id_issue']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                      </button>

                      <!-- Modal 4 : Suppression -->
                      <div class="modal fade" id="myModal00<?= $message['id_issue']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $message['id_issue'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel<?= $message['id_issue'];?>">Alerte de suppression</h4>
                            </div>
                            <div class="modal-body">
                              Êtes-vous sûr de vouloir supprimer la réponse :
                              <?= $message['content']; ?> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a href="<?= site_url('admin/ControlPublic/deleteMsg/'.$message['id_issue'].'/'.$forum->id_com);?>">
                              <button type="button" class="btn btn-danger">Supprimer</button></a>
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
        <div class="row mb">
          <div class="col-lg-5 col-md-6 col-sm-12">
                          
            <form action="<?= site_url('admin/ControlPublic/send_msg') ?>" method="post" enctype="multipart/form-data" />
              
              <input type="hidden" name="id_com" value="<?= $forum->id_com; ?>">
              <div class="dmbox">

                <div class="row">
                  <div class="col-lg-4 col-md-5" for="content">
                    Votre message :
                  </div>

                  <div class="col-lg-12 col-md-12 compose-editor">
                    <textarea  class="wysihtml5 form-control" rows="8" value="1" name="content" id="content" class="form-control">
                      <?= (!empty(set_value('content')) ? set_value('content') : '');?>
                    </textarea>
                                            
                    <div class="<?= empty(form_error('content')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('content'); ?></span >
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12">
                    
                    <button type="submit" name="indexForum" class="btn btn-theme03" style="border-radius: 0px; float: right;"><i class="fa fa-check"></i> Envoyer
                    </button><br>
                    <hr>
                    <div class="col-lg-3 col-md-2 col-sm-5 col-xs-4">
                      <img style="width: 100%" class="img-thumbnail" src="<?= base_url('assets/img/customers/'.$customer->profile_img);?>">
                    </div>
                    <div class="col-lg-9 col-md-10 col-sm-7 col-xs-8">
                      <h5>Date d'initiation : <br> <?= $forum->date_init; ?></h5>

                      <?php $user = $this->db->select('first_name, second_name, genre, reg_number')->where('id_user', $forum->id_user)->get('users')->row_object();?>

                      <p>Auteur : <?= ($user->genre==1 ? 'M. ' : 'Mme ').$user->first_name.' '.$user->second_name; ?> <br>Code utilisateur <?= $user->reg_number; ?> </p>
                    </div>

                  </div>
                </div>
                <hr>
              </div>            
            </form> 
          </div>
        </div>
        <!-- /row -->
      </section>
       
    </section>
