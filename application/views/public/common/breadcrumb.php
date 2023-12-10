  <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb" style="background-image: url('<?= base_url($breadcrumb); ?>'); 
   background-size: 100%; display: inline; background-repeat: no-repeat;
  float: left; width: 100%">



  <div class="container">
    <div class="main clearfix">
      <div class="colum">
        <div id="sb-search" class="sb-search">
          <form action="<?= base_url('search/');?>" method="post">
            <input class="sb-search-input" placeholder="tapez votre recherche..." type="text" value="" name="search" id="search" minlength="4" required="required">
            <input class="sb-search-submit" type="submit" value="">
            <span class="sb-icon-search"></span>
          </form>
        </div>
      </div>
    </div>
  </div><!-- /container -->


  <div class="container" style="text-align: center;">
   <div class="row">
     <div class="col-md-12 mu-read-more-btn">
       <div class="mu-page-breadcrumb-area" style="">
         <h2 style="font-size: 17px; color: orange;"><?php if (!is_null($presentation)) echo $presentation ?></h2>
         <ol class="breadcrumb" style="margin-top: 17%">
          <li><a href="<?= site_url('/index'); ?>"  style="color: green"><label>Accueil</label> </a></li>        
          <li style="color: orange"><?= $sub_title;?></li>
        </ol>
       </div>
     </div>
   </div>
  </div>


</section>
 <!-- End breadcrumb -->