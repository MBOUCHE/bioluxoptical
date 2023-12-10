

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Masquez la barre de menu"></div>
      </div>
      <!--logo start-->
      <a href="<?= base_url('index');?>" class="logo" title="Page d'acceuil du site">
        <img class="img-thumbnail" src="<?= base_url('assets/');?>img/logo.png" alt="logo" 
              style="width: 161px;"/>
      </a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">Voir toutes les taches</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->

          <?php

              $nb_new_messages = $this->db->select('id_issue, date_issue, issuer_id, content')
                                              ->where('state_msg', -1)
                                              ->where('subject', 'CONTACT')
                                              ->join('communicate', 'communicate.id_com=issue.id_com')
                                              ->get('issue')
                                              ->result_array();
          ?>
          <?php if (sizeof($nb_new_messages)!=0) : ?>
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme"><?= sizeof($nb_new_messages); ?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">Vous avez <?= sizeof($nb_new_messages); ?> nouveaux messages</p>
              </li>
              <?php foreach ($nb_new_messages as $nb_new_message): ?>
              <li>
                <?php $user = $this->db->where('id_costomer', $nb_new_message['issuer_id'])->get('customer')->row_object(); ?>
                <a href="<?= site_url('admin/ControlPublic/Contactform/'.$nb_new_message['id_issue']); ?>">
                  <span class="photo"><img alt="avatar" src="<?= base_url('assets/img/customers/'.$user->profile_img);?>"></span>
                  <span class="subject">
                    <span class="from"><?= $user->fname_cost.' '.$user->sname_cost; ?></span>
                  </span>
                  <span class="message">
                    <?= mb_strimwidth(htmlentities($nb_new_message['content']), 0, 35) ; ?>...
                  </span>
                    <span style="float: right;" class="time"><?= date('d/m/Y - H:i:s', strtotime($nb_new_message['date_issue'])) ?></span>
                  </a>
              </li>
              <?php endforeach; ?>
              <li>
                <a href="<?= site_url('admin/ControlPublic/Contactform'); ?>">Voir tous les messages</a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <!-- inbox dropdown end -->
            <?php
               // à transférer les modifications header = profile

              $nb_new_commandMesure = $this->db->select('*')
                                      ->where('order_cart.state_paid', -2)
                                      ->where('confirm_date', null)
                                      ->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
                                      ->join('customer', 'customer.id_costomer = order_cart.id_costomer')
                                      ->get('order_cart')
                                      ->result_array(); 

              $nb_new_consults = $this->db->select('id_com, date_init, subject')
                                              ->where('state', -1)
                                              ->where('id_user', null)
                                              ->where('pattern', 'CONSULTATION')
                                              ->get('communicate')
                                              ->result_array()
                                              ;

              $nb_new_testimonials = $this->db->select('id_issue, date_issue, issuer_id, content')
                                              ->where('state_msg', -1)
                                              ->where('pattern', 'TEMOIGNAGE')
                                              ->join('communicate', 'communicate.id_com=issue.id_com')
                                              ->get('issue')
                                              ->result_array();

              $nb_new_orders = $this->db->select('id_ord')
                                              ->where('state_paid', -1)

                                              ->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
                                              ->join('customer', 'customer.id_costomer = order_cart.id_costomer')
                                              ->join('provider', 'provider.id_prov = order_cart.id_op')
                                              ->get('order_cart')
                                              ->result_array();

              $nb_new_customers = $this->db->select('id_costomer')
                                              ->where('state', -1)
                                              ->join('customer_role', 'customer_role.id_user=customer.id_costomer')
                                              ->get('customer')
                                              ->result_array();

            ?>
          <?php 
            $total_notif = sizeof($nb_new_orders) + sizeof($nb_new_customers) + sizeof($nb_new_testimonials) + sizeof($nb_new_consults) + sizeof($nb_new_commandMesure);
          ?>

          <?php if ($total_notif!=0) : ?>
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning"><?= $total_notif; ?></span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">Vous avez <?= $total_notif; ?> notifications</p>
              </li>

              <?php if (sizeof($nb_new_consults) !=0) :?>
              <li>
                <a href="<?= site_url('admin/ControlPublic/addConsult');?>">
                  <span class="label label-warning" style="width: 31px"><i class="fa fa-bell"></i> <?= sizeof($nb_new_consults) ; ?></span>
                  <?= sizeof($nb_new_consults) ==1 ? ' Nouvelle consultation' : ' Nouvelles consultations'; ?>
                  <span class="small italic">...</span>
                  </a>
              </li>

              <?php endif;?>

              <?php if (sizeof($nb_new_testimonials) !=0) :?>
              <li>
                <a href="<?= site_url('admin/ControlPublic/Testimonial/0/new');?>">
                  <span class="label label-warning" style="width: 31px"><i class="fa fa-bell"></i> <?= sizeof($nb_new_testimonials) ; ?></span>
                  <?= sizeof($nb_new_testimonials) ==1 ? ' Nouveau témoignage' : ' Nouveaux témoignages'; ?>
                  <span class="small italic">...</span>
                  </a>
              </li>

              <?php endif;?>

              <?php if (sizeof($nb_new_orders) !=0) :?>
              <li>
                <a href="<?= site_url('admin/C_StoreShop/controlOrder/0/new');?>">

                  <span class="label label-danger" style="width: 31px"><i class="fa fa-bolt"></i> <?= sizeof($nb_new_orders) ; ?></span>
                  <?= sizeof($nb_new_orders) ==1 ? ' Demande non traitée' : ' Demandes non traitées'; ?>
                  <span class="small italic">...</span>
                  </a>
              </li>
              <?php endif;?>

              <?php if (sizeof($nb_new_customers) !=0) :?>
              <li>
                <a href="<?= site_url('admin/ControlPanel/customer/new');?>">

                  <span class="label label-success" style="width: 31px"><i class="fa fa-plus"></i> <?= sizeof($nb_new_customers) ; ?></span>
                  <?= sizeof($nb_new_customers) ==1 ? 'Un nouvel abonné / Client' : ' Nouveaux abonnés / Clients'; ?>
                  <span class="small italic">...</span>
                  </a>
              </li>
              <?php endif;?>

              <?php if (sizeof($nb_new_commandMesure) !=0) :?>
              <li>
                <a href="<?= site_url('admin/C_StoreShop/controlOrderMesure/0/new.html');?>">

                  <span class="label label-primary" style="width: 31px"><i class="fa fa-plus"></i> <?= sizeof($nb_new_commandMesure) ; ?></span>
                  <?= sizeof($nb_new_commandMesure) ==1 ? 'Une nouvelle commande sur-mesures' : ' Nouvelles commandes sur-mesures'; ?>
                  <span class="small italic">...</span>
                  </a>
              </li>
              <?php endif;?>

              <li>
                <a href="index.html#">Voir toutes les notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        <?php endif; ?>
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?= base_url('deconnexion');?>" style="border-radius: 0px; font-size: 17px">Déconnexion <span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </div>
    </header>
    <!--header end-->