
<section id="mu-course-content">
   <div class="row">
     <div class="col-md-12">
       <div class="mu-course-content-area">

          <?php include('common/right_sidebar.php'); ?>

          <div class="col-md-8" style="">
            <!-- start course content container -->
            <div class="mu-course-container mu-blog-single">
              <div class="row">
                <div class="col-md-12">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <div class="col-md-6">

<div id="map"></div>
<p><b>Adresse</b>: <span id="address"></span></p>
<p id="error"></p>

                      </div>
                      <div class="col-md-6">
                        <figcaption class="mu-blog-caption">
                          <h3><a href="#"><?php echo $storeshop[0]['description'];?></a></h3>
                          <a href="#"><img alt="img" class="img-thumbnail" src="<?= base_url('assets/img/storeshop/').$storeshop[0]['building_img'];?>" alt="" style="width: 100%; height: 404px"></a>
                        </figcaption>
                      </div>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <span style="color: green; margin-right: 8%">Boite postale : <?= $storeshop[0]['po_box'];?></span>
                      <span style="color: green">Service client : <a style="float: right;" href="tel:<?= $storeshop[0]['phone_ss'];?>"><?= $this->db->select('num_zone')->where('id_town', $storeshop[0]['id_town'])->join('town', 'town.id_country=country.id_country')->get('country')->row_object()->num_zone;?> <?= $storeshop[0]['phone_ss'];?></a></span>
                    </div>
                    <div class="mu-blog-description">
                      <blockquote>
                        <p><?= $storeshop[0]['details'];?></p>                            
                      </blockquote>
                      <h3>Liste des services et articles disponibles</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam distinctio voluptatibus sequi sint, in. Soluta alias sunt, voluptates necessitatibus neque, perspiciatis, quos doloribus quae non tempore ut qui facere nulla.</p>

                      <div class="panel panel-primary">
                        <div class="panel-heading" style="padding: 0.4%">
                          <h4 style="margin-left: 13px">Articles offerts
                            
                          </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                      <tr>
                                        <th> </th>
                                        <th> Article</th>
                                        <th> Coût & Garantie </th>
                                        <th> Type - Sous-catégorie </th>
                                        <th style="width: 50px"> Action </th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php $i = 0;?>
                                      <?php foreach ($propositions2 as $proposition): ?>
                                      <tr>
                                        <td> <?= $i+=1;?>.</td>
                                        <td> <?= $proposition['name_reason'];?></td>
                                        <td> <?= ($proposition['price_reason'] < $proposition['old_price']) ? $proposition['price_reason'].' FCFA <span class="fa fa-2x fa fa-gift" style="float: right;"></span><br>' : $proposition['price_reason'].' FCFA<br>'.$proposition['origine_reason'];?> </td>
                                        <td> <?= $proposition['name_type'].'<br>'.$proposition['label'].'<span style="float: right">: '.$proposition['label_c_cat'].'</span>';?>
                                          
                                        </td>
                                        <td>
                                          
                                          <!-- Button trigger modal -->
                                          <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $proposition['id_reason']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                                            <i class="fa fa-eye "></i>
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="myModal0<?= $proposition['id_reason']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                                  <h4 class="modal-title" id="myModalLabel"><?= $proposition['name_reason'].'<br><span style="float: right">'.$proposition['code_reason'].'</span>';?></h4>
                                                </div>
                                                <div class="img-thumbnail col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                  <?= $proposition['note_reason']; ?><hr>
                                                  Durée : <br>du <br> <?= (isset($description_reason['date_manufacturate']) and $description_reason['date_manufacturate'] != '0000-00-00') ? $description_reason['date_manufacturate'] : '- - / - - / - - - -'; ?> <br>au <br><?= (isset($description_reason['date_experation']) and $description_reason['date_experation'] != '0000-00-00') ? $description_reason['date_experation'] : '- - / - - / - - - -'; ?>
                                                  

                                                </div>
                                                <div class="modal-body col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                                  <img style="width: 100%" src="<?= base_url('assets/img/reason/').$proposition['img_reason']; ?>" alt="<?= $proposition['img_reason']; ?>" class="img-thumbnail"/>
                                                </div>

                                                <div class="container-fluid" style="margin-bottom: 13px">
                                                  <?= "<hr>".$proposition['description_reason']; ?>
                                                </div>
                                                <div class="modal-footer">
                                                  <button style="border-radius: 0px; color: white" type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                  <a style="padding: 4px; border-radius: 0px; color: white" href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$proposition['id_reason']) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"> </i> Ajouter au panier</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>

                                      <?php endforeach; ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->


                      <div class="panel panel-primary">
                        <div class="panel-heading" style="padding: 0.4px">
                          <h4 style="margin-left: 13px">Services offerts</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                      <tr>
                                        <th> </th>
                                        <th> Service </th>
                                        <th> Coût & Garantie </th>
                                        <th> Type - Sous-catégorie </th>
                                        <th style="width: 50px"> Action </th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php $i = 0;?>
                                      <?php foreach ($propositions as $proposition): ?>
                                      <tr>
                                        <td> <?= $i+=1;?>.</td>
                                        <td> <?= $proposition['name_reason'];?></td>
                                        <td> <?= $proposition['price_reason'].' FCFA<br>'.$proposition['origine_reason'];?> </td>
                                        <td> <?= $proposition['name_type'].'<br>'.$proposition['label'].'<span style="float: right">: '.$proposition['label_c_cat'].'</span>';?>
                                          
                                        </td>
                                        <td>
                                          
                                          <!-- Button trigger modal -->
                                          <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $proposition['id_reason']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                                            <i class="fa fa-eye "></i>
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="myModal0<?= $proposition['id_reason']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                                  <h4 class="modal-title" id="myModalLabel"><?= $proposition['name_reason'].'<br><span style="float: right">'.$proposition['code_reason'].'</span>';?></h4>
                                                </div>
                                                <div class="img-thumbnail col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                  <?= $proposition['note_reason']; ?><hr>
                                                  Durée : <br>du <br> <?= (isset($description_reason['date_manufacturate']) and $description_reason['date_manufacturate'] != '0000-00-00') ? $description_reason['date_manufacturate'] : '- - / - - / - - - -'; ?> <br>au <br><?= (isset($description_reason['date_experation']) and $description_reason['date_experation'] != '0000-00-00') ? $description_reason['date_experation'] : '- - / - - / - - - -'; ?>
                                                  

                                                </div>
                                                <div class="modal-body col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                                  <img style="width: 100%" src="<?= base_url('assets/img/reason/').$proposition['img_reason']; ?>" alt="<?= $proposition['img_reason']; ?>" class="img-thumbnail"/>
                                                </div>

                                                <div class="container-fluid" style="margin-bottom: 13px">
                                                  <?= "<hr>".$proposition['description_reason']; ?>
                                                </div>
                                                <div class="modal-footer">
                                                  <button style="border-radius: 0px" type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                  <a style="padding: 4px; border-radius: 0px; color: white" href="<?= site_url('customer/CustomerPanel/shoppingCartGlass/'.$proposition['id_reason']) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"> </i> Ajouter au panier</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>

                                      <?php endforeach; ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->

                      
                    </div>

                  </article>
                </div>                                   
              </div>
            </div>
            <!-- start related course item -->
            <?php if(sizeof($materials->result_array())!=0): ?>
            <div class="row">
              <div class="col-md-12">
                <div class="mu-related-item">
              <h3>Notre matériel</h3>
              <div class="mu-related-item-area">
                <div id="mu-related-item-slide">
                  <?php foreach ($materials->result_array() as $material): ?>
                  <div class="col-md-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <img style="width: 100%" alt="img" src="<?= base_url('assets/img/materials/').$material['img_mat'] ?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="#"><?= $material['reg_num_mat']; ?></a>
                            <span><i class="fa fa-clock-o"></i><?= $material['duration_prop'] == 1 ? $material['duration_prop'].' Jour' : $material['duration_prop'].' Jours'; ?>
                              <img style="width: 100%" alt="img" src="<?= base_url('assets/img/attributes/').$material['img_prop'] ?>">
                            </span>
                          </figcaption>
                        </div>
                      </figure>
                      <div class="mu-latest-course-single-content" style="margin: 8px;">
                        <h4 style="text-align: center;"><a href="#"><?= $material['name_mat']; ?></a></h4>
                        <p><?= mb_strimwidth($material['description_prop'], 0, 49).'...' ; ?></p>
                        <div class="mu-latest-course-single-contbottom">
                          <a href="#" class="mu-course-details">Details</a>
                          <span href="#" class="mu-course-price">$165.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- end start related course item -->

          <?php endif; ?>
        </div>

        <?php include('common/categories_list.php'); ?>

       </div>
     </div>
   </div>
 </section>

