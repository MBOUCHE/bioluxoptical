
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3 >
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <br>
          <span style="float: left; color: red; font-size: 17px"><?= $this->session->flashdata('flsh_mess'); ?></span>
        </h3><hr>
        <div class="row mt ">
            <?php foreach ($slides->result_array() as $slide): ?>              
            <form action="<?= site_url('admin/ControlPublic/updateSlide/'.$slide['id_slide']) ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 17px">
                <div class="dmbox">
                  <div class="service-icon col-lg-8 col-md-8">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/slider/').$slide['img_slide'];?>" style="width: 100%; height: 175px;">
                  </div>

                  <div class="service-icon col-lg-4 col-md-4">
                    <div class="fileupload fileupload-new " data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 143px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 143px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image de remplacement"><i class="fa fa-paperclip"></i> Changer</span>
                        <span class="fileupload-exists"  title="Choisir une image de remplacement"><i class="fa fa-undo"></i> Changer</span>
                        <input type="file" name="userimage<?= $slide['id_slide'];?>" value="<?= !empty(set_value('userimage'.$slide['id_slide'])) ? set_value('userimage'.$slide['id_slide']) : $slide['img_slide'] ; ?>" class="default" />
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-2 col-md-2" for="title0<?= $slide['id_slide']; ?>">
                      Titre :
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <input class="form-control" type="text" name="title0<?= $slide['id_slide']; ?>" value="<?= $slide['title0']; ?>">

                      <div class="<?= empty(form_error('title0'.$slide['id_slide'])) ? "" : "has-error" ?>">
                        <?= empty(form_error('title0'.$slide['id_slide'])) ? '' : '<br>' ?>
                        <span class="help-block "><?= form_error('title0'.$slide['id_slide']); ?></span >
                      </div>
                    </div>
                  </div>
                  
                  /\
                  <div class="row">
                      <label for="title<?= $slide['id_slide']; ?>" class="control-label" style="float: left; margin: 4%">Mise en entrée : </label>


                      <div class="col-lg-12 compose-editor">
                        <textarea  class="wysihtml5 form-control" rows="2" value="<?= !empty(set_value('title'.$slide['id_slide'])) ? set_value('title'.$slide['id_slide']) : $slide['id_slide'] ; ?>" name="title<?= $slide['id_slide']; ?>" id="title<?= $slide['id_slide']; ?>" class="form-control">
                          <?= !empty(set_value('title'.$slide['id_slide'])) ? set_value('title'.$slide['id_slide']) : $slide['title'] ; ?>
                          
                        </textarea>
                        
                        <div class="<?= empty(form_error('title'.$slide['id_slide'])) ? "" : "has-error" ?>">
                          <?= empty(form_error('title'.$slide['id_slide'])) ? '' : '<br>' ?>
                          <span class="help-block "><?= form_error('title'.$slide['id_slide']); ?></span >
                        </div>
                      </div>


                      <label for="description<?= $slide['id_slide']; ?>" class="control-label" style="float: left; margin: 4%">Description : </label>


                      <div class="col-lg-12 compose-editor">
                        <textarea  class="wysihtml5 form-control" rows="9" value="<?= !empty(set_value('description'.$slide['id_slide'])) ? set_value('description'.$slide['id_slide']) : $slide['id_slide'] ; ?>" name="description<?= $slide['id_slide']; ?>" id="description<?= $slide['id_slide']; ?>" class="form-control">
                          <?= !empty(set_value('description'.$slide['id_slide'])) ? set_value('description'.$slide['id_slide']) : $slide['description'] ; ?>
                          
                        </textarea>
                        
                        <div class="<?= empty(form_error('title'.$slide['id_slide'])) ? "" : "has-error" ?>">
                          <?= empty(form_error('title'.$slide['id_slide'])) ? '' : '<br>' ?>
                          <span class="help-block "><?= form_error('title'.$slide['id_slide']); ?></span >
                        </div>
                      </div>
                  </div>
                  <a style="float: left;" href="<?= base_url('admin/ControlPublic/stateSlide/').$slide['id_slide'].'/'.$slide['state_slide'] ;?>">
                      <div class="switch demo">
                        <input type="checkbox" style="width: 40px"
                          <?php 
                            if ($slide['state_slide']== -1 or $slide['state_slide'] == 0 ) 
                              echo('');
                            else echo('checked');
                          ?> >
                        <label><i></i></label>
                      </div>
                    </a>
                    <button type="submit" ><i class="fa fa-check"></i><input type="submit" name="submit<?= $slide['id_slide']; ?>" class="btn btn-theme03" style="border-radius: 0px" value="Valider<?= $slide['id_slide']; ?>">
                    </button>


                  <hr>

                  <h5>Dernière modification : <br> <?= date("d/m/Y à H:i:s", strtotime( $slide['last_modification'])); ?></h5>
                  <p>Auteur : <?= $slide['first_name'].' '.$slide['second_name'].'<br> Code utilisateur : '.$slide['reg_number']; ?></p>
                </div>
              </div>
            </form>
            <?php endforeach; ?>
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!-- /row -->
        
          <!-- col-md-10 -->
        </div>
        <!--  /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
