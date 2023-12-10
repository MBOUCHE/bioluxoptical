


 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container" style="text-align: center">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
          <div class="container">
              <div class="main clearfix">
                <div class="colum">
                  <div id="sb-search" class="sb-search">
                    <form action="<?= base_url('search/');?>" method="post">
                      <input class="sb-search-input" placeholder="tapez votre recherche..." type="text" value="" name="search" id="search" minlength="4">
                      <input class="sb-search-submit" type="submit" value="">
                      <span class="sb-icon-search"></span>
                    </form>
                  </div>
                </div>
              </div>
            </div><!-- /container -->
         
           	<a href="index">
           		<img src="<?= base_url('assets/img/logo.png');?>" alt="BIOLUX OPTICAL" style="border-radius: 1%; width:60%" />
        	  </a>
           <ol class="breadcrumb" style="font-size: 17px; background-color: gray">
            <li><a href="index">Acceuil</a></li>            
            <li class="active"><?= $error; ?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

  <!-- Start error section  -->
  <section id="mu-error" style="margin-top: -4%;">
       <div class="col-md-12" style="padding: 1px">
          <div class="mu-error-area" style="font-size: 17px">
            <p><?= $title; ?></p>
            <span><?= $message; ?></span>
            <h2><?= $error; ?></h2>
            <a class="mu-post-btn" href="index">Retour à l'acceuil !</a>
          </div>
        </div>
  </section>
 <!-- End error section  -->