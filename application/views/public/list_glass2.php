
 <!-- Start gallery  -->
  <div class="mu-title"><br>
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
      <h2><?= $sub_title .' - '. $category->label; ?> </h2>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-4 col-xs-4">
      <p><?= $presentation; ?> </p>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
      <img style="float: right; width: 100%" src="<?= base_url('assets/img/category/'.$category->img_cat) ?>">
    </div>
  </div>
 <section id="mu-gallery" style="margin-top: -4%">

  <?php include('home/sidebar_services.php'); ?>


     <div class="col-lg-8 col-md-8 col-sm-7 col-xm-12">
       <div class="mu-gallery-area">
        <!-- end title -->
        <!-- start gallery content -->
        <div class="mu-gallery-content" style="background-image: url('<?= base_url($vitrine); ?>'); 
   background-size: 100%; display: inline; float: left; width: 100%">
          <!-- Start gallery menu -->
          <div class="mu-gallery-top">              
            <ul>
              <li class="filter active" data-filter="all">Tout </li>

              <?php foreach ($categories->result_array() as $categorie): ?>
                
                <li class="filter active" data-filter=".<?= $categorie['label_c_cat']; ?>">
                  <?= $categorie['label_c_cat']; ?>
                </li>

              <?php endforeach; ?>

            </ul>
          </div>
          <!-- End gallery menu -->
          <div class="mu-gallery-body">
            <ul id="mixit-container" >
              <?php foreach ($categories->result_array() as $categorie): ?>
                
                <?php foreach ($reasons->result_array() as $reason): ?>
                  <?php if ($categorie['id_sub_cat'] == $reason['id_sub_cat']) : ?>

              
              <li class="col-md-4 col-sm-6 col-xs-12 mix <?php if(!is_null($label_c_cat) and $label_c_cat ==$categorie['label_c_cat']) echo($label_c_cat); elseif ($categorie['id_sub_cat'] == $reason['id_sub_cat']) echo $categorie['label_c_cat'] ; ?>">
                <div class="mu-single-gallery">                  
                  <div class="mu-single-gallery-item">
                    <div class="mu-single-gallery-img">
                      <a href="#"><img alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img_reason']; ?>"></a>
                    </div>
                    <div class="mu-single-gallery-info">
                      <div class="mu-single-gallery-info-inner" style="padding: px">
                        <h4><?= $reason['name_reason']; ?></h4>
                        <p>Origine : <?= $reason['origine_reason']; ?></p>
                        <p><?= $reason['code_reason']; ?> <i style="float: right;"><?= $reason['price_reason']; ?> FCFA</i></p>
                        <a href="<?= base_url('assets/img/reason/');?><?= $reason['img2_reason']; ?>" data-fancybox-group="gallery" class="fancybox">
                        <span class="fa fa-eye"></span></a>
                        <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$reason['id_reason']) ?>" class="aa-link"><span class="fa fa-plus"></span></a>
                        <a href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$reason['id_reason'])?>" class="aa-link">
                          <span class="fa fa-shopping-cart"></span>
                        </a>
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
        <!-- end gallery content -->

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
         

      <?php include('common/categories_list.php'); ?>

<!--</div> -->
   </div>
 </section>
 <!-- End gallery  -->
