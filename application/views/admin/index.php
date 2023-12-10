3
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $title; ?>
          :  <?= (!isset($sub_title) ? $sub_title : ''); ?> <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?> 

        </h3><hr>
        <div class="row">
          <div class="col-lg-12 main-chart">
          <!--  PROFILE 02 PANEL -->
            <a href="<?= base_url('admin/ControlPanel/storesShop');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-building-o"></span>
                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('storeshop');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>MAGASINS</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/reason');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-building-o"></span>
                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('reason');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>SERVICES & PRODUITS</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>

            <a href="<?= base_url('admin/ControlPanel/material');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-building-o"></span>

                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('material');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>MATERIELS ET MANIPULATIONS</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>

            <a href="<?= base_url('admin/C_Provider');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-user-o"></span>

                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('users');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>PERSONNELS & PARTENAIRES</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/customer');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-users"></span>

                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('customer');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>ABONNES & CLIENTS</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/C_StoreShop/controlOrder');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-shopping-cart"></span>

                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('order_cart');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>COMMANDES & RECETTES</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>

            <a href="<?= base_url('/admin/C_StoreShop/controlOrderMesure');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa fa-5x fa-text-height"></span> <span class="fa fa-2x fa-text-width"></span>

                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                        <h4><?= $this->db->count_all_results('order_cart');?></h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>COMMANDES SUR-MESURES</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/manageSite');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-th"></span>
                      <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: %">
                        <h4>8</h4>
                      </sup>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h5>FONCTIONNEMENT DU SITE</h5>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
          </div>
        </div>

      </section>
    </section>
    <!--main content end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

            <?php include("common/user_visits.php"); ?>
            
          <!-- /col-lg-3 -->
        <br>
        <!-- /row -->
        
      </section>
    </section>

