
 <!-- Start contact  -->

  <div class="container-fluid" style="">
    <!-- start title -->
    
 <a class="reply-btn" style="margin: 17px; text-align: justify; padding: 4px; float: right;" href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank">Rejoignez nous sur Facebook <span class="fa fa-long-arrow-right"></span></a>
    <!-- end title -->
     <div class="row">
         <div class="mu-contact-area">
          <!-- start contact content -->
          <div style="text-align: center; color: red"> <?=  isset($error) ? $error.' !' : ''; ?>
            <?php //$this->session->flashdata('flsh_mess'); ?>
          </div>
          <div class="mu-contact-content">
            <div class="mu-contact-left">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                    action="<?= base_url('Bioluxoptical/addCom'); ?>" enctype="multipart/form-data"/>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="subject" class="control-label col-lg-2 col-md-3 col-sm-3 col-xs-12">
                      Sujet<span style="color: red">*</span>:
                    </label>
                    <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                      <?= form_input(['name' => "subject", 'id' => "subject", 'class' => 'form-control', 'style' => ";"], set_value('subject')) ?>
                      
                      <div class="<?= empty(form_error('subject')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('subject'); ?></span >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-6">
                    <label for="fisrt_content" class="col-lg-12" style="float: left;">Premier message <span style="color: red">*</span> :</label>
                    <div class="col-lg-12">
                      <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('fisrt_content'); ?>" name="fisrt_content" id="fisrt_content" class="form-control"
                        ><?= set_value('fisrt_content'); ?>
                        
                      </textarea>
                      <div class="<?= empty(form_error('fisrt_content')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('fisrt_content'); ?></span >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-6">
                    <label for="descrip" class="col-lg-12">Description du thème à aborder <span style="color: red">*</span> :</label>

                    <div class="col-lg-12 compose-editor">
                      <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('descrip'); ?>" name="descrip" id="descrip" class="form-control"
                        ><?= set_value('descrip'); ?>
                        
                      </textarea>
                      
                      <div class="<?= empty(form_error('descrip')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('descrip'); ?></span >
                      </div>
                    </div>
                  </div>

                    <p class="form-submit" style="text-align: center; margin: 2%">

                      <button class="fa fa-refresh mu-post-btn" type="reset">
                        Réinitialiser
                      </button>
                      <button class="fa fa-send mu-post-btn" type="submit" value="Envoyer" name="submit">
                        Proposer
                      </button>
                    </p>
                </div>
              </form>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
   </div>
 <!-- End contact  -->
 