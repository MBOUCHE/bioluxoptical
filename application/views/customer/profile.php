
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/login/css/style.css" />
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style=" background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= $sub_title; ?>  <span style="float: right;"><?= $presentation; ?></span> </h4>
                        <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">1. Accueil</a>
                        </li>
                        <li class=""><a href="#profile" data-toggle="tab">2. Informations du compte</a>
                        </li>
                        <li class=""><a href="#messages" data-toggle="tab">3. Notidications</a>
                        </li>
                        <li class=""><a href="#settings" data-toggle="tab">4. Activités</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                          <h4>Home Tab</h4>
                          <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6">           
                              <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-red set-icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <div class="text-box" >
                                            <p class="main-text">120 New</p>
                                            <p class="text-muted">Messages</p>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">           
                              <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-green set-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                        <div class="text-box" >
                                            <p class="main-text">30 Tasks</p>
                                            <p class="text-muted">Remaining</p>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">           
                              <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-red set-icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <div class="text-box" >
                                            <p class="main-text">120 New</p>
                                            <p class="text-muted">Messages</p>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">           
                              <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-green set-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                        <div class="text-box" >
                                            <p class="main-text">30 Tasks</p>
                                            <p class="text-muted">Remaining</p>
                                        </div>
                                    </div>
                            </div>
                          </div>
         
                        </div>
                        <div class="tab-pane fade" id="profile">
                            
                          <div class="row">

                              <?php if(isset($_SESSION['flsh_mess'])): ?>
                            <div  style="text-align: center;">
                                <div class="has-error">
                                  <span class="help-block"><?= $_SESSION['flsh_mess'] ; ?></span >
                                </div >
                            </div>
                              <?php endif ; ?>
                              

                          <?php
                            echo form_open_multipart('customer/CustomerPanel/updateCus', array('name' => 'updateCus',
                          'class'=>'form-horizontal formulaire', 'style' => "width: 85%; background-color: black; text-align: left;"));
                          ?>
                            <div class="col-md-3">
                              <span class="fa fa-user-plus" style="font-size: 175px"></span>

                                <input type="hidden" name="id_costomer" value="<?= $this->session->userdata['auth_user']["id_user"] ?>">
                                <div class="row">
                                  <?= form_label('Image de profile &nbsp;:', "userimage", ['class' => "", 'style' => "width:100%;"]) ?>
                                  
                                    <input type="file" name="userimage" id="userimage" class="btn btn-primary form-control" title="Choisir une image de profile" style="width: 100%;">

                                    <img src="<?= base_url('assets/img/').$this->session->userdata['auth_user']["profile_img"]?>" class="user-image img-responsive img-thumbnail"/>

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
                              <div class="col-md-9">
                                <h5 style="float: right; color: white">Informations sur le compte</h5><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                      <?= form_label ("Nom d’utilisateur * :", "fname_cost", ['class' => "", 'style' => "width:107%;"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="fname_cost" id="fname_cost" class="form-control" value="<?= (is_null(set_value('fname_cost')) ? set_value('fname_cost') : $thisCus->fname_cost) ?>">              
                                    </div>


                                    <div class="col-md-12 <?= empty(form_error('fname_cost')) ? "" : "has-error" ?>">
                                        <?= empty(form_error('fname_cost')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('fname_cost'); ?></span >
                                    </div>
                                </div>
                                  
                                
                                <div class="row">
                                    <div class="col-md-6">
                                    <?= form_label('Mot de passe * :', "password", ['class' => "", 'style' => "width:100%"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="password" id="password" class="form-control" value="<?= (is_null(set_value('password')) ? set_value('password') : "");?>">
                                            
                                    </div>

                                    <div class="col-md-12 <?= empty(form_error('password')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('password')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('password'); ?></span >
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                    <?= form_label('Confirmation * :', "cpassword", ['class' => "", 'style' => "width:100%"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= (is_null(set_value('cpassword')) ? set_value('cpassword') : "");?>">
                                    
                                    </div>

                                    <div class="col-md-12 <?= empty(form_error('cpassword')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('cpassword')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('cpassword'); ?></span >
                                    </div>

                                </div>

                                <h5 style="float: right; color: white">Informations personnelles </h5><hr>



                                  <div class="row">
                                    <div class="col-md-6">
                                      <?= form_label ("Prénom &nbsp;:", "sname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="text" name="sname_cost" id="sname_cost" class="form-control" value="<?= (is_null(set_value('sname_cost')) ? set_value('sname_cost') : $thisCus->sname_cost);?>">
                                    </div>
                                            
                                    <div class="col-md-12 <?= empty(form_error('sname_cost')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('sname_cost')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('sname_cost'); ?></span >
                                    </div>
                                  </div>


                                  <div class="row">
                                    <div class="col-md-6">
                                      <?= form_label ("Email * :", "email", ['class' => "email", 'style' => "width:100%;", 'size' => "50"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email_cost" id="email_cost" class="form-control" value="<?= (!empty(set_value('email_cost')) ? set_value('email_cost') : $thisCus->email_cost) ?>">
                                            
                                    </div>
                                    <div class="col-md-12 <?= empty(form_error('email_cost')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('email_cost')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('email_cost'); ?></span >
                                    </div>
                                  </div>


                                  <div class="row">
                                    <div class="col-md-6">

                                    <?= form_label('Tranche d\'âge * :', "id_slice_age", ['class' => "", 'style' => "width:100%"]) ?>
                                    </div>
                                    <div class="col-md-6">

                                        <select name="id_slice_age" id="id_slice_age" class="form-control">
                                        
                                          <?php foreach ($slices_ages->result_array() as $slices_age): ?>
                                          <option value="<?= $slices_age['id_slice_age']; ?>" <?= ($thisCus->id_slice_age == $slices_age['id_slice_age']) ? ' selected="selected"' : '' ; ?>>
                                            <?= $slices_age['label']; ?>
                                          </option>
                                          <?php endforeach ?>
                                        </select>

                                    </div>
                                 
                                    <div class="col-md-12 <?= empty(form_error('id_slice_age')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('id_slice_age')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('id_slice_age'); ?></span >
                                    </div>

                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                    <?= form_label('Genre * :', "genre", ['class' => "", 'style' => "width:100%"]) ?>
                                    </div>
                                    <div class="col-md-6">

                                        <select name="genre" id="genre" class="form-control">
                                            <option value="1" <?= ($thisCus->genre == 1) ? ' selected="selected"' : '' ; ?>>
                                                MASCULIN
                                            </option>

                                            <option value="2" <?= ($thisCus->genre == 0) ? ' selected="selected"' : '' ; ?>>
                                                FEMININ
                                            </option>

                                        </select>
                                            
                                    </div>
                                    <div class="col-md-12 <?= empty(form_error('genre')) ? "" : "has-error" ?>">
                                      
                                      <?= empty(form_error('genre')) ? '' : '<br>' ?>
                                      <span class="help-block "><?= form_error('genre'); ?></span >
                                    </div>

                                  </div>

                                  <div class="row">

                                    <div class="col-md-6">
                                    <?= form_label('Téléphone * ', "phone", ['class' => "", 'style' => "float: left"]) ?>

                                        <select name="country" id="country" class="form-control" style="width:49%;">
                                            
                                        <?php foreach ($countries->result_array() as $countrie): ?>
                                            <option value="<?= $countrie['id_country']; ?>" <?= ($thisCus->id_country == $countrie['id_country']) ? ' selected="selected"' : '' ; ?>>
                                                <?= $countrie['num_zone']; ?>
                                            </option>
                                        <?php endforeach ?>
                                        </select>
                                        
                                        <div class="col-md-12 <?= empty(form_error('country')) ? "" : "has-error" ?>">
                                          
                                          <?= empty(form_error('country')) ? '' : '<br>' ?>
                                          <span class="help-block "><?= form_error('country'); ?></span >
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <input type="phone" name="phone" id="phone" class="form-control" value="<?= (is_null(set_value('phone')) ? set_value('phone') : $thisCus->phone);?>">
                                    </div>

                                    <div class="col-md-12 <?= empty(form_error('phone')) ? "" : "has-error" ?>">
                                        <?= empty(form_error('phone')) ? '' : '<br>' ?>
                                        <span class="help-block "><?= form_error('phone'); ?></span >
                                    </div>

                                  </div>



                                  <div class="row">
                                    <div class="col-md-6">
                                    <?= form_label('Profession &nbsp;:', "profession", ['class' => "", 'style' => "width:100%"]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="profession" id="profession" class="form-control" value="<?= (!empty(set_value('profession')) ? set_value('profession') : $thisCus->profession);?>">
                                            
                                        <div class="<?= empty(form_error('profession')) ? "" : "has-error" ?>">
                                          
                                          <?= empty(form_error('profession')) ? '' : '<br>' ?>
                                          <span class="help-block "><?= form_error('profession'); ?></span >
                                        </div>
                                    </div>

                                  </div>

                                    <hr>
                                <div class="row">

                                  <div class="col-md-6">
                                    <a href="<?= site_url('customer/CustomerPanel'); ?>" class="btn btn-warning pull-right"> Annuler</a>
                                  </div>

                                  <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary pull-right" name="save" value="Enregistrer" />
                                  </div>
                                </div>

                              </div>

                        <?php
                          echo form_close();
                        ?>

                          </div>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h4>Messages Tab</h4>
                            

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">120 New</p>
                                <p class="text-muted">Messages</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">30 Tasks</p>
                                <p class="text-muted">Remaining</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fa fa-bell-o"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">240 New</p>
                                <p class="text-muted">Notifications</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-brown set-icon">
                                <i class="fa fa-rocket"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">3 Orders</p>
                                <p class="text-muted">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">120 New</p>
                                <p class="text-muted">Messages</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">30 Tasks</p>
                                <p class="text-muted">Remaining</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fa fa-bell-o"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">240 New</p>
                                <p class="text-muted">Notifications</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-brown set-icon">
                                <i class="fa fa-rocket"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">3 Orders</p>
                                <p class="text-muted">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                        </div>
                        <div class="tab-pane fade" id="settings">

                                            <?php $get_all_activities = $this->db->where('id_user', $this->session->userdata['auth_user']['id_user'])->get('bo_sessions'); ?>

                        <form class="formulaire" style="width: 100%; background-color: white;" action="<?= site_url('customer/CustomerPanel/addmesure');?>" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Matériel / Adresse IP</th>
                                                    <th>Navigateur</th>
                                                    <th>Actions</th>
                                                    <th>Resultat</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <?php $get_all_activities = $this->db->where('id_user', $this->session->userdata['auth_user']['id_user'])->get('bo_sessions'); ?>
                                            
                                            <tbody>
                                            <?php foreach ($get_all_activities->result_array() as $get_all_activitie): ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $get_all_activitie['ip_address']; ?></td>
                                                    <td><?= $get_all_activitie['user_agent']; ?></td>
                                                    <td><?= $get_all_activitie['last_activity']; ?></td>
                                                    <td><?= $get_all_activitie['user_data']; ?></td>
                                                    <td><?= $get_all_activitie['date']; ?></td>
                                                </tr>
                                                
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--End Advanced Tables -->
                          </form>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
         