
  <body style=" font-family: 'Cambria'; background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
    
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; background-color: lightblue">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Volet de navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url(); ?>">
                    <img class=" img-thumbnail" src="<?= base_url('assets/img/logo.png');?>"  style="width: 100%;margin-top: -4%">
                </a> 
                
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 13px;">

<!-- Single button -->
<div class="btn-group" style="margin-right: 0.%;">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="; padding: 4px">
    <i class="fa fa-bell">
        <sup class="badge" style="font-size: 12px; background-color: lightblue; color: white; padding: 4px">
            100
        </sup>
    </i>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li style="background-color: lightblue"> <a href="<?= site_url('customer/CustomerPanel/profile#profile') ?>" style=""><i class="fa fa-user"></i> <span style="margin-left: 10%">Profile</span></a></li>
  </ul>
</div>

                <a href="<?= base_url('Bioluxoptical/deconnexion');?>" class="btn btn-info square-btn-adjust"></i>Déconnexion <i class="fa fa-sign-out"></i></a>
            </div>
        </nav>