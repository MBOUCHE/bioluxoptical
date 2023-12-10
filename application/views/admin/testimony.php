
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          <?= (!isset($sub_title) ? $sub_title : ''); ?> <br><?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <?php if(isset($this_issue)): ?>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title"><?= $presentation ?></h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="<?= site_url('admin/ControlPublic/answer2') ?>" method="POST">
              <input type="hidden" name="id_issue" id="id_issue" value="<?= $this_issue->id_issue; ?>">
              <div class="form-group">
                <input disabled="disabled" type="text" name="fname_cost" id="fname_cost" class="form-control" value="<?= $this_issue->genre ==1 ? 'M. ' : 'Mme ' ?> <?= $this_issue->fname_cost.' '.$this_issue->sname_cost ?>" placeholder="Nom et prenom">
              </div>
              <div class="form-group">
                <input disabled="disabled" type="email" name="email_cost" id="email_cost" class="form-control" value="<?= $this_issue->email_cost; ?>" placeholder="Email">
              </div>
              <div class="form-group">
                <input disabled="disabled" type="text" name="title_rm" id="title_rm" class="form-control" value="<?= $this_issue->title_rm; ?>" placeholder="Réponse au sujet de...">
              </div>

              <div class="form-group">

                <textarea  class="wysihtml5 form-control" rows="9" name="content" id="content" class="form-control" placeholder="Votre message" rows="5" data-rule="required">
                  <?= (set_value('content')) ? set_value('content') : '';?>
                    
                </textarea>
                
                <div class="<?= empty(form_error('content')) ? "" : "has-error" ?>">
                  <span class="help-block "><?= form_error('content'); ?></span >
                </div>
              </div>

              <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary" style="border-radius: 0px"><i class="glyphicon glyphicon-send"></i> Répondre</button>
              </div>

            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Message :</h4>
            
            <div class="col-lg-7 col-md-8 col-sm-6">
              <?= $this_issue->content; ?>

              <?php $country = $this->db->where('id_country', $this_issue->id_country)->get('country')->row_object(); ?>

            </div>

            <div class="col-lg-5 col-md-4 col-sm-6">
              <ul class="contact_details">
                <li><img class="img-thumbnail" style="width: 100%" src="<?= base_url('assets/img/customers/'.$this_issue->profile_img); ?>">
                </li><br>
                <li> <?= $this_issue->profession.' - '.$this->db->select('content')->where('id_slice_age', $this_issue->id_slice_age)->get('slice_age')->row_object()->content; ?></li>
                <li><i class="fa fa-phone-square"></i> <?= $country->num_zone.' '.$this_issue->phone; ?></li>
                <li><i class="fa fa-home"></i> <?= $country->name_country; ?>.</li>
              </ul>

              <a style="float: left;" href="<?= base_url('admin/ControlPublic/stateTestimonial/').$this_issue->id_issue.'/'.$this_issue->state_msg ;?>">
                <div class="switch demo">
                  <input type="checkbox" style="width: 40px"
                    <?php 
                      if ($this_issue->state_msg== -1 or $this_issue->state_msg == 0 ) 
                        echo('');
                      else echo('checked');
                    ?> >
                  <label><i></i></label>
                </div>
              </a>
            </div>
          </div>
        <?php endif; ?>

        <?php if(!isset($this_issue)): ?>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Le mot sur cette page</h4>
            <form class="contact-form php-mail-form" role="form" action="<?= site_url('admin/ControlPublic/updTestimonialPage') ?>" method="POST">
              <input type="hidden" name="id_com" value="<?= $index_com_testimony->id_com; ?>">
              <textarea class="wysihtml5" rows="8" cols="80" name="descrip" style="padding: 4px">
                <?= (set_value('descrip')) ? set_value('descrip') : $index_com_testimony->descrip; ?>
              </textarea>
                
              <div class="<?= empty(form_error('descrip')) ? "" : "has-error" ?>">
                <span class="help-block "><?= form_error('descrip'); ?></span >
              </div>
              <!-- contact_details -->
              <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary" style="border-radius: 0px"><i class="glyphicon glyphicon-refresh"></i> Modifer</button>
              </div>
            </form>
          </div>
        <?php endif; ?>

        </div>
        <!-- /row -->
        <!-- page start-->
          <hr>
          <h4 class="title">Liste des témoignages et leur visibilité sur le site</h4>
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: %">Contenu </th> 
                    <th style="width: %">Client / Abonné</th>
                    <th style="width: ">Date d'émission</th>
                    <th style="width: 75px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php $I=1; ?>
                <?php foreach ($Testimonials->result_array() as $message): ?>

                  <tr class="
                    
                    <?php 
                      if ($message['state_msg'] == -1 ) echo('gradeX'); 
                      elseif (($message['state_msg'])==0 ) echo('gradeU');
                      elseif ($message['state_msg'] == 1 ) echo('gradeA');
                      else echo('gradeC');
                    ?>">

                    <td>
                      <button style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-default btn-xs"><i><?= $I++; ?></i>
                      </button>
                      <?= $message['content']; ?> 
                    </td>

                    <?php $user = $this->db->select('fname_cost, sname_cost, genre')->where('id_costomer', $message['issuer_id'])->get('customer')->row_object();?>

                    <td class="hidden-phone">
                      <?= $user->fname_cost; ?> <?= $user->sname_cost; ?> 
                      <?php 
                      if ($message['state_msg'] == -1 ) echo('<br><i style="float: right">En attente</i> '); 
                      elseif ($message['state_msg'] == 1 ) echo('<hr>'.mb_strimwidth($message['img_issue'], 0, 89).'...');
                    ?>
                    </td>
                    <td style="text-align: center">
                      <?=  date('d/m/Y - H:i:s', strtotime($message['date_issue'])) ; ?>
                    </td>
                    
                    <td style="text-align: center;">
                      <a href="<?= base_url('admin/ControlPublic/Testimonial/'.$message['id_issue']);?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-info btn-xs" title='Gérer'>
                        <i class="glyphicon glyphicon-retweet"></i>
                      </a>

                      <button data-toggle="modal" data-target="#myModal00<?= $message['id_issue']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs" title='Supprimer'><i class="fa fa-trash-o "></i>
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
                              Êtes-vous sûr de vouloir supprimer le sujet :
                              <?= $message['content']; ?> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a href="<?= site_url('admin/C_Forum/deleteMsg/'.$message['id_issue'].'/'.$index_com_testimony->id_com);?>">
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

        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->