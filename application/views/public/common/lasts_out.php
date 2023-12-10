


  <!-- Start latest course section -->
  <section id="mu-latest-courses"  style="background-image: url('<?= base_url('assets/img/breadcrumb/bgr13.png'); ?>'); background-size: 100%; display: inline; background-repeat: no-repeat; float: left;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12" >
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2 id="last_out">
                <label style="color: orange">Soldes</label> et 
                <label style="color: green">Dernières sorties</label>
              </h2>
             <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p> -->
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">

              <?php foreach ($lasts_out->result_array() as $last_out) : ?>

                
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <ul>
                      <li class="dropdown" style=" border-radius: 0px;">

                        <a class="dropdown-toggle btn btn-primary fa-5x fa fa-eye" data-toggle="dropdown" style="border-radius: 0px;" href="#"></a>

                        <ul id="products-menu" class="dropdown-menu" role="menu" style="width: 100%">
                          <div class="container" style="width: 100%">
                            <img style="height: 202px;" src="<?= base_url('assets/img/reason/').$last_out['img2_reason']; ?>" alt="img">

                            <span><?= (strlen($last_out['generation'])!=0) ? 'Génération : '.$last_out['generation'] : ''; ?></span><br>
                            <p>Remarque : <?= $last_out['note_reason']; ?></p>
                            <span><?= (strlen($last_out['description_reason'])!=0) ? 'Description : '.$last_out['description_reason'] : ''; ?></span><br>

                          </div>
                        </ul>
                      </li>
                    </ul>
                    <a href="#"><img style="height: 161px" src="<?= base_url('assets/img/reason/').$last_out['img_reason']; ?>" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="#">Garantie : <?= $last_out['origine_reason']; ?> <br> Raison : <?= $last_out['name_type']; ?></a>
                      <span><i class="fa fa-clock-o"></i>Durée : du <?= date("d/m/Y", strtotime( $last_out['date_manufacturate'])); ?> au <?= date("d/m/Y", strtotime( $last_out['date_experation'])); ?></span>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <h4><a href="#"><?= $last_out['name_reason']; ?></a></h4>
                  </div>

                  <div class="mu-latest-course-single-contbottom">
                    <a class="mu-course-details btn btn-success fa-5x fa fa-shopping-cart" style="border-radius: 0px; float: right;" href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$last_out['id_reason'])?>">
                    </a>
                    <span class="mu-course-price btn btn-primary" style="border-radius: 0px; float: right; margin-right: 2%; padding: 4px" href="#">
                      <?= $last_out['price_reason']; ?> FCFA
                    </span>
                    <span class="mu-course-price btn btn-danger" style="border-radius: 0px; float: right; margin-right: 2%; padding: 4px" href="#">
                      <s><?= $last_out['old_price']; ?></s> FCFA
                    </span>
                  </div>
                </div>
              </div>


              <?php endforeach; ?>

            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->