
    <section id="main-content" class="">
      <section class="wrapper">
      <!-- FORM VALIDATION -->
        <h3 id="addM" style="">
        <a href="<?= site_url('admin/ControlPanel/reason')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right;">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> : <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <div class="col-lg-12 content-panel" style="">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= base_url('admin/ControlPanel/addRea/'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-5 col-md-5">
              
              <div class="form-group ">
                <label for="name_reason" class="control-label col-lg-4">Désignation:</label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "name_reason", 'id' => "name_reason", 'class' => 'form-control'], set_value('name_reason')) ?>
                  
                  <div class="<?= empty(form_error('name_reason')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('type_reason')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('name_reason'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group ">

                <label for="code_reason" class="control-label col-lg-4">Code:</label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "code_reason", 'id' => "code_reason", 'class' => 'form-control'], set_value('code_reason')) ?>
                  
                  <div class="<?= empty(form_error('code_reason')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('code_reason')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('code_reason'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <label for="origine_reason" class="control-label col-lg-4">Origine:</label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "origine_reason", 'id' => "origine_reason", 'class' => 'form-control', 'style' => ";"], set_value('origine_reason')) ?>
                  
                  <div class="<?= empty(form_error('origine_reason')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('origine_reason')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('origine_reason'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="id_cat_reason" class="control-label col-lg-4">Catégorie:</label>

                <div class="col-lg-6" style="width: 65%">

                  <select name="id_cat_reason" id="id_cat_reason" class="form-control">
                    <option value="">
                      ---------------
                    </option>
                    <?php foreach ($sub_categories as $sub_categorie): ?>
                    <option <?= (set_value('id_cat_reason')==$sub_categorie['id_sub_cat']) ? 'value="'.set_value('id_cat_reason').'" selected="selected"' : 'value="'.$sub_categorie['id_sub_cat'].'"'; ?>>
                      <?= $sub_categorie['label_c_cat'].' - '.$this->db->select('label')->where('id_cat', $sub_categorie['id_cat'])->get('category')->row_object()->label; ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                  
                  <div class="<?= empty(form_error('id_cat_reason')) ? '' : 'has-error' ?>">
                    <?= empty(form_error('id_cat_reason')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('id_cat_reason'); ?></span >
                  </div>
                </div>

              </div>

                
              <div class="form-group ">
                <label for="description_reason" class="control-label col-lg-4">Description: </label>

                <div class="col-lg-12 compose-editor">
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('description_reason'); ?>" name="description_reason" id="description_reason" class="form-control"
                    ><?= (is_null(set_value('description_reason')) ? set_value('description_reason') : '');?>
                    
                  </textarea>
                  
                  <div class="<?= empty(form_error('description_reason')) ? "" : "has-error" ?>">
                    <span class="help-block "><?= form_error('description_reason'); ?></span >
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-5 col-md-5">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label for="price_reason" class="control-label col-lg-4">Prix :</label>
                  
                  <div class="col-lg-8">
                      <?= form_input(['name' => "price_reason", 'id' => "price_reason", 'class' => 'form-control', 'type' => "number", 'step' => "0.01"], set_value('price_reason')) ?>
                    
                    <div class="<?= empty(form_error('price_reason')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('price_reason')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('price_reason'); ?></span >
                    </div>
                  </div>
                
                  
                </div>
                <div class="form-group">

                    
                  <label for="old_price" class="control-label col-lg-4">Ancien prix :</label>
                    
                  <div class="col-lg-8">
                    <?= form_input(['name' => "old_price", 'id' => "old_price", 'class' => 'form-control', 'type' => "number", 'step' => "0.01"], set_value('old_price')) ?>
                      
                    <div class="<?= empty(form_error('old_price')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('old_price')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('old_price'); ?></span >
                    </div>
                  </div>

                    
                </div>

                <div class="form-group">
                  
                  
                  <label for="type_reason" class="control-label col-lg-4">Type:</label>
                  
                  <div class="col-lg-8">
                    <select name="type_reason" id="type_reason" class="form-control">
                      <option value="">
                        ---------------
                      </option>

                      <?php foreach ($types_reason->result_array() as $type_reason): ?>
                      <option <?= (set_value('type_reason')==$type_reason['id_type']) ? 'value="'.set_value('type_reason').'" selected="selected"' : 'value="'.$type_reason['id_type'].'"'; ?>>
                        <?= $type_reason['name_type']; ?>
                      </option>
                      <?php endforeach ?>
                    </select>
                    
                    <div class="<?= empty(form_error('type_reason')) ? '' : 'has-error' ?>">
                      <?= empty(form_error('type_reason')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('type_reason'); ?></span >
                    </div>
                  </div>
                </div>
  
              </div>


              <div class=" col-lg-12">

                <div class="form-group">
                  <label class="control-label col-md-3">Durée:</label>
                  <div class="col-md-9">
                    <div class="input-group input-large" data-date="01-01-2000" data-date-format="mm-dd-yyyy">
                      <input type="text" class="form-control dpd1" name="date_manufacturate" value="<?= set_value('date_manufacturate'); ?>">
                      <span class="input-group-addon">à</span>
                      <input type="text" class="form-control dpd2" name="date_experation" value="<?= set_value('date_experation'); ?>">
                    </div>

                    <div class="<?= empty(form_error('date_manufacturate')) ? "" : "has-error" ?>">
                      <?= empty(form_error('date_manufacturate')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('date_manufacturate'); ?></span >
                    </div>

                    <div class="<?= empty(form_error('date_manufacturate')) ? "" : "has-error" ?>">
                      <?= empty(form_error('date_manufacturate')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('date_manufacturate'); ?></span >
                    </div>

                  </div>
                    <span class="help-block col-lg-12">Fabrication à Expiration : Mois/Jour/Année</span>
                </div>

                <div class="form-group compose-editor">
                  <label for="note_reason" class="control-label">Remarque: </label>
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('note_reason'); ?>" name="note_reason" id="note_reason" class="form-control"
                    ><?= set_value('note_reason'); ?>
                    
                  </textarea>
                  
                  <div class="<?= empty(form_error('note_reason')) ? "" : "has-error" ?>">
                    <span class="help-block "><?= form_error('note_reason'); ?></span >
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-2 col-md-2">
              
                
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 152px; height: 150px;">
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 152px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                    <span class="btn btn-theme02 btn-file">
                      <span class="fileupload-new"><i class="fa fa-paperclip"></i>Petite Image </span>
                    <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                    <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation du produit / service." value="<?= !empty(set_value('userimage')) ? set_value('userimage') : '';?>" />
                    </span>
                  </div>

                  <div class="<?= empty(form_error('userimage')) ? '' : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('userimage'); ?></span >
                  </div>

                </div>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 152px; height: 292px;">
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 152px; max-height: 292px; line-height: 20px;"></div>
                  <div>
                    <span class="btn btn-theme02 btn-file">
                      <span class="fileupload-new"><i class="fa fa-paperclip"></i>Grande Image </span>
                    <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                    <input type="file" name="userfile" id="userfile" class="default" title="choisissez une image qui affichera plus de vues du produit / service." value="<?= !empty(set_value('userfile')) ? set_value('userfile') : '';?>" />
                    </span>
                  </div>

                  <div class="<?= empty(form_error('userfile')) ? '' : "has-error" ?>">
                    <br><span class="help-block "><?= form_error('userfile'); ?></span >
                  </div>
                  <?= !empty(set_value('userfile')) ? set_value('userfile') : '';?>
                </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12">

                <div class=" col-lg-6">
                  <A href="" class="btn btn-theme04" type="button" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser</A> 
                </div>

                <div class=" col-lg-6">

                  <button class="btn btn-success" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
                </div>
              </div>
            </div>
        </form>
    </section>
  </section>
