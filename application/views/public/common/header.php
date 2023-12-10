
  <!-- Start header  -->
  <header id="mu-header" class="container-fluid" style="margin-top: 8px;">
    <div class="">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
          <div class="mu-top-email">
            <!-- LOGO -->
            <!-- IMG BASED LOGO  -->
            <a href="<?= site_url(); ?>">
              <img src="<?php echo base_url('assets/img/logo.png');?>" alt="logo" style="width: 71%">
            </a>
            <p style="font-size: 15px">
              Le Panafricain Concepteur et Fabriquant de verres Optiques. <br>
              Une approche progressive vers des verres médicaux de Prestige.

              <?= isset($_SESSION['flsh_mess']) ? $_SESSION['flsh_mess'] : ''; ?>

            </p>
          </div>
          
        </div>


        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="text-align: right; float: right;">

          <nav>
            <ul class="mu-top-social-nav" style="float: right; width: 100%">

            <?php if (isset($this->session->userdata["auth_user"])):

              $accounts = $this->db->select('*')->from('users_role')->where('id_user', $this->session->userdata['auth_user']['id_user'])->where('state', 1)->join('role', 'role.id_role = users_role.id_role')->get()->result_array();
              if (sizeof($accounts) == 0) {
                $accounts = $this->db->select('*')->from('customer_role')->where('id_user', $this->session->userdata['auth_user']['id_user'])->where('state', 1)->join('role', 'role.id_role = customer_role.id_role')->get()->result_array();

                if (sizeof($accounts) == 0) {
                  $accounts = [['name_role' => 'Compte inactif :']] ;
                }
              }   
            ?>

              <ul id="nav" class="nav nav-pills clearfix right" role="tablist" style="">
                <li class="dropdown" style=" border-radius: 0px;">
                  <a style="padding: 8px; color: white;background-color: green;  font-size: 13px; border-radius: 0px" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"> </span> Votre Compte
                  </a>
                    <ul id="products-menu" class="dropdown-menu clearfix" role="menu" style="">

                      <img src="<?= base_url('assets/img/').$this->session->userdata['auth_user']["profile_img"]?>" alt="img_user" style="width: 100%">
                      <?php foreach ($accounts as $account) {
                        echo '
                      <li style="width:100%">
                        <a href="'.base_url('Bioluxoptical/connexion').'" style="width: 100%; padding: 8px; border-radius0px;">'.$account['name_role'].' <span class="fa fa-sign-in" style="float: right"></span>
                        </a>
                      </li>';
                      } ?>
                      <li>
                        <a href="<?= base_url('Bioluxoptical/deconnexion'); ?>" style="padding: 8px; color: white; background-color: lightblue; font-size: 13px; border-radius: 0px;"> Déconnexion
                          <span class="fa fa-sign-out"></span>
                        </a>
                      </li>
                    </ul>
                </li>
                

              <?php else : ?>
                <ul id="nav" class="nav nav-pills clearfix right" role="tablist">
                  <?php if ($sub_title != 'Formulaire de connexion'): ?>
                  <li>
                    <div class="btn-group" style="margin-top: 4%;">
                      <form action="<?= site_url('Bioluxoptical/connection') ?>" method="post">
                        <button type="submit" class="btn btn-success" style="border-radius: 0px; background-color: green">
                          <input type="hidden" name="custumer" value="client">
                          <span class="fa fa-user"></span> Connexion
                        </button>
                      </form>
                    </div>
                  </li>
                  <?php endif ?>
                  <?php if ($sub_title != 'Formulaire de création de compte'): ?>
                  <li>
                    <div class="btn-group" style=" margin-top: 4%;">
                      <a href="<?= site_url('createAccount'); ?>">
                        <button type="button" class="btn btn-primary clearfix" style="border-radius: 0px">
                        <span class="fa fa-user-plus"></span> Compte
                        </button>
                      </a>
                    </div>
                  </li>

                <?php endif ?>
              <?php endif ?>

            </ul>

            <li class="dropdown" style="float: left;">
              <a style="color: green" href="#" class="dropdown-toggle fa-2x fa fa-shopping-cart" data-toggle="dropdown">

                <sup class="badge" style="margin-left: -35%; font-size: 13px; background-color: orange; color: white; margin-bottom: 10%"><?= sizeof($this->cart->contents()); ?> </sup>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style=" font-size: 12px; padding: 4px; width: 200px; margin-top: 10%">
                <?php if ($this->cart->total() == 0): ?>
                  <li>
                    <a href="#" style="padding: 8px; color: white; background-color: lightblue; font-size: 13px; border-radius: 0px;">
                      <strong>Votre panier est vide.</strong><br />
                    </a>
                  </li>

                  <?php else: ?>
                  <?php foreach ($this->cart->contents() as $items): ?>

                    <li>
                      <a href="#" style="padding: 8px; color: white; background-color: lightblue; font-size: 13px; border-radius: 0px;">
                        <strong><?php echo '( '.$items['qty'].' ) '. $items['name']; ?></strong><br />
                      </a>
                    </li>

                  <?php endforeach; ?>

                  <li><a href="#" style="padding: 8px; color: white; background-color: orange; font-size: 13px; border-radius: 0px;">Total = <?= $this->cart->total(); ?> FCFA</a>
                  </li>
                <?php endif ?>
                  <li><a href="<?= base_url('Bioluxoptical/detailsPayment'); ?>" style="padding: 8px; color: white; background-color: green; font-size: 13px; border-radius: 0px;"> Consulter <span class="fa fa-sign-out" style="float: right;"></span></a>

              </ul>
            </li>


            <ul class="mu-top-social-nav">
              <div class="mu-top-email">
                <span style="font-size: 13px">
                  <img src="<?= base_url('assets/img/');?>logo_gm.png" alt="logo" style="width: 17px;">
                  <a style="font-size: 15px" href="mailto:info@bioluxoptical.com">info@bioluxoptical.com</a>
                </span>
                <br>
                <span style="font-size: 15px">
                  <span style="font-size: 22px; margin-top: 1%" class="fa fa-whatsapp"></span>
                  (+237) <a href="tel:698 665 698">698 665 698</a>
                   
                </span>
                <br>

                <span style="font-size: 15px">
                  <span style="font-size: 22px; margin-top: 1%" class="fa fa-phone"></span>
                  (+237) <a href="tel:675 776 125">675 776 125</a>
                </span>
                <br>

                <span style="font-size: 22px; margin-top: 1%">
                  <a href="https://m.facebook.com/www.bioluxoptical.cm/" target="_blank" style=" float: left; padding: 2px; margin-top: -10%; margin-left: 10%; border-radius: 0px" class="list-group-item active fa fa-facebook-official"></a>
                </span>
                <span style="font-size: 22px; margin-top: 1%">
                  <a href="#" style=" float: left; padding: 2px; margin-top: -10%; border-radius: 0px" class="list-group-item active fa fa-linkedin"></a>
                </span>
                <span style="font-size: 22px; margin-top: 1%">
                  <a href="#" style=" float: left; padding: 2px; margin-left: 20%; margin-top: -10%; border-radius: 0px" class="list-group-item active fa fa-linkedin"></a>
                </span>

              </div>

            </ul>
          </nav>
        </div>
      </div>
    </div>

    
  </header>

  <!-- End header  -->