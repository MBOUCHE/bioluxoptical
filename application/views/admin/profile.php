<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt container-fluid">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">

                <?php
               // à transférer les modifications header = profile
              $nb_new_testimonials = $this->db->select('id_issue, date_issue, issuer_id, content')
                                              ->where('state_msg', -1)
                                              ->where('subject', 'TEMOIGNAGE')
                                              ->join('communicate', 'communicate.id_com=issue.id_com')
                                              ->get('issue')
                                              ->result_array();

              $nb_new_orders = $this->db->select('id_ord')
                                              ->where('state_paid', -1)

        ->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
        ->join('customer', 'customer.id_costomer = order_cart.id_costomer')
        ->join('provider', 'provider.id_prov = order_cart.id_op')
                                              ->get('order_cart')
                                              ->result_array();

              $nb_new_customers = $this->db->select('id_costomer')
                                              ->where('state', -1)
                                              ->join('customer_role', 'customer_role.id_user=customer.id_costomer')
                                              ->get('customer')
                                              ->result_array();
            ?>

                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?= sizeof($nb_new_testimonials); ?></h4>
                  <h6><?= mb_strtoupper('témoignages') ?></h6>
                  <h4><?= sizeof($nb_new_orders); ?></h4>
                  <h6><?= mb_strtoupper('commandes') ?></h6>
                  <h4><?= sizeof($nb_new_customers); ?></h4>
                  <h6><?= mb_strtoupper('nouveaux abonnés') ?></h6>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?= $this->session->userdata['auth_user']['username'];?></h3>
                <h6><?= $this->session->userdata['auth_user']['function'];?></h6>
                <p><?= $this->db->select('description')->where('id_mag', $this->session->userdata['auth_user']['id_mag'])->get('storeshop')->row_object()->description;?></p>
                <p><?= $this->session->userdata['auth_user']['function'];?></h6>
                <p><?= $this->db->select('name_role')->where('id_role', $this->session->userdata['auth_user']['id_role'])->get('role')->row_object()->name_role;?></p>
                <br>
                <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?= base_url('assets/img/'.$this->session->userdata['auth_user']['profile_img']);?>" class="img-circle"></p>
                  <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                    <button class="btn btn-theme02">Add</button>
                  </p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Overview</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Toutes vos Activités</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Edition du Profile</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">
                        <textarea rows="3" class="form-control" placeholder="Quel est votre message ?"></textarea>
                        <div class="grey-style">
                          <div class="pull-left">
                            <button class="btn btn-sm btn-theme"><i class="fa fa-camera"></i></button>
                            <button class="btn btn-sm btn-theme"><i class="fa fa-map-marker"></i></button>
                          </div>
                          <div class="pull-right">
                            <button class="btn btn-sm btn-theme03">Notifier</button>
                          </div>
                        </div>
                        <div class="detailed mt">
                          <h4>Activités récentes</h4>
                          <div class="recent-activity">
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>1 HOUR AGO</h5>
                              <p>Purchased: Dashio Admin Panel & Front-end theme.</p>
                            </div>
                            <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                            <div class="activity-panel">
                              <h5>5 HOURS AGO</h5>
                              <p>Task Completed. Resolved issue with Disk Space.</p>
                            </div>
                            <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                            <div class="activity-panel">
                              <h5>3 DAYS AGO</h5>
                              <p>Launched a new product: Flat Pack Heritage.</p>
                            </div>
                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Stats</h4>
                        <div class="row centered mt mb">
                          <div class="col-sm-4">
                            <h1><i class="fa fa-comments-o"></i></h1>
                            <h3><?= $nb_subjects; ?></h3>
                            <h6>Subjets non résolus</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-eye"></i></h1>
                            <h3><?= number_format($average_visit); ?></h3>
                            <h6>Moyenne de visiteurs du site par jour</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-users"></i></h1>
                            <h3><?= $nbr_client; ?></h3>
                            <h6>Nombre de clients à comptes validés</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-user-secret"></i></h1>
                            <h3><?= $nb_personals; ?></h3>
                            <h6>Nombre de clients à comptes validés</h6>
                          </div>
                        </div>
                        <!-- /row -->
                        <h4>Communications</h4>
                        <div class="row centered mb">
                          <ul class="my-friends">

                            <?php foreach ($his_forums->result_array() as $his_forum): ?>

                            <li>
                              <div class="friends-pic">
                                <a href="<?= site_url('admin/C_Forum/updateThiscom/'.$his_forum['id_com']) ?>">
                                  <img class="img-circle img-thumbnail" width="85" height="85" src="<?= base_url('assets/img/communication/'.$his_forum['img_com']) ; ?>">
                                </a>
                              </div>
                            </li>

                            <?php endforeach; ?>
                            
                          </ul>
                          <div class="row mt">
                            <div class="col-md-4 col-md-offset-4">
                              <h6><a class="btn btn-theme02" href="<?= site_url('admin/C_Forum') ?>"><?= mb_strtoupper('Tout affiché') ?></a></h6>
                            </div>
                          </div>
                        </div>
                        <!-- /row -->
                        <h4>Pending Tasks</h4>
                        <div class="row centered">
                          <div class="col-md-8 col-md-offset-2">
                            <h5>Dashboard Update (40%)</h5>
                            <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                              </div>
                            </div>
                            <h5>Unanswered Messages (80%)</h5>
                            <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">80% Complete (success)</span>
                              </div>
                            </div>
                            <h5>Product Review (60%)</h5>
                            <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (success)</span>
                              </div>
                            </div>
                            <h5>Friend Requests (90%)</h5>
                            <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                <span class="sr-only">90% Complete (success)</span>
                              </div>
                            </div>
                          </div>
                          <!-- /col-md-8 -->
                        </div>
                        <!-- /row -->
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-6">

                        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <?php $get_all_activities = $this->db->where('id_user', $this->session->userdata['auth_user']['id_user'])->get('bo_sessions'); ?>
                <thead>
                  <tr>
                    <th>Matériel / Adresse IP</th>
                    <th>Navigateur</th>
                    <th>Actions</th>
                    <th>Resultat</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($get_all_activities->result_array() as $get_all_activitie): ?>
                    <tr class="gradeA">
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
          <!-- page end-->
        </div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Location</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                            Postal Address<br/> PO BOX 12988, Sutter Ave<br/> Brownsville, New York.
                          </p>
                          <br>
                          <p>
                            Headquarters<br/> 844 Sutter Ave,<br/> 9003, New York.
                          </p>
                        </div>
                        <h4>Contacts</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                            Phone: +33 4898-4303<br/> Cell: 48 4389-4393<br/>
                          </p>
                          <br>
                          <p>
                            Email: hello@dashiotheme.com<br/> Skype: UseDashio<br/> Website: http://Alvarez.is
                          </p>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row detailed">
                        <h4 class="mb">Informations </h4>
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                  action="<?= base_url('admin/ControlPanel/updateHispersonal/'); ?>" enctype="multipart/form-data"/>
              <div class="col-lg-3 col-md-3">
                <input type="hidden" name="id_user" value="<?= $user->id_user;?>">
                <div class="form-group ">
                  <label for="genre" class="control-label col-lg-4">Genre <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="genre" id="genre" class="form-control">
                      
                      <option value="1" <?= ($user->genre == 1) ? ' selected="selected"' : '' ; ?>>
                        MASCULIN
                      </option>

                      <option value="2" <?= ($user->genre == 0) ? ' selected="selected"' : '' ; ?>>
                        FEMININ
                      </option>

                    </select>
                    
                    <div class="<?= empty(form_error('genre')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('genre'); ?></span >
                    </div>
                  </div>

                </div>

                <div class="form-group ">
                  <label for="first_name" class="control-label col-lg-4">Nom <i style="color: red">*</i> : </label>
                  <div class="col-lg-8">
                      <?= form_input(['name' => "first_name", 'id' => "first_name", 'class' => 'form-control'], (!empty(set_value('first_name')) ? set_value('first_name') : $user->first_name)); ?>

                    <div class="<?= empty(form_error('first_name')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('first_name'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="second_name" class="control-label col-lg-4">Prénom : </label>
                  <div class="col-lg-8">
                      <?= form_input(['name' => "second_name", 'id' => "second_name", 'class' => 'form-control'], (!empty(set_value('second_name')) ? set_value('second_name') : $user->second_name)); ?>
                    <div class="<?= empty(form_error('second_name')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('second_name'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="age" class="control-label col-lg-4">Age <i style="color: red">*</i> : </label>
                  <div class="col-lg-6">
                      <?= form_input(['name' => "age", 'id' => "age", 'class' => 'form-control', 'type' => "number", 'step' => "1", 'min' => '17'], (!empty(set_value('age')) ? set_value('age') : $user->age)); ?>

                    <div class="<?= empty(form_error('age')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('age'); ?></span >
                    </div>
                  </div>
                  <div class="col-lg-2">
                    ans
                  </div>
                </div>

                <div class="form-group ">
                  <label for="phone" class="control-label col-lg-4">Téléphone <i style="color: red">*</i> :</label>

                  <div class="col-lg-8">
                      <?= form_input(['name' => "phone", 'id' => "phone", 'class' => 'form-control'],  (!empty(set_value('phone')) ? set_value('phone') : $user->phone)); ?>
                    
                    <div class="<?= empty(form_error('phone')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('phone'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="password" class="control-label col-lg-5">Mot de pasee<i style="color: red">*</i>:</label>
                  <div class="col-lg-7">
                    <?= form_input(['name' => "password", 'id' => "password", 'class' => 'form-control', 'type' => 'password'], set_value('password')) ?>
                    <div class="<?= empty(form_error('password')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('password'); ?></span >
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group ">
                  <label for="reg_number" class="control-label col-lg-4">Matricule <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                      <?= form_input(['name' => "reg_number", 'id' => "reg_number", 'class' => 'form-control'], (!empty(set_value('age')) ? set_value('age') : $user->reg_number)) ?>
                    
                    <div class="<?= empty(form_error('reg_number')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('reg_number'); ?></span >
                    </div>
                  </div>

                </div>
                <div class="form-group ">
                  

                  <label for="id_mag" class="control-label col-lg-4">Magasin <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="id_mag" id="id_mag" class="form-control" value="<?= (!empty(set_value('id_mag')) ? set_value('id_mag') : $user->id_mag) ;?>">
                      
                      
                      <?php foreach ($storeshops->result_array() as $storeshop): ?>
                        <option value="<?= $storeshop['id_mag']; ?>" <?= ($user->id_mag == $storeshop['id_mag']) ? ' selected="selected"' : '' ; ?>>
                          <?= $storeshop['description']; ?>
                        </option>
                      <?php endforeach ?>
                    </select>

                    
                    <div class="<?= empty(form_error('id_mag')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('id_mag'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-7">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 100%; height: 145px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 145px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Image de profile</span>
                        <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                        <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de profile pour cet utilisateur" />
                        </span>
                      </div>

                      <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('userimage'); ?></span >
                      </div>

                    </div>
                    
                  </div>
                  <div class="col-lg-4 col-md-5">
                    
                    <label for="years_exp" class="control-label">Année Exp<i style="color: red"> *</i></label>
                    <div class="<?= empty(form_error('years_exp')) ? "" : "has-error" ?>">
                        
                      <span class="help-block "><?= form_error('years_exp'); ?></span >
                    </div>
                    <div class="">
                      <select name="years_exp" id="years_exp" class="form-control col-lg-6 col-md-6">
                        


                        <?php
                          $i = 1;
                          while ($i <= 17) {
                            echo '<option value="'.$i.'" '.(($user->years_exp == $i) ? ' selected="selected"' : "").'>
                                    '.$i.'
                                  </option>';
                            $i++;
                          }
                        ?>
                      </select> 
                    </div>
                  </div>

                </div>


                <div class="form-group last">
                  <label for="cpassword" class="control-label col-lg-5">Confirmation <i style="color: red">*</i>:</label>
                  <div class="col-lg-7">
                    <?= form_input(['name' => "cpassword", 'id' => "cpassword", 'class' => 'form-control', 'type' => 'password'], set_value('cpassword')) ?>
                    <div class="<?= empty(form_error('cpassword')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('cpassword'); ?></span >
                    </div>
                  </div>
                </div>
                  
              </div>
              <div class="col-lg-5 col-md-5">
                
                <div class="form-group">
                  <label for="email" class="control-label col-lg-3">Email: <i style="color: red">*</i>:</label>
                  <div class="col-lg-9">
                    <?= form_input(['name' => "email", 'id' => "email", 'class' => 'form-control', 'type' => 'email'], (!empty(set_value('email')) ? set_value('email') : $user->email))?>
                    <div class="<?= empty(form_error('email')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('email'); ?></span >
                    </div>
                  </div>
                </div>
                
                <div class="form-group ">
                  <div class=" col-lg-12">
                    <div class=" col-lg-3">
                      
                      <label for="working_time11" class="control-label">
                        AM1<i style="color: red">*</i> :
                      </label>
                    </div>
                    <div class="<?= empty(form_error('working_time11')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time11'); ?></span >
                    </div>
                    <div class="<?= empty(form_error('working_time12')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time12'); ?></span >
                    </div>
                    <div class="col-lg-3 col-md-3">

                      <?php 

                        if (substr($user->working_time1, 1, 1) =='h') {
                          $working_time11 = substr($user->working_time1, 0, 1);
                          $working_time12 = substr($user->working_time1, 2, 2);

                          $working_time21 = substr($user->working_time1, 7, 2);
                          //var_dump($working_time21); die;
                          $working_time22 = substr($user->working_time1, 10, 2);

                        }
                        else{
                          $working_time11 = substr($user->working_time1, 0, 2);
                          $working_time12 = substr($user->working_time1, 3, 2);

                          $working_time21 = substr($user->working_time1, 8, 2);
                          $working_time22 = substr($user->working_time1, 11, 2);
                        }
                      ?>

                      <?= form_input(['name' => "working_time11", 'id' => "working_time11", 'class' => 'form-control', 'type' => 'number', 'min' => '8', 'max' => '13', "step" => 1],  (!empty(set_value('working_time11')) ? set_value('working_time11') : $working_time11)) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time12", 'id' => "working_time12", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], (!empty(set_value('working_time12')) ? set_value('working_time12') : $working_time12)) ?>

                    </div>
                    <div class="col-lg-1 col-md-1">:mn</div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class=" col-lg-12">
                    <div class=" col-lg-3">
                      
                      <label for="working_time11" class="control-label">
                        AM2<i style="color: red">*</i> :
                      </label>
                    </div>
                    <div class="<?= empty(form_error('working_time21')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time21'); ?></span >
                    </div>
                    <div class="<?= empty(form_error('working_time22')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time22'); ?></span >
                    </div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time21", 'id' => "working_time21", 'class' => 'form-control', 'type' => 'number', 'min' => '12', 'max' => '13', "step" => 1], (!empty(set_value('working_time21')) ? set_value('working_time21') : $working_time21)) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time22", 'id' => "working_time22", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], (!empty(set_value('working_time22')) ? set_value('working_time22') : $working_time22)) ?>

                    </div>
                    <div class="col-lg-1 col-md-1">:mn</div>
                  </div>
                </div>

                <div class="form-group ">
                  <div class=" col-lg-12">
                    <div class=" col-lg-3">
                      
                      <label for="working_time31" class="control-label">
                        PM1<i style="color: red">*</i> :
                      </label>
                    </div>
                    <div class="<?= empty(form_error('working_time31')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time31'); ?></span >
                    </div>
                    <div class="<?= empty(form_error('working_time32')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time32'); ?></span >
                    </div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time31", 'id' => "working_time31", 'class' => 'form-control', 'type' => 'number', 'min' => '13', 'max' => '14', "step" => 1], (!empty(set_value('working_time31')) ? set_value('working_time31') : substr($user->working_time2, 0, 2))) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time32", 'id' => "working_time32", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], (!empty(set_value('working_time32')) ? set_value('working_time32') : substr($user->working_time2, 3, 2))) ?>

                    </div>
                    <div class="col-lg-1 col-md-1">:mn</div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class=" col-lg-12">
                    <div class=" col-lg-3">
                      
                      <label for="working_time41" class="control-label">
                        PM2<i style="color: red">*</i> :
                      </label>
                    </div>
                    <div class="<?= empty(form_error('working_time41')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time41'); ?></span >
                    </div>
                    <div class="<?= empty(form_error('working_time42')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('working_time42'); ?></span >
                    </div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time41", 'id' => "working_time41", 'class' => 'form-control', 'type' => 'number', 'min' => '16', 'max' => '17', "step" => 1], (!empty(set_value('working_time41')) ? set_value('working_time41') : substr($user->working_time2, 8, 2))) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time42", 'id' => "working_time42", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], (!empty(set_value('working_time42')) ? set_value('working_time42') : substr($user->working_time2, 11, 2))) ?>

                    </div>
                    <div class="col-lg-1 col-md-1">:mn</div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="diploma" class="control-label col-lg-3">Diplôme:</label>
                  <div class="col-lg-9">
                      <?= form_input(['name' => "diploma", 'id' => "diploma", 'class' => 'form-control'], (!empty(set_value('diploma')) ? set_value('diploma') : $user->diploma)) ?>
                    <div class="<?= empty(form_error('diploma')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('diploma'); ?></span >
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="form-group col-lg-12">

                <div class=" col-lg-2 col-md-2" style="float: left;">
                  <label for="id_role" class="control-label">Droit / Rôle<i style="color: red"> *</i> :</label>
                  <div class="<?= empty(form_error('role')) ? "" : "has-error" ?>">
                      
                    <span class="help-block "><?= form_error('role'); ?></span >
                  </div>
                </div>
                <div class=" col-lg-3 col-md-3">
                  <select name="id_role" id="id_role" class="form-control">

                      <?php foreach ($roles->result_array() as $role): ?>
                      <option value="<?= $role['id_role']; ?>" <?= ($user->id_role == $role['id_role']) ? ' selected="selected"' : '' ; ?>>
                        <?= $role['name_role']; ?>
                      </option>
                      <?php endforeach ?>
                    </select>
                    
                    <div class="<?= empty(form_error('id_role')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('id_role'); ?></span >
                    </div> 
                </div>

                <div class=" col-lg-2 col-md-2" style="float: ;">
                  <label for="function" class="control-label">Fonction<i style="color: red"> *</i> :</label>
                </div>
          

                <div class="form-group ">
                  <div class="col-lg-5">
                      <?= form_input(['name' => "function", 'id' => "function", 'class' => 'form-control'],  (!empty(set_value('function')) ? set_value('function') : $user->function)) ?>
                    <div class="<?= empty(form_error('function')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('function'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="col-lg-12" style="float: right;">
                  <div class="col-lg-6">
                    <A href="" class="btn btn-theme04 col-lg-6" type="button" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser
                    </A>
                  </div>
                  <div class="col-lg-6">
                    <button class="btn btn-success col-lg-6" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer
                    </button>
                  </div>
                </div>
              </div> 

          </form>
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  <script type="text/javascript" language="javascript" src="<?= base_url('assets/admin/');?>lib/advanced-datatable/js/jquery.js"></script>