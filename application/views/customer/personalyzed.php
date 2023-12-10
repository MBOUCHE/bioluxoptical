
        <link href="http://localhost/bioluxoptical/assets/css/bouton/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/login/css/style.css" />
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style=" background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= mb_strtoupper($sub_title); ?>  <span style="float: right;"><?= $presentation; ?></span> </h4>
                        <hr/>
                        <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                <div class="panel-body" style="margin-top: -8%">

                  <form class="formulaire" style="width: 100%; background-color: white" action="<?= site_url('customer/CustomerPanel/addmesure');?>" enctype="multipart/form-data" method="post">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">1. Choix d'une monture</a>
                        </li>
                        <li class=""><a href="#profile" data-toggle="tab">2. Choix du verre</a>
                        </li>
                        <li class=""><a href="#messages" data-toggle="tab">3. Mesures </a>
                        </li>
                        <li class=""><a href="#settings" data-toggle="tab">4. Compléments</a>
                        </li>
                        <li class="">
                          <input type="submit" class="btn btn-primary pull-right" name="save" value="Commander" style="border-radius: 0px" />
                        </li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane fade active in" id="home">

                        <div class="<?= empty(form_error('id_reason')) ? "" : "has-error" ?>">
                          <span class="help-block "><?= form_error('id_reason'); ?></span >
                        </div>

                        <p class="img-thumbnail" style="padding: 2%; text-align: justify;">
                          
                        Sur la base des spécificités techniques et recommandations que les industriels et fabricants lui communiquent, l’opticien-lunetier :<br>
                          • oriente le patient sur un choix de montures adaptées à sa morphologie, son amétropie, ses besoins visuels.
                          Une attention particulière est apportée à l’équipement des enfants et des presbytes.<br>
                          • L’ajustage de la monture doit toujours être réalisé avant de procéder à la prise de mesures.<br>
                        </p>
                        <?php foreach ($reasons->result_array() as $reason): ?>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 panel-group" id="accordion">
                          <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 4px">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?= $reason['id_reason']; ?>" class="collapsed">
                                  <img style="width: 100%; height: 125px" alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img_reason']; ?>">
                                </a>
                              </h4>
                            </div>
                            <div id="<?= $reason['id_reason']; ?>" class="panel-collapse collapse" style="height: 0px;">
                              <div class="panel-body" style="padding: 4px">
                                <p>Origine : <?= $reason['origine_reason']; ?> <br> Code : <?= $reason['code_reason']; ?>
                                  <b style="float: right;">Prix : <?= $reason['price_reason']; ?> FCFA</b>
                                </p>
                                <img style="width: 100%; height: 125px" alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img2_reason']; ?>">
                                <p><?= $reason['note_reason']; ?></p>
                                <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$reason['id_reason']) ?>" class="btn btn-info" style="border-radius: 0px; float: right; padding: 4px">
                                  <span class="fa fa-plus"></span> Détails
                                </a>
                              </div>
                            </div>
                          </div>
                          
                          <div class="panel-footer" style="padding: 20px;">
                            <label class="btn btn-default" style="width: 100%; border-radius: 0px; margin-top: -8%">
                              <input type="radio" name="id_reason" tabindex="3" style="float: left;" value="<?= ($reason['id_reason']); ?>" <?= ((!empty(set_value('id_reason')) and set_value('id_reason')==$reason['id_reason']) ? 'checked' : ''); ?>>
                              <i style="float: right;"><?= mb_strtoupper($reason['name_reason']); ?></i>
                            </label>
                          </div>
                        </div>

                        <?php endforeach; ?>                     
                      </div>
                      <div class="tab-pane fade" id="profile" style="width: 100%">
                        <h4>Liste des verres <i style="float: right;"> Faites un choix en cochant la case associée </i></h4>

                        <div class="<?= empty(form_error('id_reason2')) ? "" : "has-error" ?>">
                          <span class="help-block "><?= form_error('id_reason2'); ?></span >
                        </div>
                          <p class="img-thumbnail" style="padding: 2%; text-align: justify;">
                          Sur la base des spécificités techniques et recommandations que les industriels et fabricants lui communiquent, l’opticien-lunetier :
                          <br>• propose des verres répondant aux besoins et usages du patient ;
                          <br>• informe et sensibilise sur la préservation du capital visuel ;
                          <br>• précise clairement les caractéristiques de l’équipement proposé ;
                          <br>• propose une protection anti-UV sur verres blancs, solaires ou photochromiques et recommande une
protection contre la lumière bleue nocive ;
                          <br>• préconise pour les enfants des verres résistant aux chocs, une protection 100% anti-UV sur verres blancs
