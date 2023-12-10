<section id="mu-course-content">
   <div class="row">
     <div class="col-lg-12 col-md-12  col-sm-12">
       <div class="mu-course-content-area">
            
            <?php include('common/left_sidebar_forum.php'); ?>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- start course content container -->
            <div class="mu-course-container mu-blog-single">
              <div class="row">
                  <article class="mu-blog-single-item">
                      <div class="col-lg-3 col-md-3  col-sm-3" style="text-align: center; ">
                        <img style="width:100%" src="<?= base_url('assets/img/category/'.$reason->img_cat) ?>"/>
                        <?= mb_strtoupper($reason->label); ?>
                      </div>
                      <div class="col-md-6" style="text-align: center;">
                          <h4><?= mb_strtoupper($reason->name_reason); ?><i style="float: right;"><?= $reason->price_reason; ?> FCFA</i></h4>
                          <span style="color: green; margin-right: 8%"> <br>Mis à jour le : <?= date("d/m/Y à H:i:s", strtotime($reason->date_reg_reason)); ?></span>
                          <img class="img-thumbnail" style="width:100%" src="<?= base_url('assets/img/reason/'.$reason->img_reason) ?>"/>
                      </div> 

                      <div class="col-lg-3 col-md-3  col-sm-3" style="text-align: center;">
                        <img style="width:100%" src="<?= base_url('assets/img/category/'.$reason->img_sub_cat) ?>"/>
                        <?= mb_strtoupper($reason->label_c_cat); ?>
                        <?php 
                          $name_type = $this->db->where('name_type !=', 'SERVICE')->where('name_type !=', 'GENERIQUE')->get('type_reason')->result_array();
                          $bool = false;
                          foreach ($name_type as $key) {
                            if($reason->type_reason == $key['id_type']){
                              $bool = true;
                            }
                          }
                        ?>
                        <?php //var_dump($bool); ?>
                        <?php if($bool): ?>
                        <hr>
                        <a href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$reason->id_reason)?>" class="aa-link">Ajouter
                          <span class="fa fa-5x fa fa-shopping-cart"></span>
                        </a>
                        <?php endif; ?>
                      </div>

                      <div class="mu-blog-description">
                        <blockquote>
                          <p>Remarque : <?= $reason->note_reason; ?></p>                            
                        </blockquote>
                        <h1>Description associée :</h1>
                        <div class="col-lg-6 col-md-6">
                          <p><?= $reason->description_reason; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <img class="img-thumbnail" style="width:100%" src="<?= base_url('assets/img/reason/'.$reason->img2_reason) ?>"/>
                        </div>
                      </div>

                    <!-- End blog social share -->
                  </article>

              </div>
            </div>


            <!-- end respond form -->
          </div>
            
            <?php include('common/right_sidebar.php'); ?>

        </div>
      </div>
    </div>
 </section>