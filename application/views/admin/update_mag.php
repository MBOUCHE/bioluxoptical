  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?><?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <div class="row mb">
<!-- FORM VALIDATION -->
      <div class="row mt container-fluid" style="margin-bottom: 101px">
        <div class="col-lg-12 content-panel">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= base_url('admin/ControlPanel/updMag/'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-5 col-md-5">
              
              <div class="form-group ">
                <label for="po_box" class="control-label col-lg-4">Boite postale :</label>
                <div class="col-lg-8">
                  <input type="text" name="po_box" id="po_box" class="form-control" value="<?= $thisStoreshops->po_box?>">
                    
                  
                  <div class="<?= empty(form_error('po_box')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('po_box'); ?></span >
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <label for="phone_ss" class="control-label col-lg-4">Téléphone :</label>

                <div class="col-lg-8">
                  <input type="text" name="phone_ss" id="phone_ss" class="form-control" value="<?= $thisStoreshops->phone_ss?>">
                  
                  <div class="<?= empty(form_error('phone_ss')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('phone_ss'); ?></span >
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="description" class="control-label col-lg-4">Description : </label>


                <div class="col-lg-12 compose-editor">
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= !empty(set_value('description')) ? set_value('description') : $thisStoreshops->description ; ?>" name="description" id="description" class="form-control"
                    ><?= !empty(set_value('description')) ? set_value('description') : $thisStoreshops->description ; ?>
                    
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
                  <input type="number" step="0.0000001" name="longitude" id="longitude" class="form-control" value="<?= $thisStoreshops->longitude?>">
                  <div class="<?= empty(form_error('longitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('longitude'); ?></span >
                  </div>
                </div>

              </div>
              <div class="form-group ">
                <label for="latitude" class="control-label col-lg-4">Latitude :</label>
                
                <div class="col-lg-8">
                  <input type="number" step="0.0000001" name="latitude" id="latitude" class="form-control" value="<?= $thisStoreshops->latitude ?>">
                  
                  <div class="<?= empty(form_error('latitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('latitude'); ?></span >
                  </div>
                </div>

              </div>
              <div class="form-group ">
                <label for="altitude" class="control-label col-lg-4">Altitude :</label>
                <div class="col-lg-8">
                  <input type="number" step="0.0000001" name="altitude" id="altitude" class="form-control" value="<?= $thisStoreshops->altitude ?>">
                  
                  <div class="<?= empty(form_error('altitude')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('altitude'); ?></span >
                  </div>
                </div>

              </div>
                
            </div>
            <div class="col-lg-3 col-md-3">
              
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-4">Ville : </label>
                
                <div class="col-lg-8">
                  <select name="id_town" id="id_town" class="form-control">
                    
                    <?php foreach ($towns->result_array() as $town): ?>
                    <option value="<?= $town['id_town']; ?>" <?= ($thisStoreshops->id_town == $town['id_town']) ? ' selected="selected"' : '' ; ?>>
                      <?= $town['name_town']; ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                  
                  <div class="<?= empty(form_error('id_town')) ? "" : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('id_town'); ?></span >
                  </div>
                </div>



              </div>

              <div class="form-group last">
                <div class="col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Image de présentation</span>
                      <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                      <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation externe du lieu" value="<?= $thisStoreshops->building_img?>"/>
                      </span>
                      <input type="hidden" name="building_img_old" value="<?= $thisStoreshops->building_img?>">
                      <input type="hidden" name="id_mag" value="<?= $thisStoreshops->id_mag?>">
                    </div>

                    <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                      <br><span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>

                  </div>
                </div>
              </div>
              
            </div>
            <div class="form-group">
              <div class="col-lg-12">

                <div class=" col-lg-6">
                </div>

                <div class=" col-lg-6">
                  <A href="<?= base_url('admin/ControlPanel/storesShop/')?>" class="btn btn-theme04 col-lg-3" type="button" style="float: left; border-radius: 0px"><span class="fa fa-reply" style="margin-left: -15%"></span> Abandonner</A> 

                  <button class="btn btn-success" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
                </div>
              </div>
            </div>
        </form>
      </div>
       
    </section>

  </div>