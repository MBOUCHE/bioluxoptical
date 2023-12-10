
   <div class="col-lg-12 col-md-12">
     <div class="mu-course-content-area">
        <div class="row">
<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

          <?php include('common/right_sidebar.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->
          <div class="col-lg-8 col-md-8" style="background-color: white">
            <!-- start course content container -->
            <div class="mu-course-container mu-blog-single">
              <div class="row">
                <div class="mu-comments-area container-fluid" style="margin-top: -1%">
                  <?php 

                    $categories = $db_results['categories']->result_array();

                    $sub_categories = $db_results['sub_categories']->result_array();

                    $communications = $db_results['communications']->result_array();

                    $materials = $db_results['materials']->result_array();

                    $propositions = $db_results['propositions']->result_array();

                    $reasons = $db_results['reasons']->result_array();

                    $storeshops = $db_results['storeshops']->result_array();

                    $total_results = 0;

                    $total_cat = 0; $total_s_cat = 0; $total_com = 0; $total_mat = 0;

                    $total_prop = 0; $total_rea = 0; $total_sto = 0;

                    if (!empty($categories)) {
                      foreach ($categories as $categorie) {
                        $total_results +=1;
                        $total_cat +=1;
                      }
                    }

                    if (!empty($sub_categories)) {
                      foreach ($sub_categories as $sub_category) {
                        $total_results +=1;
                        $total_s_cat +=1;
                      }
                    }

                    if (!empty($communications)) {
                      foreach ($communications as $communication) {
                        $total_results +=1;
                        $total_com +=1;
                      }
                    }

                    if (!empty($materials)) {
                      foreach ($materials as $material) {
                        $total_results +=1;
                        $total_mat +=1;
                      }
                    }

                    if (!empty($propositions)) {
                      foreach ($propositions as $proposition) {
                        $total_results +=1;
                        $total_prop +=1;
                      }
                    }

                    if (!empty($reasons)) {
                      foreach ($reasons as $reason) {
                        $total_results +=1;
                        $total_rea +=1;
                      }
                    }

                    if (!empty($storeshops)) {
                      foreach ($storeshops as $storeshop) {
                        $total_results +=1;
                        $total_sto +=1;
                      }
                    }

                  ?>

                  <?php if ($total_results == 0) : ?>

                    <h3>Aucun résultat associé à votre recherche.</h3>
                    <div class="comments">
                      <ul class="commentlist">
                        <li>Veuillez essayer avec des mots clés correspondants.</li>
                      </ul>
                    <div class="comments">
                  </div>
                  </div>

                  <?php else : ?>


                  <h3><?= ($total_results == 1 ) ? '(1) Résultat trouvé ' : '('.$total_results.') Résultats trouvés' ; ?> </h3>
                  <div class="comments">
                    <ul class="commentlist">
                    <?php if (!empty($categories)) : ?>
                      <li>
                        <h4>(<?= $total_cat ; ?>) Dans nos catégories de produits</h4>

                        <?php foreach ($categories as $categorie) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/category/');?><?= $categorie['img_cat'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                           <h4 class="author-name"><?= $categorie['label'];?></h4>
                           <span class="comments-date">Article : <?= $categorie['article'];?></span>
                           <p>Génération : <?= $categorie['generation'];?></p>
                           <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/listGlass2/'.$categorie['id_cat']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>

                      
                    <?php if (!empty($sub_categories)) : ?>
                      <li>
                        <h4>(<?= $total_s_cat ; ?>) Dans les détails sur les catégories </h4>

                        <?php foreach ($sub_categories as $sub_categorie) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/category/');?><?= $sub_categorie['img_sub_cat'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                            <h4 class="author-name"><?= $sub_categorie['label_c_cat'];?></h4>
                            <span class="comments-date">

                              <?php $his_cat = $this->db->select('id_cat, label, generation')->from('category')->where('id_cat', $sub_categorie['id_cat'])->get()->result_array(); ?>
                              De la Catégorie : <?= $his_cat[0]['label'];?> 
                            </span>
                            <p>Génération : <?= $his_cat[0]['generation'];?></p>
                            <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/listGlassOnly/'.$his_cat[0]['id_cat']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>



                    <?php if (!empty($reasons)) : ?>
                      <li>
                        <h4>(<?= $total_rea ; ?>) Dans nos produits et services divers</h4>

                        <?php foreach ($reasons as $reason) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/reason/');?><?= $reason['img_reason'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                           <h4 class="author-name"><?= $reason['name_reason'];?> </h4>
                           <span class="comments-date" style="color: green"><?= ($reason['origine_reason'] == '' ? '' : 'Origine :'. $reason['origine_reason']);?> </span>
                           <p>Description associée : <?= mb_strimwidth($reason['description_reason'], 0, 80).' ...';?></p>
                           <p>Remarque : <span style="color: red"><?= $reason['note_reason'];?></span> </p>
                           <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/serviceReadMore/'.$reason['id_reason']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>


                    <?php if (!empty($storeshops)) : ?>
                      <li>
                        <h4>(<?= $total_sto ; ?>) Dans la liste de nos magasins et ateliers</h4>

                        <?php foreach ($storeshops as $storeshop) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/storeshop/');?><?= $storeshop['building_img'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                            <!-- <?= $town = $this->db->select('name_town')->where('id_town', $storeshop['id_town'])->get('town')->result_array();?> -->
                           <h4 class="author-name"><?= $storeshop['description'];?></h4>
                           <span class="comments-date">Ville : <?= $town[0]['name_town'];?></span>
                           <label>Boite postale : <?= $storeshop['po_box'];?></label>
                           <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/detailsShore/'.$storeshop['id_mag']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>

                      
                    <?php if (!empty($communications)) : ?>
                      <li>
                        <h4>(<?= $total_com ; ?>) Dans les sujets de discution sur notre Forum</h4>

                        <?php foreach ($communications as $communication) : ?>

                        <div class="media">
                          <div class="media-left">
                            <kbd style="width: 200px;" class="img-thumbnail btn-success">
                              <a class="<?= $communication['img_com'];?>" style="color: white"><img src="<?= base_url('assets/img/communication/'.$communication['img_com']);?>" style="width: 100%" alt=""></a>
                              <h5 style="float: right;"><?= $communication['subject'];?></h5>
                            </kbd> 
                          </div>
                          <div class="media-body">
                            <h5 class="author-name">

                              <?php $his_user = $this->db->select('first_name')
                                                          ->from('users')
                                                          ->where('id_user', $communication['id_user'])
                                                          ->get()
                                                          ->result_array();?>

                              <?php $his_issuer = $this->db->select('fname_cost')
                                                          ->from('customer')
                                                          ->where('id_costomer', $communication['issuer_id'])
                                                          ->get()
                                                          ->result_array(); ?>

                              Date l'iniciation du sujet : <code>&lt;<?= $communication['date_init'];?>&gt;</code>. Par : <?= $his_user[0]['first_name'];?> .</p>
                            </h5>
                            <span class="comments-date" style="width: 100%">
                              Réponse de : <?= $his_issuer[0]['fname_cost'];?>
                              <pre style="float: right; text-align: justify;"> <?= mb_strimwidth($communication['content'], 0, 80).' ...';?>
                                
                              </pre>
                              <p style="text-align: center;">Sujet clos : <?= ($communication['date_end'] != null ) ? 'Oui, le : '. $communication['date_end'] : '<label style="color: red">pas encore.</label>';?></p>
                            </span>

                            <?php if($communication['pattern'] == 'FORUM'): ?>
                            <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/forum/'.$communication['id_com']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                            <?php endif; ?>

                            <?php if($communication['pattern'] == 'LIRE'): ?>
                            <a style="float: right;" class="reply-btn" href="<?= site_url('Bioluxoptical/readMore/'.$communication['id_com'].'/slide');?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                            <?php endif; ?>

                            <?php if($communication['pattern'] == 'FORUM_CONDICION'): ?>
                            <a style="float: left;" class="reply-btn" href="<?= site_url('Bioluxoptical/forum');?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                            <?php endif; ?>

                            <?php if($communication['pattern'] == 'CONSEIL'): ?>
                            <a style="float: left;" class="reply-btn" href="<?= site_url('Bioluxoptical/readMore/'.$communication['id_issue']);?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                            <?php endif; ?>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>

                    <?php if (!empty($materials)) : ?>
                      <li>
                        <h4>(<?= $total_mat ; ?>) Dans notre matériel à votre service</h4>

                        <?php foreach ($materials as $material) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/materials/');?><?= $material['img_mat'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                           <h4 class="author-name"><?= $material['name_mat'];?></h4>
                           <span class="comments-date">Description d'usage : <?= mb_strimwidth($material['desc_mat'], 0, 80).' ...';?></span>
                           <a style="float: right;" class="reply-btn" href="<?= $material['id_mat'];?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>

                    <?php if (!empty($propositions)) : ?>
                      <li>
                        <h4>(<?= $total_prop ; ?>) Dans nos propositions de services</h4>

                        <?php foreach ($propositions as $proposition) : ?>

                        <div class="media">
                          <div class="media-left">    
                            <img alt="img" src="<?= base_url('assets/img/propositions/');?><?= $proposition['img_prop'];?>" class="media-object news-img img-thumbnail" style="width: 100px;">
                          </div>
                          <div class="media-body">
                           <h4 class="author-name">Validité de la proposition : <?= ($proposition['duration_prop'] == 1) ? '1 jour restant.' : $proposition['duration_prop'].' jours restants';?></h4>
                           <span class="comments-date">Description : <?= mb_strimwidth($proposition['description_prop'], 0, 80).' ...';?></span>
                           <a style="float: right;" class="reply-btn" href="<?= $proposition['id_prop'];?>">Suivre ce résultat <span class="fa fa-long-arrow-right"></span></a>
                          </div>
                        </div>

                        <?php endforeach ?>

                      </li>
                    <?php endif ?>
                    
                    </ul>
                    <!-- comments pagination -->
                  </div>

                  <?php endif ?>

                </div>
              </div>
            </div>
          </div>
<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->
          <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->
          
       </div>
     </div>
   </div>