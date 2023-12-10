   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" style="background-color: lightblue">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <?php $date= $this->db->select('date')->select_max('session_id')->like('id_user', $this->session->userdata['auth_user']["id_user"], 'both')->get('bo_sessions')->row_object()->date; ?>
                        <?php if (!is_null( $date)): ?>
                         <span style="color: gray">Dernière connexion le :<br> <?= date('d-m-Y à H:i:s', strtotime($date)) ?></span>
                        <?php endif; ?>
                        <a href="<?= site_url('customer/CustomerPanel/profile') ?>" title='Gestion de votre profile' style="color: white; text-align: center;">
                            <img src="<?= base_url('assets/img/').$this->session->userdata['auth_user']["profile_img"]?>" class="user-image img-responsive img-thumbnail" style="width: 85%; margin-top: -2.2%"/>
                            <p style="margin-top: -13%"><?= $this->session->userdata['auth_user']["username"]; ?></p>
                        </a>
					</li>

                    <li>
                        <a <?= ($active == "dashboard") ? 'class="active-menu"' : ""; ?>  href="<?= site_url('customer/CustomerPanel') ?>"><i class="fa fa-dashboard fa-2x"></i> PANEL DE GESTION</a>
                    </li>
                     <li>
                        <a <?= ($active == "shopping") ? 'class="active-menu"' : ""; ?> href="<?= site_url('customer/CustomerPanel/shoppingCartGlass') ?>"><i class="fa fa-shopping-cart fa-2x"></i> PANIER D'ACHAT</a>
                    </li>
                     <li>
                        <a <?= ($active == "attempt") ? 'class="active-menu"' : ""; ?> href="<?= site_url('Bioluxoptical/attempt') ?>"><i class="fa fa-crosshairs fa-2x"></i> ESSAYAGES</a>
                    </li>
                                       
                    <li>
                        <a href="#"><i class="fa fa-users fa-2x"></i> FORUM(S) <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= site_url('Bioluxoptical/forum') ?>"><i class="fa fa-list-alt"></i> Liste </a>
                            </li>

                            <?php if (!is_null($his_forums)):
                                foreach ($his_forums as $his_forum): ?>
                                <li>
                                    <a href="<?= site_url('Bioluxoptical/forum/'.$his_forum['id_com']) ?>">
                                        <i class="fa fa-sitemap "> </i><?= $his_forum['subject']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li> 

                    <li>
                        <a <?= ($active == "personalyzed") ? 'class="active-menu"' : ""; ?>  href="#"><span class="fa fa-2x fa-text-height"></span> <span class="fa fa-text-width"></span>  SUR-MESURE <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                        <li>
                            <a href="<?= site_url('customer/CustomerPanel/listPersonalyzed') ?>"><i class="fa fa-list-alt "></i> Liste</a>
                        </li>

                        <li>
                            <a href="<?= site_url('customer/CustomerPanel/personalyzed') ?>"><i class="fa fa-hand-o-right "></i> Commander</a>
                        </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a <?= ($active == "consult") ? 'class="active-menu"' : ""; ?> href="<?= site_url('customer/CustomerPanel/consult') ?>"><i class="fa fa-user-md fa-2x"></i> CONSULTATIONS <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?= site_url('customer/CustomerPanel/consult') ?>"><i class="fa fa-list-alt"></i> Liste </a>
                            </li>
                            <li>
                                <a href="<?= site_url('Bioluxoptical/attempt') ?>"><i class="fa fa-crop"></i> Formulaire par défaut </a>
                            </li>
                            <?php //var_dump($his_forums->result_array()); die; 
                            foreach ($consultations->result_array() as $consultation): 

                                $personal = $this->db->select('first_name, second_name, function, genre, phone, profile_img')->where('id_user', $consultation['id_user'])->get('users')->row_object();
                            ?>
                            <li <?= (isset($sub_active) and $sub_active == $consultation['date_init']) ? 'class="active"' : ""; ?> >
                                <?php if($personal): ?>
                                <a href="<?= site_url('customer/CustomerPanel/consult/'.$consultation['id_com']) ?>">Avec <?= ($personal->genre == 1 ? 'M. ' : 'Mme ' ).$personal->first_name.' '.$personal->second_name.' <br><i style="float: rigth; color: gray">le : '.date('d-m-Y à H:i:s', strtotime($consultation['date_init'])).'</i>'; ?>
                                </a>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                            
                        </ul>
                    </li>

                    <li>
                    </li>
						   
                </ul>
               
            </div>
            
        </nav> 