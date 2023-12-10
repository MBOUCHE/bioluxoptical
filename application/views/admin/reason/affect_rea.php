
    <section id="main-content" class="">
      <section class="wrapper">
      <!-- FORM VALIDATION -->
        <h3 id="addM" style="">
        <a href="<?= site_url('admin/ControlPanel/reason')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right;">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <br>
          <span style="color: red; font-size: 17px">
            <?= $this->session->flashdata('flsh_mess'); ?>
          </span>
        </h3><hr>
        <div class="col-lg-12 content-panel" style="">
          <div class="col-lg-4 col-md-4">


            <dt>Code <span style="float: right;">Origine</span></dt>
            <dd><?= $thisReason->code_reason; ?><span style="float: right;"><?= $thisReason->origine_reason; ?></span></dd><hr>

            <dt>Catégorie <span style="float: right;">Sous-Catégorie</span></dt>
            <dd><?= $this->db->where('id_sub_cat', $thisReason->id_sub_cat)->join('sub_category', 'sub_category.id_cat=category.id_cat')->get('category')->row_object()->label; ?>
              <span style="float: right;"><?= $this->db->where('id_sub_cat', $thisReason->id_sub_cat)->get('sub_category')->row_object()->label_c_cat; ?></span>
            </dd><hr>

            <dt>Durée </dt>
            <dd><?= $thisReason->date_manufacturate; ?><span style="float: right;"><?= $thisReason->date_experation; ?></span></dd><hr>

            
            <dl class="dl-horizontal">
              <dt>Image de présentation</dt>
              <img src="<?= base_url('assets/img/reason/'.$thisReason->img_reason) ?>" style="width: 100%">
            </dl>

          </div>
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= base_url('admin/ControlPanel/affectRea/'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-5 col-md-5">

              <input type="hidden" name="id_reason" value="<?= $thisReason->id_reason?>">
              
              

                <div class="form-group">
                  
                  <dt>Désignation<span style="float: right;">Prix</span></dt>
                  <dd><?= $thisReason->name_reason; ?><span style="float: right;"><?= $thisReason->price_reason; ?> FCFA</span></dd><hr>
                  
                  

                  <label for="id_mag" class="control-label col-lg-4">Magasin <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="id_mag" id="id_mag" class="form-control">
                      <option value="">
                        -------------
                      </option>

                      <?php foreach ($stores_shop->result_array() as $storeshop): ?>
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


                <div class="form-group ">
                  <label for="description_prop" class="control-label col-lg-8">Description de l'attribution : </label>

                  <div class="col-lg-12 compose-editor">
                    <textarea  class="wysihtml5 form-control" rows="9" value="<?= (empty(set_value('description_prop')) ? set_value('description_prop') : '');?>" name="description_prop" id="description_prop" class="form-control"
                      ><?= set_value('description_prop'); ?>
                      
                    </textarea>
                    
                    <div class="<?= empty(form_error('description_prop')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('description_prop'); ?></span >
                    </div>
                  </div>
                </div>


              </div>

              <div class="col-lg-3 col-md-3">

                <dt>Type <span style="float: right;">Ancien prix</span></dt>
                <dd><?= $this->db->where('id_type', $thisReason->type_reason)->get('type_reason')->row_object()->name_type; ?>
                  <span style="float: right;"><?= $thisReason->old_price ; ?> FCFA</span>
                </dd><hr>

                <div class="form-group">
                  <label for="quantity" class="control-label col-lg-4">Quantité:</label>
                  
                  <div class="col-lg-8">
                    <?= form_input(['name' => "quantity", 'id' => "quantity", 'class' => 'form-control', 'type' => "number", 'step' => "1", 'min' => '0'], (!empty(set_value('quantity')) ? set_value('quantity') : '')) ?>
                      
                    <div class="<?= empty(form_error('quantity')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('quantity')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('quantity'); ?></span >
                    </div>
                  </div>
                
                  
                </div>
                
                <div class="form-group">

                    
                  <label for="duration_prop" class="control-label col-lg-4">Durée :</label>
                    
                  <div class="col-lg-6">
                    <?= form_input(['name' => "duration_prop", 'id' => "duration_prop", 'class' => 'form-control', 'type' => "number", 'step' => "1", 'min' => '0'], (!empty(set_value('duration_prop')) ? set_value('duration_prop') : '')) ?>
                      
                    <div class="<?= empty(form_error('duration_prop')) ? "" : "has-error" ?>">
                      
                      <?= empty(form_error('duration_prop')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('duration_prop'); ?></span >
                    </div>
                  </div>
                  <div class="col-lg-2" style="">
                    <span style="float: left;">Jr(s)</span>
                  </div>

                    
                </div>

                <div class="col-lg-12 col-md-12">
                  
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 152px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 152px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Image </span>
                      <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
                      <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation du produit / service." value="<?= set_value('userimage')?>" />
                      </span>
                    </div>

                    <div class="<?= empty(form_error('userimage')) ? '' : "has-error" ?>">
                      <br><span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>

                  </div>
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
        </div>

      </section>
  </section>