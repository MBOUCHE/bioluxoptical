
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
      
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/C_Forum')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= mb_strtoupper($sub_title); ?> : <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
      
       <!-- FORM VALIDATION -->
          <div class="row mt container-fluid" style="margin-bottom: 101px">
            <div class="col-lg-12 content-panel">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                    action="<?= base_url('admin/C_Forum/addCom'); ?>" enctype="multipart/form-data"/>
                <div class="col-lg-3 col-md-3">
                  
                  <div class="form-group ">
                    <label for="subject" class="control-label col-lg-3">Sujet<span style="color: red">*</span>:</label>
                    <div class="col-lg-9">
                        <?= form_input(['name' => "subject", 'id' => "subject", 'class' => 'form-control', 'style' => ";"], set_value('subject')) ?>
                      
                      <div class="<?= empty(form_error('subject')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('subject'); ?></span >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-9">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 242px; height: 150px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 242px; max-height: 150px; line-height: 20px;"></div>
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
                <div class="col-lg-4 col-md-4">
                  <label for="fisrt_content" class="control-label col-lg-12">Premier message <span style="color: red">*</span> :</label>
                  <div class="col-lg-12">
                    <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('fisrt_content'); ?>" name="fisrt_content" id="fisrt_content" class="form-control"
                      ><?= set_value('fisrt_content'); ?>
                      
                    </textarea>
                    <div class="<?= empty(form_error('fisrt_content')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('fisrt_content'); ?></span >
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5">
                  <label for="descrip" class="control-label col-lg-12">Description du thème à aborder <span style="color: red">*</span> :</label>

                  <div class="col-lg-12 compose-editor">
                    <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('descrip'); ?>" name="descrip" id="descrip" class="form-control"
                      ><?= set_value('descrip'); ?>
                      
                    </textarea>
                    
                    <div class="<?= empty(form_error('descrip')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('descrip'); ?></span >
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-12" style="float: right;">
                  <div class="col-lg-6">
                    
                    <button class="btn btn-theme04 col-lg-6" type="reset" style="float: right; border-radius: 0px; margin: 2%"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser
                    </button>
                  </div> 
                  <div class="col-lg-6">
                    <button class="btn btn-success col-lg-6" type="submit" value="Enregistrer" style="float: right; border-radius: 0px; margin: 2%"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </section>
    </section>
