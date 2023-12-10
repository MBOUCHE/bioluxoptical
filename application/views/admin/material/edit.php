 <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/material')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%">
          <span class="fa fa-reply" style=""></span> Abandonner
        </a>
        <h3 id="addM" style="">
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <?= $this->session->flashdata('flsh_mess'); ?></h3><hr>

        <div class="row mb">
<!-- FORM VALIDATION -->
      <div class="row mt container-fluid" style="margin-bottom: 101px">
        <div class="col-lg-12 content-panel">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?= base_url('admin/ControlPanel/updateMat/'); ?>" enctype="multipart/form-data"/>
            <div class="col-lg-4 col-md-4">
              <input type="hidden" name="id_mat" value="<?= $thisMat->id_mat;?>">

              <div class="form-group ">
                <label for="name_mat" class="control-label col-lg-4">Désignation <span style="color: red">*</span> :</label>
                <div class="col-lg-8">
                  <input type="text" name="name_mat" id="name_mat" class="form-control" value="<?= (is_null(set_value('name_mat')) ? set_value('name_mat') : $thisMat->name_mat) ?>">
                  
                  <div class="<?= empty(form_error('name_mat')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('name_mat')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('name_mat'); ?></span >
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <label for="reg_num_mat" class="control-label col-lg-4">Matricule <span style="color: red">*</span> :</label>
                <div class="col-lg-8">
                  <input type="text" name="reg_num_mat" id="reg_num_mat" class="form-control" value="<?= (is_null(set_value('reg_num_mat')) ? set_value('reg_num_mat') : $thisMat->reg_num_mat);?>">
                  
                  <div class="<?= empty(form_error('reg_num_mat')) ? "" : "has-error" ?>">
                    
                    <?= empty(form_error('reg_num_mat')) ? '' : '<br>' ?>
                    <span class="help-block "><?= form_error('reg_num_mat'); ?></span >
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-3">

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

            <div class="col-lg-5 col-md-5">
              <div class="form-group ">
                <label for="desc_mat" class="control-label col-lg-12">Description / Usage <span style="color: red">*</span> :</label>


                <div class="col-lg-12 compose-editor">
                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= (is_null(set_value('desc_mat')) ? set_value('desc_mat') : $thisMat->desc_mat);?>" name="desc_mat" id="desc_mat" class="form-control"
                    ><?= (is_null(set_value('desc_mat')) ? set_value('desc_mat') : $thisMat->desc_mat);?>
                    
                  </textarea>
                  
                  <div class="<?= empty(form_error('desc_mat')) ? "" : "has-error" ?>">
                    <span class="help-block "><?= form_error('desc_mat'); ?></span >
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