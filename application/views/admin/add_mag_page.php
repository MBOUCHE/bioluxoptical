
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
      
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/storesShop')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%"><span class="fa fa-reply" style=""></span> Abandonner</a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> : <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
      
       <!-- FORM VALIDATION -->
          <div class="row mt container-fluid">
            <div class="col-lg-12 content-panel">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= base_url('admin/ControlPanel/addMag/'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-5 col-md-5">
              
              <div class="form-group ">
                <label for="po_box" class="control-label col-lg-4">Boite postale :</label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "po_box", 'id' => "po_box", 'class' => 'form-control', 'style' => ";"], set_value('po_box')) ?><br>
                  
                  <div class="<?= empty(form_error('po_box')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('po_box'); ?></span >
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <label for="phone_ss" class="control-label col-lg-4">Téléphone :</label>

                <div class="col-lg-8">
                    <?= form_input(['name' => "phone_ss", 'id' => "phone_ss", 'class' => 'form-control', 'style' => ";"], set_value('phone_ss')) ?><br>
                  
                  <div class="<?= empty(form_error('phone_ss')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('phone_ss'); ?></span >
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="description" class="control-label col-lg-4">Description : </label>


                <div class="col-lg-12 compose-editor">
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('description'); ?>" name="description" id="description" class="form-control"
                    ><?= set_value('description'); ?>
                    
                  </textarea>
                  
                  <div class="<?= empty(form_error('description')) ? "" : "has-error" ?>">
                    <?= empty(form_error('description')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('description'); ?></span >
                  </div>
                </div>

              </div>


            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group ">
                <label for="longitude" class="control-label col-lg-4">Longitude :</label>
                
                <div class="col-lg-8">
                    <?= form_input(['name' => "longitude", 'id' => "longitude", 'class' => 'form-control', 'type' => "number", 'step' => "0.0000001"], set_value('longitude')) ?><br>
                  
                  <div class="<?= empty(form_error('longitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('longitude'); ?></span >
                  </div>
                </div>

              </div>
              <div class="form-group ">
                <label for="latitude" class="control-label col-lg-4">Latitude :</label>
                
                <div class="col-lg-8">
                    <?= form_input(['name' => "latitude", 'id' => "latitude", 'class' => 'form-control', 'type' => "number", 'step' => "0.0000001"], set_value('latitude')) ?><br>
                  
                  <div class="<?= empty(form_error('latitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('latitude'); ?></span >
                  </div>
                </div>

              </div>
              <div class="form-group ">
                <label for="altitude" class="control-label col-lg-4">Altitude :</label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "altitude", 'id' => "altitude", 'class' => 'form-control' , 'type' => "number", 'step' => "0.0000001" ], set_value('altitude')) ?><br>
                  
                  <div class="<?= empty(form_error('altitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('altitude'); ?></span >
                  </div>
                </div>

              </div>
                
            </div>
            <div class="col-lg-3 col-md-3">
              
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-4">Ville :</label>
                
                <div class="col-lg-8">
                  <select name="id_town" id="id_town" class="form-control">
                    <?= !empty(form_error('id_town')) ? '
                    <option value="">
                      ----------------
                    </option>' : '

                    <option value="'.$id_town.'">
                      '.$id_town.'
                    </option>'; ?>

                    <?php foreach ($towns->result_array() as $town): ?>
                    <option value="<?= $town['id_town']; ?>">
                      <?= $town['name_town']; ?>
                    </option>
                    <?php endforeach ?>
                  </select><br>
                  
                  <div class="<?= empty(form_error('id_town')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('id_town'); ?></span >
                  </div>
                </div>

              </div>

              <div class="form-group last">
                <div class="col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 175px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 175px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Image de présentation</span>
                      <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                      <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation externe du lieu" />
                      </span>
                    </div>

                    <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                      <br><span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>

                  </div>
                </div>
              </div>
              
            </div>
            <div class="form-group col-lg-12">
              <div class="col-lg-6">
                
                <A href="" class="btn btn-theme04 col-lg-6" type="button" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser
                </A>
              </div> 
              <div class="col-lg-6">
                <button class="btn btn-success col-lg-6" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
              </div>
            </div>
        </form>
      </div>
          </div>
      </section>
    </section>
