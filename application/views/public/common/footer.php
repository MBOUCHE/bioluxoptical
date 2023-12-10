



<?php if (($sub_title == 'Formulaire de connexion') or ($sub_title == 'Formulaire de création de compte') or ($title == 'Mot de passe oublié')): ?>


  <!-- Start footer -->
<footer id="mu-footer" style=" margin-top: 50px;font-size: ">
  <div class="mu-footer-top">
      <div class="container-fluid">
        <div class="mu-footer-top-area">
            <div class="row" style="color: white; text-align: center;">
              <p><label style="color: darkcyan">BIOLUX OPTICAL Sarl</label> - Tout droit réservé.
            </div>
        </div>
      </div>
  </div>
  <!-- start footer bottom -->
  <div class="mu-footer-bottom">
    <div class="container">
      <div class="mu-footer-bottom-area">
      <p>Bioluxoptical.cm © Copyright 2021 | Tous les prix indiqués sur le site incluent la TVA</p>
        Développé par <!-- <a href="" rel="nofollow" style="font-family: Gabriola; font-size: 17px">Ing. MBOUCHE BOMDA ULRICHE</a> --></p>
  
      </div>
    </div>
  </div>
    <!-- end footer bottom -->
</footer>

  <!-- End footer -->

<?php else: ?>



  <!-- Start footer -->
  <footer id="mu-footer" style="font-size: ">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12" style="margin-top: -2%">
        <div class="mu-footer-top-area">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="mu-footer-widget">
              <h4>à propos de <span style="color: darkcyan">biolux optical</span></h4><hr>
              <ul>
                <li><a href="<?= site_url('#about') ?>">Qui sommes-nous ?</a></li>
                <li><a href="<?= site_url('#opticians') ?>">Pourquoi Biolux Optical ?</a></li>
                <li><a href="<?= site_url('#structDocs') ?>">Confiance & Confidentialité</a></li>
                <li><a href="<?= site_url('#structDocs') ?>">Structuration & documentation</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="mu-footer-widget">
              <h4>vos questions </h4><hr>
              <ul>
                <li><a href="#">Qui sommes-nous ?</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Course</a></li>
                <li><a href="">Event</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="mu-footer-widget">
              <h4>Nos conseils d'usage</label></h4><hr>
              <ul>
                <?php foreach ($advides->result_array() as $advide): ?>

                <li><a href="<?= base_url('Bioluxoptical/readMore/').$advide['id_issue'];?>"><?= $advide['title_rm']; ?></a></li>

                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
        <!-- start footer2 top -->
    <div class="mu-footer-top">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12" style="margin-top: -4%"><hr>
        <div class="mu-footer-top-area">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="mu-footer-widget">
              <h4 style="color: darkcyan">Paiements</h4><hr>
              <ul>

                <?php foreach ($operators->result_array() as $operator): ?>

                <li class="col-lg-6 col-md-6 col-sm-6">
                  <a href="<?= site_url('Bioluxoptical/detailsPayment/'.$operator['id_prov']) ?>" style="width: 100%; text-align: left;"><?= $operator['name_prov']; ?>
                  <img class="img-rounded" style="float: right;width: 67px; height: 44px" src="<?= base_url('assets/img/') ?>pay/<?= $operator['img_logo']; ?>"></a>
                </li>

                <?php endforeach; ?>
              
              </ul>
            </div>
          </div>

          
          <div class="col-lg-4 col-md-4 col-sm-4" style="color: white">
            <div class="mu-footer-widget">
              <h4>Contactez nous !</h4><hr>
              <address>
                <div class="">
                  <div class="mu-top-email">
                    <img src="<?= base_url('assets/img/');?>logo_gm.png" alt="logo" style="width: 17px;">
                    <a style="font-size: 13px;color: white" href="mailto:info@bioluxoptical.com">info@bioluxoptical.com</a><br>
                    <span style="font-size: 13px">
                      <span style="font-size: 22px; margin-top: 1%" class="fa fa-whatsapp"></span>
                      (+237) <a href="tel:698 665 698" style="color: white">698 665 698</a>
                         
                      </span><br>
                    <span style="font-size: 13px">
                      <span style="font-size: 22px; margin-top: 1%" class="fa fa-phone"></span>
                      (+237) <a href="tel:675 776 125" style="color: white">675 776 125</a>
                    </span><br>
                    <a href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank" style="color: white;">
                      <span style="font-size: 22px; margin: 1%;color: white" class="fa fa-facebook-official"></span>
                    </a>
                    <a href="#"><span style="font-size: 22px; margin: 1%;color: white" class="fa fa-linkedin"></span></a>
                  </div>
                </div>
              </address>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4" style="float: right;">
            <div class="mu-footer-widget">
              <h4>News letter</h4><hr>
              <p>Restez à l'écoute sur les dernières offres et informations</p>
              <form class="mu-subscribe-form" method="post" action="<?= site_url('Bioluxoptical/emailNewsLetter')?>">

                <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%; border-radius: 0px", 'type' => 'email', 'placeholder' => "Votre Email"], (isset($email) and !is_null($email)) ? $email : set_value('email')) ?>
                <div class="<?= empty(form_error('email')) ? "" : "has-error" ?>">
                  <span class="help-block "><?= form_error('email'); ?></span >
                </div>
                <input type="hidden" name="subject" value="NEWSLETTER">
                <button style="border-radius: 0px; float: right; font-size: 17px" class="mu-subscribe-btn fa fa-send" type="submit"> Envoyer !</button>
              </form>               
            </div>
          </div>
            
        </div>
      </div>
    </div>
    <!-- end footer2 top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom" style="margin-top: -2%">

      <?php if ($sub_title != 'Formulaire de connexion'): ?>
      <li>
        <div class="btn-group" >
          <a href="<?= site_url('loginPage') ?>"><button type="button" class="btn btn-primary" style="border-radius: 13px; float: left;">
            <span class="fa fa-user-secret"></span>
          </button></a>
        </div>
      </li>
      <?php endif ?>
      <div class="mu-footer-bottom-area">
        <p>Bioluxoptical.cm © Copyright 2021 | Tous les prix indiqués sur le site incluent la TVA</p>
        <p><label style="color: darkcyan">BIOLUX OPTICAL Sarl</label> - Tout droit réservé. <br>Développé par <!-- <a href="" rel="nofollow" style="font-family: Gabriola; font-size: 17px">Ing. MBOUCHE BOMDA ULRICHE</a> --></p>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  

<?php endif ?>

