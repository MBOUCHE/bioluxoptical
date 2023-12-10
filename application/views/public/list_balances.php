 <!-- Start from blog -->
  <section id="mu-from-blog" style="margin-top: -4%">

            <!-- start title -->
        <div class="mu-title">
          <h2>PRODUITS & SERVICES EN PROMOTION</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae quae vero ut natus. Dolore!</p>
        </div>
            <!-- end title -->
        <div class="mu-from-blog-area" style="text-align: justify;">


<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

              <?php include('common/right_sidebar.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->
          <div class="col-md-8 col-lg-8 col-sm-9">  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">

              <?php 
                foreach ($promotion_services->result_array() as $other_service): 
              ?>
            

              <div class="img-thumbnail col-lg-4 col-md-4 col-sm-6 col-sm-12">
                <article class="mu-blog-single-item">
                  <figure class="mu-blog-single-img">
                    <a href="#"><img class="img-thumbnail" style="height:242px; width: 100%" src="<?= base_url('assets/img/reason/');?><?= $other_service['img_reason']; ?>" alt="img"></a>
                    <figcaption class="mu-blog-caption">
                      <h6>
                        <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$other_service['id_reason']) ?>" class="btn btn-default" style="border-radius: 0px;">
                          <i class="fa fa-plus"></i> <?= mb_strtoupper($other_service['name_reason']); ?>
                        </a>
                      </h6>
                    </figcaption>                  
                  </figure>

                  <div class="mu-latest-course-single-contbottom">
                    <a class=" btn btn-info" style="border-radius: 0px; float: right;" href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$other_service['id_reason'])?>">
                      <i class=" fa fa-2x fa-shopping-cart"></i>
                    </a>
                    <span class="mu-course-price btn btn-primary" style="border-radius: 0px; float: right;  padding: 2px"><i class="fa fa-money"></i>
                      <?= $other_service['price_reason']; ?> FCFA
                    </span>
                    <span class="mu-course-price btn btn-default" style="border-radius: 0px; padding: 2px"><i class="fa fa-money"></i>
                      <s><?= $other_service['old_price']; ?></s> FCFA
                    </span>
                  </div>
                  <div class="mu-blog-description">
                    <?= strlen($other_service['origine_reason'])!=0 ? '<span><i class="fa fa-legal"></i> Origine : '.$other_service['origine_reason'] : ''; ?></span>
                  </div>

                </article>
              </div>


              <?php endforeach; ?>
            
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
          <!-- end from blog content   -->

          </div>


<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

              <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->
<!--</div> --> 
        </div>
  </section>
  <!-- End from blog -->