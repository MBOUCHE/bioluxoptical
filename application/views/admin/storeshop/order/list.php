
    <section id="main-content" class="">
      <section class="wrapper">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>
          <?= (!isset($sub_title) ? $sub_title : ''); ?> <span><?= $this->session->flashdata('flsh_mess'); ?></span>
        </h3><hr>
        <!-- page start-->
          <div class="content-panel">
            <div class="adv-table container-fluid">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th style="width:  %">Client - Magasin</th>
                    <th style="width:  100%">Paiement</th>
                    <th style="width:  %">Produit(s)/Service(s)</th>
                    <th style="width:  50px"><span class="fa fa-dashboard"></span></th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php foreach ($orders->result_array() as $order): ?>

                  <tr class=" <?php 
                      if ($order['state_paid'] == -1 ) echo('gradeX'); 
                      elseif ($order['state_paid'] == 1 ) echo('gradeA');
                      elseif ($order['state_paid'] == -2 ) { 
                        if($order['confirm_date']==null) echo('gradeU');
                        elseif (!is_null($order['id_manager'])) echo('gradeA');
                        else echo('gradeX');
                      }
                      else echo('gradeC'); ?>">

                    <td><?= $order['genre'] == 1 ? 'M. ' : 'Mme '; ?>
                      <?= $order['fname_cost'].' '.$order['sname_cost']; ?>

                      <?php $slice_age = $this->db->select('content')->where('id_slice_age', $order['id_slice_age'])->get('slice_age')->row_object();?>
                        <span style="float: right;"><?= $slice_age->content; ?></span><br>
                        <span style="font-size: 22px; margin-top: 1%" class="fa fa-phone"></span>
                        <a href="tel:<?= $order['phone']; ?>"><?= $order['phone']; ?></a><br>
                      <img src="http://localhost/bioluxoptical/assets/img/logo_gm.png" alt="logo" style="width: 22px;">
                      <a style="font-size: 15px" href="mailto:info@bioluxoptical.com"><?= $order['email_cost']; ?></a>
                    </td>
                    <td class="hidden-phone">
                      <span>Reférence : <?= $order['paid_ref']; ?>.<br></span>
                      <span>Compte utilisé : <?= $order['account_paid']?></span><br>
                      
                      <label><?= "Date de la commande : ". $order['order_date'] ; ?></label> <br>
                      <label><?= $order['state_paid'] == 1 ? "Date de paiement : ". $order['confirm_date'] : "Sousmission du paiement : ". $order['confirm_date']  ?></label>
                      <hr>
                      <span style="float: right;">Magasin : <?= $order['name']; ?>.</span>
                      
                    </td>

                    <td class="hidden-phone" style="text-align: justify;">
                      <?php
                        $rea_qties = $this->db->select('qty, id_reason')->where('id_order', $order['id_ord'])->get('order_qty');
                      ?>
                      <?php foreach ($rea_qties->result_array() as $rea_qtie): ?>
                        <?php
                          $reason = $this->db->select('name_reason, price_reason, code_reason')->where('id_reason', $rea_qtie['qty'])->get('reason')->row_object();
                        ?>
                        <label><?= $reason->name_reason." - (Code : ".$reason->code_reason.") <br> Quantité x prix => ".$rea_qtie['qty']." x ".$reason->price_reason." FCFA"; ?> </label><hr>
                      <?php endforeach; ?>
                      <label style="float: right; color: green; font-size: 17px"><?= $order['state_paid'] == 1 ? "Versé : ". $order['total'] : "à verser : ". $order['total']  ?> FCFA</label>
                    </td>
                    
                    <td style="text-align: center;">


                      <button data-toggle="modal" data-target="#myModal4<?= $order['id_ord'];?>" style="margin: 2%; border-radius: 4px; font-size: 17px;" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                      </button>


                      <!-- Modal 4 : Suppression -->
                      <div class="modal fade" id="myModal4<?= $order['id_ord'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $order['id_ord'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel<?= $order['id_ord'];?>">Alerte de suppression</h4>
                            </div>
                            <div class="modal-body">
                              Êtes-vous sûr de vouloir supprimer cette commande ? :
                              <?= $order['paid_ref']; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a href="<?= base_url('admin/C_StoreShop/delOrd/').$order['id_ord'];?>">
                              <button type="button" class="btn btn-danger">Supprimer</button></a>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- Button trigger modal -->
                      <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal0<?= $order['id_ord']; ?>" style="margin: 2%; border-radius: 4px; font-size: 17px;">
                        <i class="fa fa-eye "></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal0<?= $order['id_ord']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                              <h4 class="modal-title" id="myModalLabel">Reférence : <?= $order['paid_ref']; ?></h4>
                            </div>
                            <div class="img-thumbnail">                       
                              <div class="col-lg-6 col-md-6">

                                <?php if ($order['state_paid'] != -2 ) : ?>
                                <label class="">Opérateur : <?= $order['name_prov']." <br>".$order['code_number']; ?></label>
                                <a href="<?= base_url('admin/C_StoreShop/changeOrd/').$order['id_ord'].'/'.$order['state_paid'] ;?>">
                                  <div class="switch demo">
                                    <input type="checkbox" style="width: 50px"
                                      <?php 
                                        if ($order['state_paid']== -1 or $order['state_paid'] == 0 ) 
                                          echo('');
                                        else echo('checked');
                                      ?> >
                                    <label><i></i></label>
                                  </div>
                                </a>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <?php if(!is_null($order['confirm_date'])): $pay = $this->db->where('id_prov', $order['id_op'])->get('provider')->row_object(); ?>

                                <img class="img-thumbnail" style="width: 100%" src="<?= base_url('assets/img/pay/').$pay->img_logo; ?>">
                                <?php else: ?>
                                  En attente de confirmation
                                <?php endif; ?>
                              </div>
                                <?php else: ?>
                                <label class="">Changer l'état du bouton pour confirmer la réception de cette demande</label>
                                <a href="<?= base_url('admin/C_StoreShop/changeOrdMesure/').$order['id_ord'].'/'.$order['state_paid'] ;?>">
                                  <div class="switch demo">
                                    <input type="checkbox" style="width: 50px"
                                      <?php 
                                        if (is_null($order['id_manager'])) 
                                          echo('');
                                        else echo('checked');
                                      ?> >
                                    <label><i></i></label>
                                  </div>
                                </a>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <?php if(!is_null($order['confirm_date'])): $pay = $this->db->where('id_prov', $order['id_op'])->get('provider')->row_object(); ?>

                                <img class="img-thumbnail" style="width: 100%" src="<?= base_url('assets/img/pay/').$pay->img_logo; ?>">
                                <?php else: ?>
                                  En attente de confirmation
                                <?php endif; ?>
                              </div>
                                <?php endif; ?>
                            </div>
                            <br> 
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
          <!-- page end-->
        <!-- /col-lg-3 -->
      </section>
    </section>
    <!--main content end-->

