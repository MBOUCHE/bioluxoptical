
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/customer')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
        <h3 >
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <br>
          <span style="float: left; color: red; font-size: 17px"><?= $this->session->flashdata('flsh_mess'); ?></span>
        </h3><hr>
<!-- FORM VALIDATION -->
        <div class="row mt container-fluid" style="margin-bottom: 101px">
          <div class="col-lg-12 content-panel">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?= base_url('admin/ControlPanel/updateCus'); ?>" enctype="multipart/form-data"/>
              <div class="col-lg-5 col-md-5">
                <input type="hidden" name="id_costomer" value="<?= $thisCus->id_costomer;?>">

                <div class="form-group ">
                  <label for="fname_cost" class="control-label col-lg-4">Utilisateur <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="text" name="fname_cost" id="fname_cost" class="form-control" value="<?= (is_null(set_value('fname_cost')) ? set_value('fname_cost') : $thisCus->fname_cost) ?>">
                    
                    <div class="<?= empty(form_error('fname_cost')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('fname_cost')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('fname_cost'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="sname_cost" class="control-label col-lg-4">Prénom <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="text" name="sname_cost" id="sname_cost" class="form-control" value="<?= (is_null(set_value('sname_cost')) ? set_value('sname_cost') : $thisCus->sname_cost);?>">
                    
                    <div class="<?= empty(form_error('sname_cost')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('sname_cost')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('sname_cost'); ?></span >
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="password" class="control-label col-lg-4">Mot de passe <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="password" name="password" id="password" class="form-control" value="<?= (is_null(set_value('password')) ? set_value('password') : "");?>">
                    
                    <div class="<?= empty(form_error('password')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('password')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('password'); ?></span >
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cpassword" class="control-label col-lg-4">Confirmation <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= (is_null(set_value('cpassword')) ? set_value('cpassword') : "");?>">
                    
                    <div class="<?= empty(form_error('cpassword')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('cpassword')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('cpassword'); ?></span >
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-2 col-md-2">

                <div class="form-group last">
                  <div class="col-md-12">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 135px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 135px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Photo de profile</span>
                        <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                        <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation externe du lieu" />
                        </span>
                      </div>

                      <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                        <br><span class="help-block "><?= form_error('userimage'); ?></span >
                      </div>

                    </div>
                    <label for="genre" class="control-label">Genre <span style="color: red">*</span> :</label>
                    

                    <select name="genre" id="genre" class="form-control">
                      
                      <option value="1" <?= ($thisCus->genre == 1) ? ' selected="selected"' : '' ; ?>>
                        MASCULIN
                      </option>

                      <option value="2" <?= ($thisCus->genre == 0) ? ' selected="selected"' : '' ; ?>>
                        FEMININ
                      </option>

                    </select>
                    
                    <div class="<?= empty(form_error('genre')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('genre')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('genre'); ?></span >
                    </div>
                    
                  </div>
                </div>
                
              </div>

              <div class="col-lg-5 col-md-5">

                <div class="form-group ">
                  <label for="email_cost" class="control-label col-lg-4">Email<span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="email" name="email_cost" id="email_cost" class="form-control" value="<?= (!empty(set_value('email_cost')) ? set_value('email_cost') : $thisCus->email_cost) ?>">
                    
                    <div class="<?= empty(form_error('email_cost')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('email_cost')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('email_cost'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="profession" class="control-label col-lg-4">Profession <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">
                    <input type="text" name="profession" id="profession" class="form-control" value="<?= (!empty(set_value('profession')) ? set_value('profession') : $thisCus->profession);?>">
                    
                    <div class="<?= empty(form_error('profession')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('profession')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('profession'); ?></span >
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="id_slice_age" class="control-label col-lg-4">Tranche d'âge <span style="color: red">*</span> :</label>
                  <div class="col-lg-8">

                    <select name="id_slice_age" id="id_slice_age" class="form-control">
                    
                      <?php foreach ($slices_ages->result_array() as $slices_age): ?>
                      <option value="<?= $slices_age['id_slice_age']; ?>" <?= ($thisCus->id_slice_age == $slices_age['id_slice_age']) ? ' selected="selected"' : '' ; ?>>
                        <?= $slices_age['label']; ?>
                      </option>
                      <?php endforeach ?>
                    </select>
                    
                    <div class="<?= empty(form_error('id_slice_age')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('id_slice_age')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('id_slice_age'); ?></span >
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="phone" class="control-label col-lg-4">Téléphone <span style="color: red">*</span> :</label>
                  <div class="col-lg-4">

                    <select name="country" id="country" class="form-control">
                    
                      <?php foreach ($countries->result_array() as $countrie): ?>
                      <option value="<?= $countrie['id_country']; ?>" <?= ($thisCus->id_country == $countrie['id_country']) ? ' selected="selected"' : '' ; ?>>
                        <?= $countrie['num_zone']; ?>
                      </option>
                      <?php endforeach ?>
                    </select>
                    
                    <div class="<?= empty(form_error('country')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('country')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('country'); ?></span >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <input type="phone" name="phone" id="phone" class="form-control" value="<?= (is_null(set_value('phone')) ? set_value('phone') : $thisCus->phone);?>">
                    
                    <div class="<?= empty(form_error('phone')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('phone')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('phone'); ?></span >
                    </div>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <div class="col-lg-12">

                <div class=" col-lg-6">
                  <A href="" class="btn btn-theme04 col-lg-3" type="button" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style="margin-left: -15%"></span> Réinitialiser</A> 
                </div>

                <div class=" col-lg-6">

                  <button class="btn btn-success" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
                </div>
              </div>
            </div>
                
            </div>

          </form>
        </div>
         
       </div>
    </section>

  </section>
</div>


