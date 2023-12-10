
<!-- Start menu -->
  <section id="mu-menu">
    <?php $bioluxoptical = $this->db->select('working_time1, working_time2, phone')->where('first_name', 'BIOLUXOPTICAL')->where('email', 'info@bioluxoptical.com')->get('users')->row_object(); ?>
    <nav class="navbar navbar-default" role="navigation"style=" font-family: 'Cambria';">  
      <p style="float: left; margin-left: 1%; font-size: 12px">
        <br>Lundi au Vendredi - 08h00 à 17h30 (<?= $bioluxoptical->working_time1.', '.$bioluxoptical->working_time2; ?>);
        <br>Samedi - 08h00 à 12h30. (<i class="fa fa-phone-o"></i> <?= $bioluxoptical->phone; ?>).
      </p>

      
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Barre de navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="dropdown <?php if ($sub_title == 'Accueil') echo 'active';?>">
              <a class="fa fa-2x fa fa-home" data-toggle="dropdown" href="<?= site_url(); ?>"></a>
              <ul class="dropdown-menu" role="menu" style="padding: 8px">
                <li><a href="<?= base_url()?>">accueil</a></li> 
                <li><a href="<?= base_url()?>#about">à propos de nous</a></li>          
                <li><a href="<?= base_url()?>#last_out">Soldes et nouveautés</a></li>               
                <li><a href="<?= base_url()?>#opticians">nos opticiens lunettiers</a></li>        
                <li><a href="<?= base_url()?>#testimonies">Témoignages de nos clients</a></li>                
              </ul>
            </li> 

            <li class="dropdown <?php if ($sub_title == 'Lunettes' or $sub_title == 'Montures' or $sub_title == 'Verres') echo 'active';?>">

              <a href="<?= site_url('/listGlass'); ?>" 
                class="<?php if (($sub_title == 'Lunettes') or ($sub_title == 'Verres') or ($sub_title == 'Montures')) echo 'dropdown-toggle active';?>" data-toggle="dropdown">Lunettes <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu" style="margin-right: -458%">
                <div class="container">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2">
                    <li>
                      <hr>
                      <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('/listGlass'); ?>" class="list-group-item">
                        <h5>apperçu en <label style="color: green">boutique</label>.</h5>
                        <img src="<?= base_url('assets/img/presentation.png');?>" alt="stock" style="width: 100%" class="img-thumbnail">
                      </a>
                    </li>

                    <li>
                      <hr>
                      <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('/balances'); ?>" class="list-group-item">PRODUITS & SERVICES EN PROMOTION 
                        <img style="width: 100%;" src="<?= base_url('assets/img/promotion.png');?>" alt="stock" style="width: 100%" class="img-thumbnail">
                      </a>
                    </li>
                  </div>

                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-9">
                    <br>Nos Lunnettes : <hr>
                    <?php foreach ($categories->result_array() as $categorie): ?>
                    <div class="row">
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <a href="<?= site_url('Bioluxoptical/listGlass2/'.$categorie['id_cat'])?>" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                          <?= $categorie['label']; ?>
                        </a>
                        <?php foreach ($sub_categories->result_array() as $sub_categorie): ?>
                        <?php if ($categorie['id_cat'] == $sub_categorie['id_cat']) : ?>

                          <li>
                            <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('Bioluxoptical/listGlass2/'.$categorie['id_cat'].'/'.$sub_categorie['label_c_cat'])?>" class="list-group-item"><?= $sub_categorie['label_c_cat']; ?></a>
                          </li>

                        <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <img style="width: 100%; height: 141px" src="<?= base_url('assets/img/category/').$categorie['img_cat'];?>" class="list-group img-responsive" alt="img"/>
                      </div>
                    </div>
                      <?php endforeach; ?>
                  </div>

                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-9">
                    <br>Nos montures : <hr>
                    <?php foreach ($categories->result_array() as $categorie): ?>
                    <div class="row">
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <a href="<?= site_url('Bioluxoptical/getMounts/'.$categorie['id_cat'])?>" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                          <?= $categorie['label']; ?>
                        </a>
                        <?php foreach ($sub_categories->result_array() as $sub_categorie): ?>
                        <?php if ($categorie['id_cat'] == $sub_categorie['id_cat']) : ?>

                          <li>
                            <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('Bioluxoptical/getMounts/'.$categorie['id_cat'].'/'.$sub_categorie['label_c_cat'])?>" class="list-group-item"><?= $sub_categorie['label_c_cat']; ?></a>
                          </li>

                        <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <img style="width: 100%; height: 141px" src="<?= base_url('assets/img/category/').$categorie['img_cat'];?>" class="list-group img-responsive" alt="img"/>
                      </div>
                    </div>
                      <?php endforeach; ?>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-9">
                    <br>Nos verres : <hr>
                    <?php foreach ($Scategories->result_array() as $Scategorie): ?>
                    <div class="row">
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <a href="<?= site_url('Bioluxoptical/listGlassOnly/'.$Scategorie['id_cat'])?>" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                          <?= $Scategorie['label']; ?>
                        </a>
                        <?php foreach ($Ssub_categories->result_array() as $Ssub_categorie): ?>
                        <?php if ($Scategorie['id_cat'] == $Ssub_categorie['id_cat']) : ?>

                          <li>
                            <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('Bioluxoptical/listGlassOnly/'.$Scategorie['id_cat'].'/'.$Ssub_categorie['label_c_cat'])?>" class="list-group-item"><?= $Ssub_categorie['label_c_cat']; ?></a>
                          </li>

                        <?php endif; ?>

                          
                        <?php endforeach; ?>
                      </div>
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <img style="width: 100%; height: 141px" src="<?= base_url('assets/img/category/').$Scategorie['img_cat'];?>" class="list-group img-responsive" alt="img"/>
                      </div>
                    </div>
                      <?php endforeach; ?>
                  </div>

                </div>           
              </ul>
            </li>
            <li class="dropdown <?php if ($sub_title == 'Magasins') echo 'active';?>">
              <a href="<?= base_url('Bioluxoptical/listStoreShop')?>" class="dropdown-toggle " data-toggle="dropdown">Magasins <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu" style="margin-right: -359%">
                <div class="container">
                  <div class="row">
                    <ul class="col-lg-3 col-md-4 col-sm-12 col-xs-12">

                      <li>
                        <hr>
                        <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= base_url('listStoreShop') ?>" class="list-group-item">
                          <h5>Les Magasins <label style="color: green">biolux optical</label></h5>
                          <img src="<?= base_url('assets/img/storeshop/store_shop.png');?>" alt="stock" style="width: 100%" class="img-thumbnail">
                        </a>

                        <label style="margin-top: 8%; text-align: justify;">
                          DOUALA - Sis à ancien Dalip, marché Dalip immeuble BIOLUX OPTICAL. 
                        </label>
                      </li>

                    </ul>
                    <ul class="list-group">
                    <br>Nos magasins par pays : <hr>
                    <?php foreach ($towns->result_array() as $town): ?>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-3" style="float: left;">
                      <a href="#" class="list-group-item active" style="border-radius: 0px; padding: 1%; width: 101%">
                        <?= $town['name_town']; ?> - <?=  $town['name_country']; ?>
                      </a>
                      <?php foreach ($storeshops->result_array() as $storeshop): ?>

                        <?php if ($town['id_town'] == $storeshop['id_town']) : ?>
                        <li style="text-align: center;width: 101%">
                          <a href="<?= site_url('Bioluxoptical/detailsShore/'.$storeshop['id_mag'].'');?>" class="list-group-item" style="border-radius: 0px; padding: 1%">
                            <?= $storeshop['description']; ?><br>
                            <?= $town['num_zone']; ?> <?=  $storeshop['phone_ss']; ?>
                          </a>
                        </li>
                        <?php endif; ?>

                      <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                    </ul>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6" style="float: left;">
                      <hr>
                      <h4 style="color: green">Paiements</h4>

                      <ul>

                        <?php foreach ($operators->result_array() as $operator): ?>

                        <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding: 1px">
                          <a class=" img-thumbnail" href="<?= site_url('Bioluxoptical/detailsPayment/'.$operator['id_prov']) ?>" style="width: 100%; text-align: left">
                          <img class="img-rounded" style="float: right;width: 71px; height: 44px; padding: 0%" src="<?= base_url('assets/img/') ?>pay/<?= $operator['img_logo']; ?>" alt="logo">
                          <?= $operator['name_prov']; ?></a>
                        </li>
                        <?php endforeach; ?>
                      
                      </ul>
                        
                    </div>
                  </div>
                </div>          
              </ul>
            </li>



            <li class="dropdown <?php if ($sub_title == 'Services') echo 'active';?>">
              <a href="<?= site_url('/services'); ?>" class="dropdown-toggle " data-toggle="dropdown">Services <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu" style="margin-right: -283%">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">

                      <li>
                        <hr>
                        <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('Bioluxoptical/services'); ?>" class="list-group-item">
                          <h5><label style="color: green">biolux optical</label> : Un personnel pationné et une ribambelle de clients satisfaits</h5>
                          <img src="<?= base_url('assets/img/reason/serv.JPG'); ?>" style="width: 100%" class=" img-responsive img-thumbnail">
                        </a>
                      </li>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="mu-footer-widget">
                        <br>Nos services génériques : <hr>
                        <?php foreach ($generic_services->result_array() as $generic_service): ?>
                        <div class="list-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                          <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$generic_service['id_reason']) ?>" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                            <?= $generic_service['name_reason']; ?>
                          </a>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <br>Autres services : <hr>
                      <?php foreach ($other_services->result_array() as $other_service): ?>
                      <div class="list-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$other_service['id_reason']) ?>" class="list-group-item" style="border-radius: 0px; padding: 1%">
                          <?= $other_service['name_reason']; ?>
                        </a>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>  
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float: right;">
                  <hr><h4 style="color: green">Partenaires</h4>
                  <ul>
                    <?php foreach ($partners->result_array() as $partner): ?>

                    <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding: 1px">
                      <a class=" img-thumbnail" href="<?= site_url('Bioluxoptical/detailsPayment/'.$partner['id_prov']) ?>" style="width: 100%; text-align: left">
                        <img class="img-rounded" style="float: right;width: 71px; height: 44px; padding: 0%" src="<?= base_url('assets/img/') ?>pay/<?= $partner['img_logo']; ?>" alt="logo">
                        <?= $partner['name_prov']; ?>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  
                  </ul>                    
                </div>         
              </ul>
            </li>


            <li class="dropdown <?php if ($sub_title == 'Forum') echo 'active';?>">
              <a href="<?= site_url('/forum'); ?>" class="dropdown-toggle " data-toggle="dropdown">Forum <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu" style="margin-right: -229%">
                <div class="container">
                  <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">

                      <li>
                        <hr>
                        <a style="border-radius: 0px; text-align: center; padding: 1%" href="<?= site_url('/forum'); ?>" class="list-group-item">
                          <h5><label style="color: green">biolux optical</label> : Un personnel pationné et une ribambelle de clients satisfais</h5>
                          <img class=" img-responsive img-thumbnail" src="<?= base_url('assets/img/communication/'.$forum_page->img_com);?>" style="width: 100%;">
                        </a>
                      </li>

                      <li style="margin: 4%;">
                        <a style="text-align: justify; padding: 4px" href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank" class="list-group-item">Rejoignez nous sur Facebook</a>
                      </li>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                      <div class="mu-footer-widget">
                        <br>Consultez : <hr>
                        <div class="list-group">
                          <a href="#" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                            Sujets clos 
                          </a>
                        </div>
                        <div class="list-group">
                          <a href="<?= site_url('/forum'); ?>" class="btn-info" style="border-radius: 0px; padding: 1%">
                            Sujets non closes
                          </a>
                        </div>

                        <div class="list-group">
                          <a href="<?= site_url('Bioluxoptical/received_subject');?>" class="btn-info" style="border-radius: 0px; padding: 2%; text-align: justify;">
                            Sujets récurents
                          </a>
                        </div>

                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                      <div class="mu-footer-widget">
                        <br>Vos posibilités : <hr>
                        <div class="list-group">
                          <a href="#" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                            Proposer un sujet 
                          </a>
                        </div>
                        <div class="list-group">
                          <a href="#" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                            Proposer ... 
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                      <div class="mu-footer-widget">
                        <br>Vos posibilités : <hr>
                        <div class="list-group">
                          <a href="<?= site_url('Bioluxoptical/propose');?>" class="btn-info" style="border-radius: 0px; padding: 2%; text-align: justify;">
                            Proposer un sujet sur le Forum 
                          </a>
                        </div>
                        <div class="list-group">
                          <a href="<?= base_url('Bioluxoptical/contact/TEMOIGNAGE') ?>" class="btn-info" style="border-radius: 0px; padding: 1%">
                            Témoigner 
                          </a>
                        </div>
                        <div class="list-group">
                          <a href="#" class="list-group-item active" style="border-radius: 0px; padding: 1%">
                            Réserver une consultation
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>           
              </ul>
            </li>


            <li class="dropdown <?php if (($sub_title == 'Conseils') or ($sub_title == 'Essayage') or ($sub_title == 'Autres')) echo 'active';?>">
              <a href="#" class=""> <i class="fa fa-plus"></i> . <i class="fa fa-crosshairs"></i> . <i class="fa fa-eye"></i> <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu " role="menu" style="padding: 8px">
                <li><a href="<?= site_url('Bioluxoptical/advise');?>"> Conseil</a></li> 
                <li><a href="<?= site_url('Bioluxoptical/attempt');?>"> Essayage en ligne</a></li> 
                <li><a href="<?= site_url('Customer/CustomerPanel/consult');?>"> Consultation en ligne</a></li>
                <li><a href="<?= site_url('Customer/CustomerPanel/personalyzed');?>"> Commande personnalisée</a></li>                             
              </ul>
            </li>

            <li class="<?php if (($sub_title == 'contact') or ($sub_title == 'testimonie')) echo 'active';?>"><a href="<?= site_url('bioluxoptical/contact'); ?>">Contact</a></li> 
             <!--<li>
              <a style="font-size: 22px; float: right; " href="#" id="mu-search-icon">
                <i class="fa fa-search"></i>
              </a>  
            </li> -->
          </ul>                     
        </div><!--/.nav-collapse -->
                
      </div>     
    </nav>
  </section>
  <!-- End menu -->
