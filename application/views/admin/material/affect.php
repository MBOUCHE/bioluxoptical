 <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/material')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
        <h3 id="addM" style="">
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?><br><?= $this->session->flashdata('flsh_mess'); ?></h3><hr>

        <div class="row mb">
<!-- FORM VALIDATION -->
      <div class="row mt container-fluid" style="margin-bottom: 101px">
        <div class="col-lg-12 content-panel">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?= base_url('admin/ControlPanel/affectMat'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-4 col-md-4">
              <input type="hidden" name="id_mat" value="<?= $thisMat->id_mat;?>">

              <dt>Désignation</dt>
              <dd><?= $thisMat->name_mat; ?></dd><hr>

              <dt>Matricule</dt>
              <dd><?= $thisMat->reg_num_mat; ?></dd><hr>

              
              <dl class="dl-horizontal">
                <dt>Image de présentation</dt>
                <img src="<?= base_url('assets/img/materials/'.$thisMat->img_mat) ?>" style="width: 100%">
              </dl>

            </div>
            
            <div class="col-lg-3 col-md-3">


              <dt>Description</dt>
              <dd><?= $thisMat->desc_mat; ?></dd><hr>


              <div class="form-group last">
                  <div class="fileupload fileupload-new" data-provides="fileupload" style="float: right;">
                    <div class="fileupload-new thumbnail" style="width: 175px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 175px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Image de présentation</span>
                      <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                      <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira d'illustration" />
                      </span>
                    </div>

                    <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                      <br><span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>

                  </div>

              </div>
              
            </div>

            <div class="col-lg-5 col-md-5">
              

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
                <div class=" col-lg-5">
                  
                  <label for="quantity" class="control-label">
                    Quantité <i style="color: red">*</i> :
                    <div class="<?= empty(form_error('quantity')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('quantity'); ?></span >
                    </div>
                  </label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <?= form_input(['name' => "quantity", 'id' => "quantity", 'class' => 'form-control', 'type' => 'number', 'min' => '0', "step" => 1], set_value('quantity')) ?>

                </div>
                <div class="col-lg-3 col-md-3">en nombre</div>
              </div>

              <div class="form-group">
                <div class=" col-lg-5">
                  
                  <label for="duration_prop" class="control-label">
                    Durée de l'attribution <i style="color: red">*</i> :
                    <div class="<?= empty(form_error('duration_prop')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('duration_prop'); ?></span >
                    </div>
                  </label>
                </div>
                <div class="col-lg-4 col-md-4">
                  <?= form_input(['name' => "duration_prop", 'id' => "duration_prop", 'class' => 'form-control', 'type' => 'number', 'min' => '1', 'max' => '720', "step" => 1], set_value('duration_prop')) ?>

                </div>
                <div class="col-lg-3 col-md-3">en Jour(s)</div>
              </div>

              <div class="form-group ">
                <label for="description_prop" class="control-label col-lg-12">Description de l'attribution <span style="color: red">*</span> :</label>


                <div class="col-lg-12 compose-editor">
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= (!empty(set_value('description_prop')) ? set_value('description_prop') : $thisMat->desc_mat);?>" name="description_prop" id="description_prop" class="form-control"
                    ><?= (!empty(set_value('description_prop')) ? set_value('description_prop') : $thisMat->desc_mat );?>
                    
                  </textarea>
                  
                  <div class="<?= empty(form_error('description_prop')) ? "" : "has-error" ?>">
                    <span class="help-block "><?= form_error('description_prop'); ?></span >
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
     </div>
    </section>
</section>
  </div>