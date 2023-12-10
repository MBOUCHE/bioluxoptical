 <!-- Start from blog -->
  <section id="mu-from-blog" style="margin-top: -4%">

            <!-- start title -->
        <div class="mu-title">
          <h2>NOS SERVICES</h2>
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

              <?php foreach ($other_services->result_array() as $other_service): ?>
            

              <div class=" col-lg-4 col-md-4 col-sm-6 col-sm-12">
                <article class="mu-blog-single-item">
                  <figure class="mu-blog-single-img">
                    <a href="#"><img class="img-thumbnail" style="height:242px; width: 100%" src="<?= base_url('assets/img/reason/');?><?= $other_service['img_reason']; ?>" alt="img"></a>
                    <figcaption class="mu-blog-caption">
                      <h6>
                        <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$other_service['id_reason']) ?>" class="list-group-item" style="border-radius: 0px;"><?= mb_strtoupper($other_service['name_reason']); ?>
                        </a>
                      </h6>
                    </figcaption>                  
                  </figure>
                  <div class="mu-blog-meta">
                    <span class="btn btn-info" style="width: 100%; border-radius: 0px">
                      <i class="fa fa-money"></i> Prix : <?= $other_service['price_reason'].' FCFA'; ?>
                    </span>
                    <?= strlen($other_service['origine_reason'])!=0 ? '<span><i class="fa fa-legal"></i> Garantie : '.$other_service['origine_reason'] : ''; ?></span>
                  </div>
                  <div class="mu-blog-description">
                    <p> <?= strlen($other_service['note_reason'])!=0 ? 'Remarque : '.$other_service['note_reason'] : ''; ?></p>
                  </div>
                </article>
              </div>


              <?php endforeach; ?>
                  

            </div>     
          <!-- end from blog content   -->


          <!-- start from blog content   -->
          <div class="mu-from-blog-area container"><hr>
            <h3 style="text-align: center;">SERVICES GENERIQUES</h3>
            <div class="row">
                
                <?php foreach ($generic_services->result_array() as $generic_service): ?>
              

                <div class=" col-lg-4 col-md-4 col-sm-6 col-sm-12">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$generic_service['id_reason']) ?>"><img class="img-thumbnail" style="height:242px; width: 100%" src="<?= base_url('assets/img/reason/');?><?= $generic_service['img_reason']; ?>" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h6>
                          <a href="#" class="list-group-item" style="border-radius: 0px;"><?= mb_strtoupper($generic_service['name_reason']); ?>
                          </a>
                        </h6>
                      </figcaption>                  
                    </figure>
                    <div class="mu-blog-meta">
                      <a href="#">Par <?= $this->db->select('first_name')->where('id_user', $generic_service['id_user'])->get('users')->row_object()->first_name; ?></a>
                      <a href="#"> le <?= date('d/m/Y', strtotime($generic_service['date_reg_reason'])) ?></a>
                      <span><i class="fa fa-comments-o"></i>87</span>
                    </div>
                    <div class="mu-blog-description">
                      <a class="mu-read-more-btn" href="#">En savoir <i class="fa fa-plus"></i></a>
                    </div>
                  </article>
                </div>


                <?php endforeach; ?>
                
            </div>  

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