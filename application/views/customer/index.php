 
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner" class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= $sub_title; ?>  <span style="float: right;"><?= $presentation; ?></span> </h4>
                        <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">

                    <a href="<?= site_url('customer/CustomerPanel/stateAccount') ?>">
                        <div class="col-md-3 col-sm-6 col-xs-6">           
                			<div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-red set-icon">
                                    <i class="fa fa-qrcode"></i>
                                </span>
                                <div class="text-box" >
                                    <p class="main-text">En attente</p>
                                    <p class="text-muted">Code d'activation</p>
                                </div>
                            </div>
            		    </div>
                    </a>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
            			<div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text">30 Tasks</p>
                                <p class="text-muted">Remaining</p>
                            </div>
                        </div>
        		    </div>
                    <a href="<?= site_url('customer/CustomerPanel/personalyzed') ?>">
                        <div class="col-md-3 col-sm-6 col-xs-6">           
                            <div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-green set-icon">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                <div class="text-box" >
                                    <p class="main-text" style="font-size: 17px;">
                                        <?=
                                            sizeof($this->cart->contents()) == 0 ? 'Aucune commande' : (sizeof($this->cart->contents()) == 1 ? "Une commande" : sizeof($this->cart->contents()).' Commandes')
                                        ?>
                                    </p>
                                    <p class="text-muted">Sur-mesure </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="<?= site_url('customer/CustomerPanel/shoppingCartGlass') ?>">
                        <div class="col-md-3 col-sm-6 col-xs-6">           
                            <div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-brown set-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </span>
                                <div class="text-box" >
                                    <p class="main-text" style="font-size: 17px;">
                                        <?=
                                            sizeof($this->cart->contents()) == 0 ? 'Aucun article' : (sizeof($this->cart->contents()) == 1 ? "1 article" : sizeof($this->cart->contents()).' Articles')
                                        ?>
                                    </p>
                                    <p class="text-muted">Panier d'achat</p>
                                </div>
                            </div>
                        </div>
                    </a>
			    </div>
                <hr />                
                 
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
