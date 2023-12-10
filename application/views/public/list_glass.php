 
<!-- start title -->

<?php include('common/sub_head.php'); ?>

<!-- end title -->
<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

  <section id="mu-gallery" style="margin-top: -100px">
    <div class="mu-gallery-area">

    <?php include('common/right_sidebar.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->
      <div class="col-md-8"  style="margin-top: -4%">
          <!-- start gallery content -->
            <div class="mu-gallery-content">
            <!-- Start gallery menu -->
              <div class="mu-gallery-top">              
                <ul>
                  <li class="filter active" data-filter="all">Tout</li>

                  <?php foreach ($categories->result_array() as $categorie): ?>
                    
                    <li class="filter active" data-filter=".<?= $categorie['label']; ?>">
                      <?= $categorie['label']; ?>
                    </li>

                  <?php endforeach; ?>

                </ul>
              </div>
              <!-- End gallery menu -->
              <div class="mu-gallery-body">
                <ul id="mixit-container" class="row">
                  <?php foreach ($categories->result_array() as $categorie): ?>
                  
                    <?php foreach ($reasons->result_array() as $reason): ?>
                      <?php if ($categorie['id_cat'] == $reason['id_cat_reason']) : ?>


                  <li class="col-md-4 col-sm-6 col-xs-12 mix <?php if ($categorie['id_cat'] == $reason['id_cat_reason']) echo $categorie['label'] ; ?>">
                    <div class="mu-single-gallery">                  
                      <div class="mu-single-gallery-item">
                        <div class="mu-single-gallery-img">
                          <a href="#"><img alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img_reason']; ?>"></a>
                        </div>
                        <div class="mu-single-gallery-info">
                          <div class="mu-single-gallery-info-inner" style="padding: 4px">
                            <h4><?= $reason['name_reason']; ?></h4>
                            <p>Origine : <?= $reason['origine_reason']; ?></p>
                            <p><?= $reason['code_reason']; ?> <i style="float: right;"><?= $reason['price_reason']; ?> FCFA</i></p>
                            <a href="<?= base_url('assets/img/reason/');?><?= $reason['img2_reason']; ?>" data-fancybox-group="gallery" class="fancybox">
                            <span class="fa fa-eye"></span></a>
                            <a href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$reason['id_reason'])?>"><span class="fa fa-shopping-cart"></span></a>
                          </div>
                        </div>                  
                      </div>
                    </div>
                  </li>

                    <?php endif; ?>

                  <?php endforeach; ?>

                <?php endforeach; ?> 

                </ul>            
              </div>         
              </div>
            <!-- start pagination -->
            <div class="mu-pagination">
              <nav>
                <ul class="pagination">
                  <?= $html_pagination; ?>
                </ul>
              </nav>
            </div>
            <!-- end pagination -->
          </div>
            <!-- end gallery content -->

<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

      <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->

<!-------------------------------------------------------->

      <?php include('common/lasts_out.php'); ?>

<!-------------------------------------------------------->
          </section>
          <!-- End gallery  -->
        </div>

<!-- </section> -->