comme sur verres solaires ou photochromiques.
                        </p>
                              
                          <?php foreach ($reasons2->result_array() as $reason): ?>

                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading" style="padding: 4px">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#<?= $reason['id_reason']; ?>" class="collapsed">
                                    <img style="width: 100%; height: 125px" alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img_reason']; ?>">
                                  </a>
                                </h4>
                              </div>
                              <div id="<?= $reason['id_reason']; ?>" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body" style="padding: 4px">
                                  <p>Origine : <?= $reason['origine_reason']; ?> <br> Code : <?= $reason['code_reason']; ?>
                                    <b style="float: right;">Prix : <?= $reason['price_reason']; ?> FCFA</b>
                                  </p>
                                  <img style="width: 100%; height: 125px" alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img2_reason']; ?>">
                                  <p><?= $reason['note_reason']; ?></p>
                                <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$reason['id_reason']) ?>" class="btn btn-info" style="border-radius: 0px; float: right; padding: 4px">
                                  <span class="fa fa-plus"></span> Détails
                                </a>
                              </div>
                            </div>
                          </div>
                          
                          <div class="panel-footer" style="padding: 20px;">
                            <label class="btn btn-default" style="width: 100%; border-radius: 0px; margin-top: -8%">
                              <input type="radio" name="id_reason2" tabindex="3" style="float: left;" value="<?= ($reason['id_reason']); ?>" <?= ((!empty(set_value('id_reason2')) and set_value('id_reason2')==$reason['id_reason']) ? 'checked' : ''); ?>>
                              <i style="float: right;"><?= mb_strtoupper($reason['name_reason']); ?></i>
                            </label>
                          </div>
                        </div>

                        <?php endforeach; ?>
                      </div>
                      <div class="tab-pane fade" id="messages">
                        <h4> Prise de mesures <i style="float: right;"> Si vous détenez déjà ces informations, veuillez-nous les communiquer</i></h4>
                        <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                          <img style="width: 100%" src="<?= base_url('assets/img/mesure/presentation.png') ?>">
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                          <p class="img-thumbnail" style="padding: 2%; text-align: justify;">
                            L’opticien-lunetier réalise avec le matériel adapté au cahier des charges des industriels et fabricants et 
