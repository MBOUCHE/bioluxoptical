<section id="mu-course-content">
   <div class="row">
     <div class="col-lg-12 col-md-12  col-sm-12">
       <div class="mu-course-content-area">
            <?php include('common/right_sidebar.php'); ?>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- start course content container -->
            <div class="mu-course-container mu-blog-single">
              <div class="row">
                  <article class="mu-blog-single-item">
                      <div class="col-lg-3 col-md-3  col-sm-3" style="text-align: center; ">
<!-- 
                        <?php if (strlen($rm_results[0]['img_com']) < 8) {
                            echo '<img style="width=100%" src="'.base_url('assets/img/slider/').$rm_results[0]['img_com'].'"/>';
                          };
                        ?> -->
                        <span class="col-lg-12 col-md-12  col-sm-12 img-thumbnail fa-5x <?= strlen($rm_results[0]['img_com']) < 7 ? 'fa fa-book' : $rm_results[0]['img_issue']; ?> ">
                        </span>
                      </div>
                      <div class="col-md-6" style="text-align: center;">
                          <h4><?= mb_strtoupper($rm_results[0]['title_rm']); ?></h4>
                          <label></label>
                          <span style="color: green; margin-right: 8%">Mis à jour le : <?= date("d/m/Y à H:i:s", strtotime( $rm_results[0]['date_issue'])); ?></span>
                      </div> 

                      <div class="col-lg-3 col-md-3  col-sm-3" style="text-align: center;">

                        <span style="" class="col-lg-12 col-md-12  col-sm-12 img-thumbnail fa-5x <?= strlen($rm_results[0]['img_com']) < 7 ? 'fa fa-file-text' : $rm_results[0]['img_com']; ?>"></span>

                      </div>

                      <div class="mu-blog-description">
                        <blockquote>
                          <p><?= $rm_results[0]['content']; ?></p>                            
                        </blockquote>
                        
                      </div>

                    <!-- End blog social share -->
                  </article>                                  
              </div>
            </div>


            <!-- end respond form -->
          </div>
            
            <?php include('common/categories_list.php'); ?>

        </div>
      </div>
    </div>
 </section>