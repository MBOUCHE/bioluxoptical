
  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container" style="width: 94%">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left" style="text-align: justify;">
                  <!-- Start Title -->
                  <div  id="about" class="mu-title">
                    <h2>à propos de nous</h2>              
                  </div>
                  <!-- End Title -->
                  <p>
                  <!-- LOGO -->
                    <!-- IMG BASED LOGO  -->
                      <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" style="width: 40%"> est une entreprise camerounaise spécialisée dans la fabrication et la distribution de verres optiques médicaux.
                  </p>
                  <p>
                    Crée en 2000, l'entreprise a mis à contribution son capital humain et technique sous la supervision de sa Direction Générale en vue de satisfaire ses clients.
                  </p>
                  <p>
                    S'inscrivant dans une logique d'une amélioration continue,
                      <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" style="width: 40%"> s'est dotée d'une technologie de pointe à savoir <span style="color: red">le surfaçage numérique << free form >> pour servir des verres de qualité en quantité et à petits prix.</span>
                  </p>
                  <p><img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" style="width: 40%">, c'est :</p>
                  <ol style="width: 89%; float: right;">
                    <li>La qualité (une technologie de pointe à votre service).</li>
                    <li>La quantité (un personnel accueillant, dynamique, qualifié et travailleur à votre écoute).</li>
                    <li>Le prix client (une prise en compte de facteurs socio-économique et diverses posibilités de paiement).</li>
                    <li>La livraison (72 heures max)</li>
                  </ol>
                  <label style="font-size: 13px; text-align: center;">>> PANAFRICAIN CONCEPTEUR FABRICANT DE VERRES OPTIQUES << </label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
                <a id="mu-abtus-video" href="https://www.youtube.com/embed/HN3pm9qYAUs" target="mutube-video">
                  <img src="<?= base_url('assets/img/logo.png'); ?>" alt="img">
                </a>                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->


  <!-- Start about us counter -->
  <section id="mu-abtus-counter" style="background-image: url('<?= base_url($breadcrumb); ?>'); 
   background-size: 100%;  float: left; width: 100%">
    <div class="container">
      <div class="row">
        <div class="mu-abtus-counter-area">
          <div class="row">
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-comments-o"></span>
                <h4 class="counter"><?= $nb_subjects; ?></h4>
                <p style="font-size: 15px">Subjets sur le forum</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-eye"></span>
                <h4 class="counter">

                <?= $average_visit; ?>

                </h4>
                <p style="font-size: 15px">Moyenne de visiteurs du site par jour</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-users"></span>
                <h4 class="counter"><?= $nbr_client; ?></h4>
                <p style="font-size: 15px">Clients et abonnés</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
              <div class="mu-abtus-counter-single no-border">
                <span class="fa fa-user-secret"></span>
                <h4 class="counter"><?= $nb_personals; ?></h4>
                <p style="font-size: 15px">Personnels / stagiaires par an.</p>
              </div>
            </div>
            <!-- End counter item -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start features section -->
  <section id="mu-features">
    <div class="container-fluid" style="width: 94%">
      <div class="mu-features-area">
        <!-- Start Title -->
        <div id="structDocs" class="mu-title">
          <h2>Structuration et documentation</h2>
          <embed src="<?= base_url('assets/pdf/Lunettes_les_différents_types.pdf') ?>" style="float: right; height: 10px; width: 200px"><!-- Lunettes_les_différents_types.pdf --></embed>
        </div>
        <!-- End Title -->
        <!-- Start features content -->
        <div class="mu-features-content row">

          <?php foreach ($structurationDocs->result_array() as $structurationDoc): ?>

          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 img-thumbnail" style=" height: 350px">
            <div class="mu-single-feature">
              <a href='<?= site_url('Bioluxoptical/readMore/'.$structurationDoc["id_issue"]); ?>'>
                <span class="<?=$structurationDoc['img_issue'] ?>"></span></i></a>
              
              <h4><?=$structurationDoc['title_rm'] ?></h4>
              <p style="text-align: justify;"><?= mb_strimwidth($structurationDoc['content'], 0, 80).'...'; ?></p>
              <label style="font-family: Gabriola; font-size: 17px">Mis à jour le :  
                <?= date("d/m/Y à H:i:s", strtotime( $structurationDoc['date_issue'])); ?>
              </label>
              <a href='<?= site_url('Bioluxoptical/readMore/'.$structurationDoc["id_issue"]); ?>'>
                En savoir <i class="fa fa-plus"></i>
              </a>
            </div>
          </div>

          <?php endforeach; ?>

        </div>
        <!-- End features content -->
      </div>
    </div>
  </section>
  <!-- End features section -->

<!-- <section id="mu-latest-courses"  style="background-image: url('assets/img/breadcrumb/bgr13.png'); background-size: 100%; display: inline; background-repeat: no-repeat; float: left;"> -->
<!-------------------------------------------------------->

      <?php include('common/lasts_out.php'); ?>

<!-------------------------------------------------------->

<!-- </section> -->