selon leurs recommandations de mise en œuvre, les mesures fiables et précises nécessaires au centrage, à
la personnalisation du montage et le cas échéant à la fabrication du verre.<br> Dans une logique d’assurance
qualité, les opticiens-lunetiers privilégient les outils de prise de mesures électroniques, connectés au logiciel
magasin, pour assurer une meilleure reproductibilité de la mesure et éliminer les risques d’erreur de saisie.
                          </p>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                          <?php foreach ($mesures->result_array() as $mesure): ?>
                          <div class=" col-lg-2 col-md-3 col-sm-4 col-xs-6" style="float: left; margin-top: -8px">
                            <p class="clearfix">
                              <label for="<?= $mesure['id_mes']; ?>" style="width: 100%; margin-left: -5.8%">
                                <img src="<?= base_url('assets/img/mesure/'.$mesure['img_mes']);?>" class="img-thumbnail" style="width: 100%; height: 100px">
                              </label>

                              <input class="form-control" type="number" min="<?= $mesure['min_mes']; ?>" max="<?= $mesure['max_mes']; ?>" name="<?= $mesure['id_mes']; ?>" id="<?= $mesure['id_mes']; ?>" placeholder="<?= $mesure['mane_mes']; ?>" style="width: 100%" value="<?= (!empty(set_value($mesure['id_mes'])) ? set_value($mesure['id_mes']) : ''); ?>">

                              <div class="<?= empty(form_error($mesure['id_mes'])) ? "" : "has-error" ?>">
                                <span class="help-block "><?= form_error($mesure['id_mes']); ?></span >
                              </div>
                            </p>  
                          </div>
                          <?php endforeach; ?>
                          <span style="float: right;">En millimètre</span>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="settings">

                        <h4> Vérification des informations préalablement renseignées et choix du point de reception</h4><br><br>

                        <div class="row">

                          <div  style="text-align: center; margin-top: -2%" class="">          

                            <div class="col-lg-3 col-md-3 col-sm-6">
                              <?= form_label('Image de profile &nbsp;', "", ['class' => "", 'style' => "width: 100%"]) ?>
                              <img class="img-thumbnail" src="<?= base_url('assets/img/').$this->session->userdata['auth_user']["profile_img"]?>" alt="img_user" style="width: 100%">
                              <?php $customer = $this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object();?>


                              <div class="row">
                                <div class="col-md-9">
                                  <?= form_label ("Profession ", "profession", ['class' => "", 'style' => "width:100%;"]) ?>
                                </div>
                                <div class="col-md-12">
                                  <input type="text" name="profession" id="profession" class="form-control" value="<?= (!empty(set_value('profession')) ? set_value('profession') : $customer->profession);?>" style="width:100%; padding: 8px; float: right;"><br>
                                  <div class="<?= empty(form_error('profession')) ? "" : "has-error" ?>">
                                      <br><span class="help-block"><?= form_error('profession'); ?></span >
                                  </div >
                                </div>

                              </div>
                            </div>
                            <div class="col-lg-5 col-md-7 col-sm-6">

                              <h5 style="float: right;">Informations utilisateur</h5><hr>
                              <div class="row">
                                <div class="col-md-4">
                                  <?= form_label ("Nom *", "fname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
                                </div>
                                <div class="col-md-8">
                                  <?= form_input(['name' => "fname_cost", 'id' => "fname_cost", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('fname_cost'))) ? set_value('fname_cost') : $customer->fname_cost); ?>
                                  
                                </div>
                                <div class="col-md-12 <?= empty(form_error('fname_cost')) ? "" : "has-error"?> ">
                                  <span class="help-block "><?= form_error('fname_cost'); ?></span >
                                </div >
                              </div>


                              <div class="row">
                                <div class="col-md-4">
                                  <?= form_label ("Prénom &nbsp;", "sname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
                                </div>
                                <div class="col-md-8">
                                  <?= form_input(['name' => "sname_cost", 'id' => "sname_cost", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('sname_cost')) ? set_value('sname_cost') : $customer->sname_cost)); ?>
                                </div>

                                <div class="col-md-12 <?= empty(form_error('sname_cost')) ? "" : "has-error" ?>">
                                  <span class="help-block "><?= form_error('sname_cost'); ?></span >
                                </div >
                              </div>

                              <div class="row">
                                <div class="col-md-4">
                                  <?= form_label ("Email *", "email", ['class' => "email", 'style' => "width:100%;", 'size' => "50"]) ?>
                                </div>
                                <div class="col-md-8">
                                  <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('email_cost')) ? set_value('email_cost') : $customer->email_cost)); ?>
                                </div>
                                  <div class="col-md-12 <?= empty(form_error('email')) ? "" : "has-error" ?>">
                                    <span class="help-block "><?= form_error('email'); ?></span >
                                  </div >
                              </div>

                              <div class="row">

                                <div class="col-md-4">

                                    <select name="country" id="country" style="padding: 6px;">
                                      <?php foreach ($countries->result_array() as $countrie): ?>
                                      
                                      <option value="<?= $countrie['id_country']?>" <?= (!empty(set_value('country')) and set_value('country') == $countrie['id_country']) ? ' selected="selected"' : (($customer->id_country == $countrie['id_country']) ? ' selected="selected"' : '') ; ?>>
                                        <?= $countrie['num_zone']?>
                                      </option>

                                      <?php endforeach; ?>
                                    </select>

                                  <div class="col-md-12 <?= empty(form_error('country')) ? "" : "has-error" ?>">
                                    <span class="help-block"><?= form_error('country'); ?></span >
                                  </div >

                                </div>

                                <div class="col-md-8">
                                  <?= form_input(['name' => "phone", 'id' => "phone", 'class' => '', 'style' => "width:100%; padding: 8px" ], (!empty(set_value('phone')) ? set_value('phone') : $customer->phone)); ?>
                                </div>
                                <div class="col-md-12 <?= empty(form_error('phone')) ? "" : "has-error" ?>">
                                  <span class="help-block"><?= form_error('phone'); ?></span >
                                </div >
                            </div>

                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6">
                            
                            <h5 style="float: left;">Informations sur la commande</h5><hr>
                            <div class="row">
                              <div class="" style="float: left;">
                                <div class="col-md-12">
                                  <?= form_label ("Magasin de réception *", "id_mag", ['class' => "", 'style' => "width:100%;"]) ?>
                                  <select name="id_mag" id="id_mag" style="padding: 6px;width:100%;">
                                    <option value="">
                                      ------------------------------------------------------------
                                    </option>

                                    <?php foreach ($storeshops->result_array() as $storeshop): ?>
                                      
                                    <option value="<?= $storeshop['id_mag']?>" <?= (!empty(set_value('id_mag')) and set_value('id_mag') == $storeshop['id_mag']) ? ' selected="selected"' : '' ; ?>>
                                      <?= $storeshop['description']; ?> -- <?=  $storeshop['phone_ss']; ?>
                                    </option>

                                    <?php endforeach; ?>
                                  </select>
                                </div>

                                <div class="col-md-12 <?= empty(form_error('id_mag')) ? "" : "has-error" ?>">
                                    <span class="help-block"><?= form_error('id_mag'); ?></span >
                                </div >
                              </div>
                            </div>
                            <div class="form-group"><hr>
                              <i style="float: right;"> Si vous détenez déjà une photo de la monture, veuillez-nous l'envoyer</i>
                              <?= form_label ("Fichier image associé à la commande ", "userimage", ['for' => "userimage", 'style' => "width:100%;"]) ?>
                              <input type="file" name="userimage" id="userimage" class='form-control'/>Non obligatoire si vous n'en avez pas.

                              <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                                <span class="help-block">

                                <?= form_error('userimage'); ?>
                                  <?php 
                                    if (!empty($error)){ 
                                      foreach ($error as $key) {
                                        '<i class="has-error help-block">'.print_r($key).'</i>';
                                      }
                                    } 
                                  ?>
                                  
                                </span >

                              </div>
                            </div>
                          </div>


                        </form>
                      </div>
                    </div>
                    </div>
                    </div>
                  </div>
                  <!-- /. ROW  -->
                </div>
                <!-- /. PAGE INNER  -->
              </div>
              <!-- /. PAGE WRAPPER  -->