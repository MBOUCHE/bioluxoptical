 <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
      	<a href="<?= site_url('admin/C_Provider/index')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%"><span class="fa fa-reply" style=""></span> Abandonner</a>
        <h3 id="addM" style=""><i class="fa fa-angle-right"></i> Ajout d'un nouveau partenaire </h3>

        <hr>

        <div class="row mb">
      <!-- FORM VALIDATION -->
      <div class="row mt container-fluid" style="margin-bottom: 101px">
        <div class="col-lg-12 content-panel" style="">

          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= site_url('admin/C_Provider/addProv'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-5 col-md-5">
              
              <div class="form-group ">
                <label for="name_prov" class="control-label col-lg-4">Partenaire : </label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "name_prov", 'id' => "name_prov", 'class' => 'form-control'], set_value('name_prov')) ?>
                  
                  <div class="<?= empty(form_error('name_prov')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('name_prov')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('name_prov'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <label for="social_reason" class="control-label col-lg-4">Raison sociale : </label>
                <div class="col-lg-8">
                    <?= form_input(['name' => "social_reason", 'id' => "social_reason", 'class' => 'form-control'], set_value('social_reason')) ?>
                  
                  <div class="<?= empty(form_error('social_reason')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('social_reason')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('social_reason'); ?></span >
                  </div>
                </div>
              </div> 


              <div class="form-group ">
                <label for="contact" class="control-label col-lg-4">Contact : </label>
                <div class="col-lg-8">
                	<input type="text" name="contact" id="contact" class="form-control" value="<?= set_value('contact')?>" style="padding: 0px">
                                      
                  <div class="<?= empty(form_error('contact')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('contact')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('contact'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <label for="description" class="control-label col-lg-4">Description: </label>

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

            <div class="col-lg-2 col-md-2">
              	
             	<div class="form-group">
	                <div class="fileupload fileupload-new" data-provides="fileupload">
	                  <div class="fileupload-new thumbnail" style="width: 148px; height: 150px;">
	                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
	                  </div>
	                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 148px; max-height: 150px; line-height: 20px;"></div>
	                  <div>
	                    <span class="btn btn-theme02 btn-file">
	                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Logo</span>
	                    <span class="fileupload-exists"><i class="fa fa-undo" style="border-radius: 0px"></i> Changer</span>
	                    <input type="file" name="userimage" id="userimage" class="default" title="choisissez une image qui servira de présentation." value="<?= set_value('userimage')?>" />
	                    </span>
	                  </div>

	                  <div class="<?= empty(form_error('userimage')) ? '' : "has-error" ?>">
	                    <br><span class="help-block "><?= form_error('userimage'); ?></span >
	                  </div>

	                </div>
	            </div>


             	<div class="form-group">
                  <label for="date_reg_prov" class="control-label">Date de signature</label>
                  <div class="col-lg-10">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2000" class="input-append date dpYears">
                      <input id="date_reg_prov" name="date_reg_prov" type="text" readonly="" value="<?= is_null(set_value('date_reg_prov')) ? set_value('date_reg_prov') : '01-01-2000'; ?>" size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                  </div>
                  <div class="<?= empty(form_error('date_reg_prov')) ? '' : 'has-error' ?>">
                    <?= empty(form_error('date_reg_prov')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('date_reg_prov'); ?></span >
                  </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5">

              <div class="form-group">
                <label for="id_user" class="control-label col-lg-4">Gestionnaire :</label>

                <div class="col-lg-8">

                  <select name="id_user" id="id_user" class="form-control">
                    <option value="">
                      ---------------
                    </option>
                    <?php foreach ($managers->result_array() as $manager): ?>
                    <option <?= (set_value('id_user')==$manager['id_user']) ? 'value="'.set_value('id_user').'" selected="selected"' : 'value="'.$manager['id_user'].'"'; ?>>
                      <?= $manager['first_name'].' '.$manager['second_name']; ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                  
                  <div class="<?= empty(form_error('id_user')) ? '' : 'has-error' ?>">
                    <?= empty(form_error('id_user')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('id_user'); ?></span >
                  </div>
                </div>

              </div>
              <div class="form-group">
                
                <label for="code_number" class="control-label col-lg-4">Numéro de code :</label>
                  
	            <div class="col-lg-8">
	                <?= form_input(['name' => "code_number", 'id' => "code_number", 'class' => 'form-control', 'type' => "text"], set_value('code_number')) ?>
	                    
	                <div class="<?= empty(form_error('code_number')) ? "" : "has-error" ?>">
	                    
	                    <?= empty(form_error('code_number')) ? '' : '<br>' ?>
	                    <span class="help-block "><?= form_error('code_number'); ?></span >
	                </div>
              	</div>

              </div>


              <div class="form-group ">
              
                
                <label for="type_prov" class="control-label col-lg-4">Type :</label>
                
                <div class="col-lg-8">
                  <select name="type_prov" id="type_prov" class="form-control">
                    <option value="">
                      ---------------
                    </option>

                    <?php foreach ($types_prov->result_array() as $type_prov): ?>
                    <option <?= (set_value('type_prov')==$type_prov['id_type']) ? 'value="'.set_value('type_prov').'" selected="selected"' : 'value="'.$type_prov['id_type'].'"'; ?>>
                      <?= $type_prov['name_type']; ?>
                    </option>

                    <?php endforeach ?>
                  </select>
                  
                  <div class="<?= empty(form_error('type_prov')) ? '' : 'has-error' ?>">
                    <?= empty(form_error('type_prov')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('type_prov'); ?></span >
                  </div>
                </div>
                
              </div>

              <div class="form-group ">
              	

	            <label for="termes" class="control-label col-lg-12">Termes du partenariat : </label>
	            <div class="form-group">

	                <div class="col-lg-12 compose-editor">
	                  <textarea name="termes" id="termes" class="wysihtml5 form-control" rows="9"
	                     value="<?= set_value('termes'); ?>"><?= set_value('termes'); ?>
	                  </textarea><br>
	                  <div class="<?= empty(form_error('termes')) ? "" : "has-error" ?>">
	                    <?= empty(form_error('termes')) ? '' : '<br>' ?>
	                    <span class="help-block "><?= form_error('termes'); ?></span >
	                  </div>
	                </div>
	            </div>


	            <div class=" col-lg-12">
	              <A href="" class="btn btn-theme04 col-lg-6" type="button" style="float: left; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style="float: left;"></span> Réinicialiser</A> 

	              <button class="btn btn-success" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
	            </div>

              </div>

        </form>
      </div>

    </section>
      </div>
       
    </section>

  </div>

