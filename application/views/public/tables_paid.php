


        <div class="col-lg-8 col-md-9 col-sm-7 col-xs-12">
          <p style="text-align: center; margin-top: -1%">A tout moment, vous pouvez consulter le caddie en cours et modifier la quantite choisie ou supprimer la commande d'un produit.</p>
          <!-- Advanced Tables -->
          <div class="panel panel-info">
              <div class="panel-heading" style=" padding: 0%;">
                  <p style="text-align: right; margin-right: 1%">
                    <span style="float: left; padding: 1.3%">Panier de commande</span>
                    <?= sizeof($this->cart->contents()) == 0 ? 'Aucun article choisi' : (sizeof($this->cart->contents()) == 1 ? "1 article choisi" : sizeof($this->cart->contents()).' Articles'); ?>
                    <a style="color: green" class="fa-2x fa fa-shopping-cart"></a>
                  </p>
              </div>

              <?php if ($this->cart->total() !=0) :?>
              <div class="panel-body">
                <form method="post" action="<?= site_url('customer/CustomerPanel/updateCart');?>" >
                	<input type="hidden" name="id_op" value="<?= !isset($id_op) ? '1' : $id_op; ?>">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th style="width: 125px">Quantité</th>
                          <th>Désignation</th>
                          <th style="text-align:right">Prix</th>
                          <th style="text-align:right">Sous-Total</th>
                        </tr>
                      </thead>
                      <tbody>  
                        <?php $i = 1; ?>

                        <?php foreach ($this->cart->contents() as $items): ?>
                        
                        <tr>
                          <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'max' => '999', 'size' => '5', 'type' => 'number', 'step' => '1', 'style' => 'width:44%', 'min' => 1)); ?>
                            
                            <div class="dropdown">
                              <a data-toggle="dropdown" href="#"></a>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <?php echo form_input($i.'[rowid]', $items['rowid']); ?>
                            
                                 <?php echo form_input($i.'[id]', $items['id']); ?>
                              </ul>
                            </div>

                            <img src="<?= base_url('assets/img/reason/'.$items['img_reason']) ?>" style="width: 100%">

                          </td>
                          <td>
                            <?php echo $items['name']; ?>

                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                            <p>
                              <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                              <strong><?= $option_name; ?>:</strong> <?= $option_value; ?><br />

                              <?php endforeach; ?>
                            </p>

                            <?php endif; ?>

                          </td>
                          <td style="text-align:right">
                            <?php echo $this->cart->format_number($items['price']); ?><hr>
                            <!-- Button trigger modal -->
                            <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $items['id']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                              <i class="fa fa-eye "></i>
                            </span>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal0<?= $items['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?= $items['name'];?></h4>
                                  </div>
                                  
                                  <div class="modal-body col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                    <img style="width: 100%" src="<?= base_url('assets/img/reason/').$items['img2_reason']; ?>" alt="<?= $items['img2_reason']; ?>" class="img-thumbnail"/>
                                  </div>

                                  <div class="modal-footer">
                                    <p>
                                      <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                      <strong><?= $option_name; ?>:</strong> <?= $option_value; ?><br />

                                      <?php endforeach; ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <span data-toggle="modal" data-target="#myModal4<?= $items['id']?>" style="border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                            </span>


                            <!-- Modal 4 : Suppression -->
                            <div class="modal fade" id="myModal4<?= $items['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Alerte de suppression</h4>
                                  </div>
                                  <div class="modal-body">
                                    Êtes-vous sûr de retirer '<?= $items['name']?>' au panier ?
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                    <a href="<?= base_url('customer/CustomerPanel/removeCart/').$items['rowid'].'/'.$items['id'];?>">
                                    <button type="button" class="btn btn-danger">retirer</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>    
                          </td>
                          <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> FCFA
                          </td>
                        </tr>

                        <?php $i++; ?>

                        <?php endforeach; ?>

                      </tbody>

                        <tr style="float: bottom">

                          <td colspan="2" class="right"></td>
                          <td colspan="2" class="right">
                            <strong style="float: left;">Total : </strong>
                            <label style="float: right;"><?php echo $this->cart->format_number($this->cart->total()); ?> FCFA</label></td>
                        </tr>
                  </table>
                </div>
                <hr>

                <?php if (!isset($this->session->userdata["auth_user"])):?>
                  <div class="btn-group" style="float: right;">
                    <a href="<?= site_url('createAccount'); ?>">
                      <button type="button" class="btn btn-primary clearfix" style="border-radius: 0px">
                      <span class="fa fa-user-plus"></span> Créer un compte pour acheter
                      </button>
                    </a>
                  </div>
                <?php endif ?>

                <?php if (isset($this->session->userdata["auth_user"])):?>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                          <h4 class="modal-title" id="myModalLabel">Termes d'achat sur le site</h4>
                        </div>
                        <div class="modal-body">
                          <?= $presentations->row_object()->description;?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                          <button type="submit" name="cart" value="acheter" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="border-radius: 0px; float: right; margin-left: 4%"><i class=" fa fa-money"></i> Formulaire d'achat</button>
                        </div>
                      </div>
                    </div>
                  </div> 
                
                  <p>
                  	<span name="cart" value="acheter" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="border-radius: 0px; float: right; margin-left: 4%"><i class=" fa fa-money"></i> Soumettre</span>
                  
                    <button type="submit" name="cart" value="Mettre à jour" class="btn btn-warning" style="border-radius: 0px; float: right"><i class="fa fa-refresh"></i> Mettre à jour</button>
                  </p>

                  <?php endif;?>
                  
            </form>
          </div>
                <?php endif ?>
        </div>
        <!--End Advanced Tables -->
      </div>
      