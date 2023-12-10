

            <!-- start title -->

   <div class="col-md-12"><br>
     <div class="mu-course-content-area">
<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

              <?php include('common/right_sidebar.php'); ?>

<!-------------------------------------------------------->
          <div class="col-lg-8 col-md-9">

            <div class="mu-title">
              <h2>Nos magasins / nos points de vente / et nos points de livraison </h2>
               <p>Grace à nos boutiques en ligne, vous pouvez choisir et payer des articles comme dans nos
              magasin réel. <br> Pour acheter un produit, il suffit de
              choisir les produits désirés puis de les mettre dans votre panier d'achat.</p>
            </div>
            <!-- start course content container -->
            <div class="mu-course-container">
              <div class="row">
                <?php if (sizeof($storeshops->result_array()) == 0) : ?>

                  <p style="text-align: center">En attente de traitement.</p>

                <?php else : ?>

                  <?php foreach ($storeshops->result_array() as $storeshop): ?>

                  <div class="col-md-4 col-sm-4">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="<?= base_url('Bioluxoptical/detailsShore/').$storeshop['id_mag'];?>">
                          <img src="<?= base_url('assets/img/storeshop/').$storeshop['building_img']; ?>" alt="img" style="width: 100%; height: 300px" class="img-thumbnail">
                        </a>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <a href="#"><?= $storeshop['description']; ?></a>
                        <div class="mu-latest-course-single-contbottom">
                          <?php $num_zone = $this->db->select('num_zone')->from('country')->where('id_town', $storeshop['id_town'])->join('town', 'town.id_country = country.id_country')->get()->result_array(); ?>
                          Service client : <span style="color: lightblue"><?= $num_zone[0]['num_zone'].' '.$storeshop['phone_ss']; ?></span>
                          <a href="<?= base_url('Bioluxoptical/detailsShore/').$storeshop['id_mag'];?>" type="button" class="btn btn-primary" style="border-radius: 0px; float: right;">
                            <i class="fa fa-eye"></i> Visitez
                          </a>
                        </div>
                      </div>
                    </div> 
                  </div>

                  <?php endforeach; ?>

                <?php endif ?>
              </div>
            </div>
            <!-- end course content container -->
            <!-- start course pagination -->
            <div class="mu-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span class="fa fa-angle-left"></span> Prev 
                    </a>
                  </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                     Next <span class="fa fa-angle-right"></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end course pagination -->
          </div>



<!-- la div insérée pour être généralisée : à ne pas toucher -->

<!-------------------------------------------------------->

          <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->

     </div>
     
   </div>
 </section>