
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="<?= site_url('Profile/manage');?>">
              <img src="<?= base_url('assets/img/'.$this->session->userdata['auth_user']['profile_img']);?>" class="img-thumbnail" style="width: 89%">
            </a>
          </p>
          <h5 class="centered">
            <?= $this->session->userdata['auth_user']['username']; ?>
          </h5>
          <li class="mt">
            <a class="<?= (isset($manage) and $manage=='dashbord') ? 'active' : '' ?>" href="<?= base_url('admin/ControlPanel/index');?>">
              <i class="fa fa-windows fa fa-2x"></i>
              <span><?= strtoupper('Panel de contrôle') ?></span>
            </a>
          </li>
          <li class="sub-menu">
            <a class=" <?= (isset($manage) and $manage=='manage') ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-desktop fa fa-2x"></i>
              <span>GESTIONS</span>
            </a>
            <ul class="sub">
              <li class=" <?= (isset($sub_manage) and $sub_manage=='storeshop') ? 'active' : '' ?>">
                <a class="" href="<?= site_url('admin/ControlPanel/storesShop');?>">
                <span class="fa fa-building-o fa fa-2x"></span> <span style="float: right; margin-right: 8%">MAGASINS</span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='reason') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/ControlPanel/reason');?>">
                <span class="fa fa-dropbox fa fa-2x"></span> </span><span style="float: right; margin-right: 8%">OFFRES </span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='staffs') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/ControlPanel/personal');?>">
                <span class="fa fa-user-o fa fa-2x"></span> </span><span style="float: right; margin-right: 8%">PERSONNELS </span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='material') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/ControlPanel/material');?>">
                <span class="fa fa-medkit fa fa-2x"></span> </span><span style="float: right; margin-right: 8%">MATERIEL </span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='customer') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/ControlPanel/customer');?>">
                <span class="fa fa-users fa fa-2x"></span> <span style="float: right; margin-right: 8%">CLIENTS</span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='provider') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/C_Provider');?>">
                <span class="fa fa-money fa fa-2x"></span> <span style="float: right; margin-right: 8%">PARTENAIRES</span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='order') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/C_StoreShop/controlOrder');?>">
                <span class="fa fa-shopping-cart fa fa-2x"></span> <span style="float: right; margin-right: 8%">COMMANDES</span>
                </a>
              </li>

              <li class=" <?= (isset($sub_manage) and $sub_manage=='mesure') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/C_StoreShop/controlOrderMesure');?>">
                <span class="fa fa-2x fa-text-height"></span> <span class="fa fa-text-width"></span><span style="float: right; margin-right: 8%">SUR-MESURES</span>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a class=" <?= (isset($manage) and $manage=='storesShop') ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-hospital-o fa fa-2x"></i>
              <span>MAGASINS</span>
              </a>
            <ul class="sub">                

              <?php foreach ($stores_shop->result_array() as $store_shop): ?>

              <li class=" <?= (isset($manage) and $sub_manage==$store_shop['name']) ? 'active' : '' ?>">
                

                  <a href="<?= site_url('admin/C_StoreShop/workshop/'.$store_shop['id_mag']);?>">
                    <span class="fa fa-building-o fa fa-2x"></span> <span style="float: right; margin-right: 8%"><?= $store_shop['name']; ?>
                  </a>

                
              </li>
              
              <?php endforeach ?>


              </ul>
          </li>
          <li class="sub-menu">
            <a class="<?= (isset($manage) and $manage=='reason') ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>ARTICLES & SERVICES</span>
              </a>
            <ul class="sub">
              <li class="<?= (isset($sub_manage) and $sub_manage=='category') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/category');?>"><i class="fa fa-tag"></i> Catégories </a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='sub_category') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/sub_category');?>"><i class="fa fa-tags"></i> Sous-catégories</a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='attempt') ? 'active' : '' ?>"><a href="chartjs.html"><i class="fa fa-stethoscope"></i> Essayages</a></li>

              <li class="<?= (isset($sub_manage) and $sub_manage=='consultations') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/consultations');?>"><i class="fa fa-user-md"></i> Consultations</a></li>

            </ul>
          </li>
          <li class="sub-menu">
            <a class="<?= (isset($manage) and $manage=='site') ? 'active' : '' ?>" href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>FONCTIONNEMENT</span>
            </a>
            <ul class="sub">
              <li class="<?= (isset($sub_manage) and $sub_manage=='slide') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic');?>"><i class="fa fa-list-ol"></i> Slide & Acceuil</a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='legal') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/legal');?>"><i class="fa fa-clipboard"></i> Présentation & achats</a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='Struc_docs') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/StrucDocs');?>"><i class="fa fa-file-text"></i> Structuration & Docs</a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='forum') ? 'active' : '' ?>"><a href="<?= base_url('admin/C_Forum');?>"><i class="fa fa-comments-o"></i> Forums</a></li>

              <li class="<?= (isset($sub_manage) and $sub_manage=='advise') ? 'active' : '' ?>"><a href="<?= base_url('admin/ControlPublic/advise');?>"><i class="fa fa-thumbs-o-up"></i> Conseils</a></li>
              <li><a href="<?= base_url('admin/ControlPublic/Testimonial');?>"><i class="fa fa-heart-o"></i> Témoignages & likes</a></li>
              <li class="<?= (isset($sub_manage) and $sub_manage=='mesure') ? 'active' : '' ?>"><a href="<?= site_url('admin/ControlPublic/mesure');?>"><span class="fa fa-2x fa-text-height"></span> <span class="fa fa-text-width"></span> Mesures</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->