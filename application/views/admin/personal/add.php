
    <section id="main-content" style="margin-bottom: 4%">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/personal/list')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%"><span class="fa fa-reply" style=""></span> Abandonner</a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> : <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
      
       <!-- FORM VALIDATION -->
        <div class="row mt container-fluid">
          <div class="col-lg-12 content-panel">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                  action="<?= base_url('admin/ControlPanel/addThisPersonal'); ?>" enctype="multipart/form-data"/>
              <div class="col-lg-3 col-md-3">

                
                <div class="form-group ">
                  <label for="genre" class="control-label col-lg-4">Genre <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="genre" id="genre" class="form-control">
                      
                      <option value="">
                        ----------------
                      </option>
                      <option value="1" <?= (!empty(set_value('genre')) and set_value('genre') == '1') ? ' selected="selected"' : '' ; ?>>
                        MASCULIN
                      </option>

                      <option value="2" <?= (!empty(set_value('genre')) and set_value('genre') == '0') ? ' selected="selected"' : '' ; ?>>
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
                      <?= form_input(['name' => "first_name", 'id' => "first_name", 'class' => 'form-control'], set_value('first_name')) ?>
                    <div class="<?= empty(form_error('first_name')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('first_name'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="second_name" class="control-label col-lg-4">Prénom : </label>
                  <div class="col-lg-8">
                      <?= form_input(['name' => "second_name", 'id' => "second_name", 'class' => 'form-control'], set_value('second_name')) ?>
                    <div class="<?= empty(form_error('second_name')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('second_name'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="age" class="control-label col-lg-4">Age <i style="color: red">*</i> : </label>
                  <div class="col-lg-8">
                      <?= form_input(['name' => "age", 'id' => "age", 'class' => 'form-control', 'type' => "number", 'step' => "1", 'min' => '17'], set_value('age')); ?>

                    <div class="<?= empty(form_error('age')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('age'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="phone" class="control-label col-lg-4">Téléphone <i style="color: red">*</i> :</label>

                  <div class="col-lg-8">
                      <?= form_input(['name' => "phone", 'id' => "phone", 'class' => 'form-control'], set_value('phone')) ?>
                    
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
                      <?= form_input(['name' => "reg_number", 'id' => "reg_number", 'class' => 'form-control'], set_value('reg_number')) ?>
                    
                    <div class="<?= empty(form_error('reg_number')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('reg_number'); ?></span >
                    </div>
                  </div>

                </div>
                <div class="form-group ">
                  

                  <label for="id_mag" class="control-label col-lg-4">Magasin <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="id_mag" id="id_mag" class="form-control">
                      <option value="">
                        -------------
                      </option>

                      <?php foreach ($storeshops->result_array() as $storeshop): ?>
                      <option value="<?= $storeshop['id_mag']; ?>" <?= (!empty(set_value('id_mag')) and set_value('id_mag') == $storeshop['id_mag']) ? ' selected="selected"' : '' ; ?>>
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
                        <option value="0">
                          -----
                        </option>
                        <?php
                          $i = 1;
                          while ($i <= 17) {
                            echo '<option value="'.$i.'" '.((!empty(set_value('years_exp')) and 
                                                              set_value('years_exp') == $i) ? ' selected="selected"' : "").'>
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
                    <?= form_input(['name' => "email", 'id' => "email", 'class' => 'form-control', 'type' => 'email'], set_value('email')) ?>
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
                      <?= form_input(['name' => "working_time11", 'id' => "working_time11", 'class' => 'form-control', 'type' => 'number', 'min' => '8', 'max' => '13', "step" => 1], set_value('working_time11')) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time12", 'id' => "working_time12", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], set_value('working_time12')) ?>

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
                      <?= form_input(['name' => "working_time21", 'id' => "working_time21", 'class' => 'form-control', 'type' => 'number', 'min' => '12', 'max' => '13', "step" => 1], set_value('working_time21')) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time22", 'id' => "working_time22", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], set_value('working_time22')) ?>

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
                      <?= form_input(['name' => "working_time31", 'id' => "working_time31", 'class' => 'form-control', 'type' => 'number', 'min' => '13', 'max' => '14', "step" => 1], set_value('working_time31')) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time32", 'id' => "working_time32", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], set_value('working_time32')) ?>

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
                      <?= form_input(['name' => "working_time41", 'id' => "working_time41", 'class' => 'form-control', 'type' => 'number', 'min' => '16', 'max' => '17', "step" => 1], set_value('working_time41')) ?>
                    </div>
                    <div class="col-lg-1 col-md-1">H:</div>
                    <div class="col-lg-3 col-md-3">
                      <?= form_input(['name' => "working_time42", 'id' => "working_time42", 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'max' => '30', "step" => 5], set_value('working_time42')) ?>

                    </div>
                    <div class="col-lg-1 col-md-1">:mn</div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="diploma" class="control-label col-lg-3">Diplôme:</label>
                  <div class="col-lg-9">
                      <?= form_input(['name' => "diploma", 'id' => "diploma", 'class' => 'form-control'], set_value('diploma')) ?>
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
                      <option value="">
                        -------------
                      </option>

                      <?php foreach ($roles->result_array() as $role): ?>
                      <option value="<?= $role['id_role']; ?>" <?= (!empty(set_value('id_role')) and set_value('id_role') == $role['id_role']) ? ' selected="selected"' : '' ; ?>>
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
                      <?= form_input(['name' => "function", 'id' => "function", 'class' => 'form-control'], set_value('function')) ?>
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
    </section>
  </section>
