< 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style=" background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Compte en attente d'activation</h4>
                        <h5><?= isset($_SESSION['flsh_mess']) ? $_SESSION['flsh_mess'] : ''; ?>
                        </h5> 
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                <div class="col-lg-1 col-md-1 col-sm-1">
                    <i class="fa fa-qrcode fa-5x"></i>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <form class="contactform" action="<?= site_url('customer/CustomerPanel/checkStateAccount'); ?>" method="post">
                        <div class="panel panel-primary" style="border-radius: 1px">
                            <div class="panel-heading">
                                Code d'activation
                            </div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    
                                    <input type="text" name="code" id="code" class="form-control" value="<?= (is_null(set_value('code')) ? set_value('code') : '') ?>" placeholder="Code : XXXX-XXXX-XXXX">                        
                                </div>
                                    <div class="<?= empty(form_error('code')) ? "" : "has-error" ?>">
                                      <span class="help-block "><?= form_error('code'); ?></span >
                                    </div>
                            </div>
                            <div class="panel-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-warning" style="border-radius: 0px;float: left;" name="account" value="refresh"><i class="fa fa-refresh"></i> Regénérer</button>
                                <button type="submit" class="btn btn-success" style="border-radius: 0px;" name="account" value="check">
                                    <i class="fa fa-check"></i> Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
