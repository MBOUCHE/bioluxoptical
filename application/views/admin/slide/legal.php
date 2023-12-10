
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3>
          <i class="fa fa-angle-right"></i> <?= mb_strtoupper($sub_title); ?>
          <br>
          <span style="color: red; font-size: 17px">
            <?= $this->session->flashdata('flsh_mess'); ?>
          </span>
        </h3><hr>
          <div class="row mt ">
            <?php
            //var_dump($presentations->result_array()); die;
             foreach ($presentations->result_array() as $slide): ?>              
            <form action="<?= site_url('admin/ControlPublic/updPresentationAdm/'.$slide['id_slide']) ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 17px">
                <div class="dmbox">


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

                  <input class="form-control" type="hidden" name="title<?= $slide['id_slide']; ?>" value="<?= $slide['title']; ?>">
                  <input class="form-control" type="hidden" name="id_slide<?= $slide['id_slide']; ?>" value="<?= $slide['title']; ?>">
                  
                  <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <label for="title<?= $slide['id_slide']; ?>" class="control-label" style="float: left; margin: 1%">Mise en entrée : </label>
                      <div class="compose-editor">
                        <textarea  class="wysihtml5 form-control" rows="13" value="<?= !empty(set_value('description'.$slide['id_slide'])) ? set_value('description'.$slide['id_slide']) : $slide['id_slide'] ; ?>" name="description<?= $slide['id_slide']; ?>" id="description<?= $slide['id_slide']; ?>" class="form-control"
                          ><?= !empty(set_value('description'.$slide['id_slide'])) ? set_value('description'.$slide['id_slide']) : $slide['description'] ; ?>
                          
                        </textarea>
                      </div>
                      
                      <div class="<?= empty(form_error('title'.$slide['id_slide'])) ? "" : "has-error" ?>">
                        <?= empty(form_error('title'.$slide['id_slide'])) ? '' : '<br>' ?>
                        <span class="help-block "><?= form_error('title'.$slide['id_slide']); ?></span >
                      </div>
                    
                    </div>
                    
                    <div class="service-icon col-lg-3 col-md-3"><br>
                      <label for="title<?= $slide['id_slide']; ?>" class="control-label" style="float: left; margin: 1%">Image associée : </label>

                      <img src="<?= base_url('assets/img/Slider/'.$slide['img_slide']) ?>" style="float: left; width: 100%">
                      <div class="fileupload fileupload-new " data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 100%; height: 125px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 125px; line-height: 20px;"></div>
                        <div>
                          <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image de remplacement"><i class="fa fa-paperclip"></i> Changer</span>
                          <span class="fileupload-exists"  title="Choisir une image de remplacement"><i class="fa fa-undo"></i> Changer</span>
                          <input type="file" name="userimage<?= $slide['id_slide'];?>" value="<?= !empty(set_value('userimage'.$slide['id_slide'])) ? set_value('userimage'.$slide['id_slide']) : $slide['img_slide'] ; ?>" class="default" />
                          </span>
                        </div>
                      </div>
                    </div>

                  </div>


                    <button type="submit" ><i class="fa fa-check"></i><input type="submit" name="submit<?= $slide['id_slide']; ?>" class="btn btn-theme03" style="border-radius: 0px" value="Modifier">
                    </button>


                  <hr>
                  <h5>Dernière modification : <br> <?= date("d/m/Y à H:i:s", strtotime( $slide['last_modification'])); ?></h5>
                  <p>Auteur : <?= $slide['first_name'].' '.$slide['second_name'].'<br> Code utilisateur : '.$slide['reg_number']; ?></p>
                </div>
              </div>
            </form>
            <?php endforeach; ?>
          </div>
        <!--  /row -->
        <div class="mt mb container-fluid">
          <div class="row content-panel container-fluid">
          <h2 class="centered"><?= $manage.' - Termes d\'achat'; ?></h2>
            <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseOne">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to purchase this template?
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseTwo">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How can I install my server?
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseThree">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to change color schemes?
                    </a>
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFour">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to integrate Revolution Slider?
                    </a>
                </div>
                <div id="collapseFour" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFive">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How Can I get Support?
                    </a>
                </div>
                <div id="collapseFive" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- col-md-10 -->
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
