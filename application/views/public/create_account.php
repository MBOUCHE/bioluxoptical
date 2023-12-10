
    <div class="row">
      <div  style="text-align: center;">
        <h2>
          <label style="padding: 2%; font-family: 'Gabriola'; font-size: 32px; float: center;">
            <?= $sub_title?>
          </label>
        </h2>


        <?php if(isset($_SESSION['flsh_mess'])): ?>
          <div class="has-error">
            <span class="help-block"><?= $_SESSION['flsh_mess'] ; ?></span >
          </div >
        <?php endif ; ?>
        
      </div>

    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8">
    <?php
      echo form_open_multipart('Bioluxoptical/createAccount', array('name' => 'createAccount',
    'class'=>'form-horizontal formulaire', 'style' => "width: 89%; text-align: left;"));
    ?>
      <div class="col-md-4">
        <span class="fa fa-user-plus" style="font-size: 200px"></span>


          <div class="row">
            <div class="col-md-12">
            <?= form_label('Image de profile &nbsp;:', "userimage", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-12">
              <input type="file" name="userimage" id="userimage" class="btn btn-primary form-control" title="Choisir une image de profile" style="width: 100%">
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



        <!-- 
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 175px; height: 134px;">
              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
              <span class="btn btn-theme02 btn-file">
                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Selectionnez une image</span>
              <input type="file" id="profile" name="userimage" class="default" />
              </span>
            </div>
          </div>
        -->



      </div>
      <div class="col-md-8">
        <h5 style="float: right; color: white">Informations sur le compte</h5><hr>
          <div class="row">
            <div class="col-md-6">
              <?= form_label ("Nom d’utilisateur * :", "fname_cost", ['class' => "", 'style' => "width:107%;"]) ?>
            </div>
            <div class="col-md-6">
              <?= form_input(['name' => "fname_cost", 'id' => "fname_cost", 'class' => '', 'style' => "width:100%;"], set_value('fname_cost')) ?><br>
              
            </div>
            <div class="col-md-12 <?= empty(form_error('fname_cost')) ? "" : "has-error"?> ">
              <span class="help-block "><?= form_error('fname_cost'); ?></span >
            </div >
          </div>
          
        
          <div class="row">
            <div class="col-md-6">
            <?= form_label('Mot de passe * :', "password", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-6">
              <?= form_password(['name' => "password", 'id' => "password", 'class' => '', 'style' => "width:100%;"], set_value ('password')) ?>
            </div>

            <div class="col-md-12 <?= empty(form_error('password')) ? "" : "has-error" ?>">
              <span class="help-block"><?= form_error('password'); ?></span >
            </div >
          </div>

          <div class="row">
            <div class="col-md-6">
            <?= form_label('Confirmation * :', "cpassword", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-6">
              <?= form_password(['name' => "cpassword", 'id' => "cpassword", 'class' => '', 'style' => "width:100%;"], set_value ('cpassword')) ?>
            </div>

            <div class="col-md-12 <?= empty(form_error('cpassword')) ? "" : "has-error" ?>">
              <span class="help-block"><?= form_error('cpassword'); ?></span >
            </div >

          </div>

           <h5 style="float: right; color: white">Informations personnelles </h5><hr>



          <div class="row">
            <div class="col-md-6">
              <?= form_label ("Prénom &nbsp;:", "sname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
            </div>
            <div class="col-md-6">
              <?= form_input(['name' => "sname_cost", 'id' => "sname_cost", 'class' => '', 'style' => "width:100%;"], set_value('sname_cost')) ?>
            </div>

            <div class="col-md-12 <?= empty(form_error('sname_cost')) ? "" : "has-error" ?>">
              <span class="help-block "><?= form_error('sname_cost'); ?></span >
            </div >
          </div>




          <div class="row">
            <div class="col-md-6">
              <?= form_label ("Email * :", "email", ['class' => "email", 'style' => "width:100%;", 'size' => "50"]) ?>
            </div>
            <div class="col-md-6">
              <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%;"], set_value('email')) ?>
            </div>
              <div class="col-md-12 <?= empty(form_error('email')) ? "" : "has-error" ?>">
                <span class="help-block "><?= form_error('email'); ?></span >
              </div >
          </div>


          <div class="row">
            <div class="col-md-6">

            <?= form_label('Tranche d\'âge * :', "id_slice_age", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-6">



              <select name="id_slice_age" id="id_slice_age" style="width:100%; padding: 7px; float: right;">
                <option value="">
                  ------------------
                </option>
                
                <?php foreach ($slices_ages->result_array() as $slices_age): ?>
                  
                <option value="<?= $slices_age['id_slice_age']?>" <?= (!empty(set_value('id_slice_age')) and set_value('id_slice_age') == $slices_age['id_slice_age']) ? ' selected="selected"' : '' ; ?>>
                  <?= $slices_age['label']?> - <?= $slices_age['content']?>
                </option>

                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-12 <?= empty(form_error('id_slice_age')) ? "" : "has-error" ?>">
              <span class="help-block"><?= form_error('id_slice_age'); ?></span >
            </div >

          </div>

          <div class="row">
            <div class="col-md-6">
            <?= form_label('Genre * :', "genre", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-6">

              <select name="genre" id="genre" style="width:100%; padding: 7px; float: right;">
                <option value="">
                  ------------------
                </option>
                
                <option value="1" <?= (!empty(set_value('genre')) and set_value('genre') == 1) ? ' selected="selected"' : '' ; ?>>
                  H O M M E 
                </option>

                <option value="2" <?= (!empty(set_value('genre')) and set_value('genre') == 2) ? ' selected="selected"' : '' ; ?>>
                  F E M M E 
                </option>

              </select>
            </div>
            <div class="col-md-12 <?= empty(form_error('genre')) ? "" : "has-error" ?>">
              <br><span class="help-block"><?= form_error('genre'); ?></span >
            </div >

          </div>

          <div class="row">

            <div class="col-md-6" style=" padding: 4px;">
            <?= form_label('Téléphone * ', "phone", ['class' => "", 'style' => "float: left"]) ?>

                <select name="country" id="country" style="width:49%; padding: 7px;">
                  <option value="">
                    ---------
                  </option>
                  <?php foreach ($countries->result_array() as $countrie): ?>
                  
                  <option value="<?= $countrie['id_country']?>" <?= (!empty(set_value('country')) and set_value('country') == $countrie['id_country']) ? ' selected="selected"' : '' ; ?>>
                    <?= $countrie['num_zone']?>
                  </option>

                  <?php endforeach; ?>
                </select>

              <div class="col-md-12 <?= empty(form_error('country')) ? "" : "has-error" ?>">
                <span class="help-block"><?= form_error('country'); ?></span >
              </div >

            </div>

            <div class="col-md-6">
              <?= form_input(['name' => "phone", 'id' => "phone", 'class' => '', 'style' => "width:100%; padding: 8px" ], set_value ('phone')) ?>
            </div>
            <div class="col-md-12 <?= empty(form_error('phone')) ? "" : "has-error" ?>">
              <span class="help-block"><?= form_error('phone'); ?></span >
            </div >

          </div>



          <div class="row">
            <div class="col-md-6">
            <?= form_label('Profession &nbsp;:', "profession", ['class' => "", 'style' => "width:100%"]) ?>
            </div>
            <div class="col-md-6">

              <input type="text" name="profession" id="profession" class="form-control" value="<?= (!empty(set_value('profession')) ? set_value('profession') : '');?>" style="width:100%; padding: 8px; float: right;">
              <br>
              <div class="<?= empty(form_error('profession')) ? "" : "has-error" ?>">
                <br><span class="help-block"><?= form_error('profession'); ?></span >
              </div >
                    
            </div>

          </div>

            <hr>
        <div class="row">
          <div class="col-md-6">
            <input type="submit" class="btn btn-primary pull-right" name="save" value="Enregistrer" />
            
          </div>
        </div>

      </div>
    </div>

<?php
  echo form_close();
?>

  </div>
