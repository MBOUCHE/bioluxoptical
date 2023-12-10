
 <!-- Start contact  -->

 <section id="mu-contact">
  <div class="row" style="text-align: center; margin-top: -2%">
    <h2>Laissez un message !</h2>

    <p> <?= $index_com_contact->descrip; ?></p>
  </div>
 <a class="reply-btn" style="margin: 17px; text-align: justify; padding: 4px; float: right;" href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank">Rejoignez nous sur Facebook <span class="fa fa-long-arrow-right"></span></a>
  <div class="container-fluid">
    <!-- start title -->
    
    <!-- end title -->
     <div class="row" style="margin: 1%">
         <div class="mu-contact-area">
          <!-- start contact content -->
          <div style="text-align: center; color: red"> <?=  isset($error) ? $error.' !' : ''; ?></div>
          <div class="mu-contact-content container">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="contactform" action="<?= site_url('sendMessage'); ?>" method="post">

                    <?php isset($this->session->userdata['auth_user']['id_user']) ? $user = $this->db->where('id_costomer', isset($this->session->userdata['auth_user']['id_user']))->get('customer')->row_object() : ''; ?>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <?= form_label ("Nom &nbsp;: <span class='required'>*</span>", "author", ['class' => "", 'style' => "width:100%;"]) ?>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <?= form_input(['name' => "author", 'id' => "author", 'class' => '', 'style' => "width:100%;"], isset($user) ? $user->fname_cost.' '.$user->sname_cost : set_value('author')) ?>
                      <div class="<?= empty(form_error('author')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('author'); ?></span >
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-9 col-xs-12">
                      <?= form_label ("Email &nbsp;: <span class='required'>*</span>", "email", ['class' => "comment-form-email", 'style' => "width:100%;"]) ?>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%;"], isset($user) ? $user->email_cost : set_value('email')) ?>
                      <div class="<?= empty(form_error('email')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('email'); ?></span >
                      </div>
                    </div>


                    <div class="col-md-3 col-sm-9 col-xs-12">
                      <?= form_label ("Sujet &nbsp;: <span class='required'>*</span>", "subject", ['class' => "", 'style' => "width:100%;"]) ?>


                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <?= form_input(['name' => "subject", 'id' => "subject", 'class' => '', 'style' => "width:100%;"], (isset($subject) and !is_null($subject)) ? $subject : set_value('subject')) ?>
                      <div class="<?= empty(form_error('subject')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('subject'); ?></span >
                      </div>
                    </div>


                    <div class="col-md-3 col-sm-9 col-xs-12" style="text-align: center;" >
                      <label for="comment">Message : <span class="required">*</span></label>
                        <img class="img-circle" src="<?= base_url('assets/img/contact.jpg');?>" style='width: 100%'>
                      <i class="fa fa-5x <?= $index_com_contact->img_com; ?>"></i>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                     <textarea class="wysihtml5" rows="13" cols="45" name="comment">
                       
                      <?= set_value('comment'); ?>

                     </textarea>
                      <div class="<?= empty(form_error('comment')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('comment'); ?></span >
                      </div>

                    <p class="form-submit">
                      <button class="fa fa-send mu-post-btn" style="float: right;" type="submit" value="Envoyer" name="submit">
                        Envoyer
                      </button>
                    </p> 

                    </div>
     
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d6249.345033302234!2d-80.02791918555701!3d40.45935344513505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8834f411a7b748bd%3A0xaec8197db3de9a9e!2sCalifornia-Kirkbride%2C+Pittsburgh%2C+PA%2C+USA!3m2!1d40.4600435!2d-80.0213538!5e0!3m2!1sen!2sbd!4v1464270878470" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
                    
                  </iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
   </div>
 </section>
 <!-- End contact  -->
 