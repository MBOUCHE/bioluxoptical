
      
    <section id="main-content">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= mb_strtoupper($sub_title); ?> <br>
          <span style="float: left; color: red; font-size: 17px"><?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <div class="row col-lg-7 col-md-6">

          <div class="row ">
                          
            <form action="<?= site_url('admin/C_Forum/addCondition') ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-12 col-md-12 col-sm-12" style="">
                <div class="dmbox">

                  <div class="row">
                    <div class="col-lg-2 col-md-3" for="condition">
                      Enumération
                    </div>
                    <div class="col-lg-8 col-md-7">
                      <input class="form-control" type="text" name="condition" value="<?= (!empty(set_value('condition')) ? set_value('condition') : '');?>">

                      <div class="<?= empty(form_error('condition')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('condition'); ?></span >
                      </div>

                    </div>

                    <div class="col-lg-2 col-md-2">
                      <button type="submit" name="submit1" class="btn btn-theme03" style="border-radius: 0px; float: right;"><i class="fa fa-check"></i> Ajouter
                      </button>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width: %">Condition et auteur</th> 
                    <th style="width: 100px">Date </th>
                    <th style="width: 17px"></th>
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
                      <button style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-default btn-xs"><i><?= $I++; ?></i>
                      </button>
                      <?= $message['content']; ?> 

                      <?php $user = $this->db->select('fname_cost, sname_cost, genre')->where('id_costomer', $message['issuer_id'])->get('customer')->row_object();?>

                      <hr>
                      <?= $user->fname_cost; ?> <?= $user->sname_cost; ?> 
                    </td>
                    <td style="text-align: center">
                      <?= $message['date_issue']; ?>
                    </td>
                    
                    <td style="text-align: center;">
                      
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
                                Êtes-vous sûr de vouloir supprimer le sujet :
                                <?= $message['content']; ?> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a href="<?= site_url('admin/C_Forum/deleteMsg/'.$message['id_issue'].'/'.$index_com_contact->id_com);?>">
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
        <div class="row">
                          
          <form action="<?= site_url('admin/C_Forum/updateCondition'); ?>" method="post" enctype="multipart/form-data" />
            <input type="hidden" name="id_com" value="<?= $forum_page->id_com; ?>">
            <div class="col-lg-5 col-md-6 col-sm-12" style="">
              <div class="dmbox">
                <div class="service-icon col-lg-7 col-md-7">
                  <img class="img-thumbnail" src="<?= base_url('assets/img/communication/'.$forum_page->img_com);?>" style="width: 100%; height: 125px;">
                </div>
                <div class="service-icon col-lg-4 col-md-4">
                  <div class="fileupload fileupload-new " data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 152px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 152px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image de remplacement"><i class="fa fa-paperclip"></i> Changer</span>
                      <span class="fileupload-exists"  title="Choisir une image de remplacement"><i class="fa fa-undo"></i> Changer</span>
                      <input type="file" name="userimage" class="default" />
                      </span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-2 col-md-2">
                    Titre :
                  </div>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control" type="text" name="subject" value="<?= (!empty(set_value('subject')) ? set_value('subject') : $forum_page->subject); ?>">

                      <div class="<?= empty(form_error('subject')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('subject'); ?></span >
                      </div>
                  </div>
                </div>

                <div class="row">
                    <label for="title1" class="control-label" style="float: left; margin: 2%">Mise en entrée : </label>


                    <div class="col-lg-12 compose-editor">
                      <textarea  class="wysihtml5 form-control" rows="8" value="<?= (!empty(set_value('descrip')) ? set_value('descrip') : $forum_page->descrip); ?>" name="descrip" id="descrip" class="form-control">
                        <?= $forum_page->descrip; ?>
                      </textarea>
                      
                      <div class="<?= empty(form_error('descrip')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('descrip'); ?></span >
                      </div>
                    </div>
                </div>

                <div class="row">
                    <label for="Text" class="control-label" style="float: left; margin: 2%">Text en description : </label>


                    <div class="col-lg-12 compose-editor">

                      <textarea  class="wysihtml5 form-control" rows="8" value="<?= (!empty(set_value('content')) ? set_value('content') : $forum_page->content); ?>" name="content" id="content" class="form-control">
                        <?= $forum_page->content; ?>
                      </textarea>
                      
                      <div class="<?= empty(form_error('content')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('content'); ?></span >
                      </div>
                    </div>
                </div>

                <button type="submit" name="indexForum" class="btn btn-theme03" style="border-radius: 0px; float: right;"><i class="fa fa-check"></i> Valider
                </button><br>
                <hr>

                <h5>Date d'initiation : <br> <?= $forum_page->date_init; ?></h5>

                <?php $user = $this->db->select('first_name, second_name, genre, reg_number')->where('id_user', $forum_page->id_user)->get('users')->row_object();?>

                <p>Auteur : <?= ($user->genre==1 ? 'M. ' : 'Mme ').$user->first_name.' '.$user->second_name; ?> <br>Code utilisateur <?= $user->reg_number; ?> </p>
              </div>
            </div>
          </form>
        </div>
        <!-- /row -->
      </section>
       
    </section>
