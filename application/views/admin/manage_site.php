
  <div class="container-fluid">
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          :  <?= (!isset($sub_title) ? $sub_title : ''); ?> - <?= $this->session->flashdata('flsh_mess'); ?>

        </h3><hr>
        <div class="row">
          <div class="col-lg-12 main-chart">
          <!--  PROFILE 02 PANEL -->
            <a href="<?= site_url('admin/ControlPublic/');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-pencil"></span>
                      <h4><?= $this->db->select('*')->from('slide')->join('users', 'users.id_user = slide.id_user')->count_all_results();?>
                      </h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>SLIDE ET ACCUEIL</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/storesShop');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-building-o"></span>
                      <h4><?= $this->db->count_all_results('reason');?></h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>PRESENTATION</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/storesShop');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-user-o"></span>
                      <h4><?= $this->db->count_all_results('users');?></h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>STRUCTURE ET DOCUMENTS</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/C_Forum');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-users"></span>
                      <h4><?= $this->db->where('pattern', 'FORUM')->count_all_results('communicate');?></h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>FORUM</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/storesShop');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-money"></span>
                      <h4><?= $this->db->count_all_results('customer');?></h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>CONSEILS</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
            <a href="<?= base_url('admin/ControlPanel/manageSite');?>">
              
              <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <span class="fa-5x fa fa-th"></span>
                      <h4>8</h4>
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4>MAISON MERE</h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>
            </a>
          </div>
        </div>
      </section>
    </section>
  </div>

