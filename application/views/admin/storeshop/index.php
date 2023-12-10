
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          <?= (!isset($sub_title) ? $sub_title : ''); ?>
          <hr>
          <span style="font-size: 17px; color: blue;"><?= $store_shop->description; ?></span>
          <span style="float: right;"><?= $this->session->flashdata('flsh_mess'); ?></span>

        </h3><hr>
        <div class="col-lg-12 main-chart">
        <!--  PROFILE 02 PANEL -->
          <a href="<?= base_url('admin/ControlPanel/reason/'.$store_shop->id_mag);?>">
            
            <div class="col-lg-3 col-md-3 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <span class="fa-5x fa fa-medkit"></span>
                    <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                      <h5><?= $this->db->where('id_mag', $store_shop->id_mag)->count_all_results('propose');?></h5>
                    </sup>
                  </div>
                </div>
                <div class="pr2-social centered">
                  <h5>SERVICES & STOCK</h5>
                </div>
              </div>
              <!-- /panel -->
            </div>
          </a>

          <a href="<?= base_url('admin/ControlPanel/material/'.$store_shop->id_mag);?>">
            
            <div class="col-lg-3 col-md-3 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <span class="fa-5x fa fa-wrench"></span>
                    <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                      <h5><?= $this->db->where('id_mag', $store_shop->id_mag)->count_all_results('attribute');?></h5>
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

          <a href="<?= base_url('admin/ControlPanel/personal/'.$store_shop->id_mag);?>">
            
            <div class="col-lg-3 col-md-3 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <span class="fa-5x fa fa-user-o"></span>
                    <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                      <h5><?= $this->db->where('id_mag', $store_shop->id_mag)->count_all_results('users');?></h5>
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
                      <h5>
                        <?= $this->db->where('storeshop.id_mag', $store_shop->id_mag)
                                      ->join('storeshop', 'storeshop.id_mag='.$store_shop->id_mag)
                                      ->join('order_cart', 'order_cart.id_costomer=customer.id_costomer')
                                      ->count_all_results('customer');
                        ?>
                      </h5>
                    </sup>
                  </div>
                </div>
                <div class="pr2-social centered">
                  <h5>CLIENTS</h5>
                </div>
              </div>
              <!-- /panel -->
            </div>
          </a>
          <a href="<?= base_url('admin/C_StoreShop/controlOrder/'.$store_shop->id_mag);?>">
            
            <div class="col-lg-3 col-md-3 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <span class="fa-5x fa fa-floppy-o"></span>
                    <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                      <h5><?= $this->db->where('state_paid', -1)->where('id_mag', $store_shop->id_mag)->count_all_results('order_cart');?></h5>
                    </sup>
                  </div>
                </div>
                <div class="pr2-social centered">
                  <h5>COMMANDES EN ATTENTES</h5>
                </div>
              </div>
              <!-- /panel -->
            </div>
          </a>

          <a href="<?= base_url('admin/ControlPublic/consultations/'.$store_shop->id_mag);?>">
            
            <div class="col-lg-3 col-md-3 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <span class="fa-5x fa fa-user-md"></span>
                    <sup class="badge" style="margin-left: -13%; font-size: 13px; background-color: red; color: white; margin-bottom: 22%">
                      <h5><?= $this->db->where('state', -1)->where('pattern', 'CONSULTATION')->where('id_mag', $store_shop->id_mag)->join('users', 'users.id_user=communicate.id_user')->count_all_results('communicate');?></h5>
                    </sup>
                  </div>
                </div>
                <div class="pr2-social centered">
                  <h5>CONSULTATIONS </h5>
                </div>
              </div>
              <!-- /panel -->
            </div>
          </a>
        
        </div>
        <!-- /col-lg-3 -->
      </section>
    </section>
    <!--main content end-->

