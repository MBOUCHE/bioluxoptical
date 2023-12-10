
        <!--    Hover Rows  -->
       
        <?php 
          //print_r($[0] ->result_array()); die;

          foreach ($old_orders->result_array() as $old_order) : 
            
            $ids_reason = $this->db->select('id_reason, qty')->where('id_order', $old_order['id_ord'])->from('order_qty')->get()->result_array();
            if (sizeof($ids_reason)!=0) :
        ?>
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i style="">Confirmer le <?= date("d/m/Y à H:i:s", strtotime($old_order['confirm_date'])); ?></i>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                  <table class="responsive">
                      <thead>
                        <tr>
                          <th>Quantité</th>
                          <th>Désignation</th>
                          <th>Prix U.</th>
                        </tr>
                      </thead>
                      <tbody>  
                        
                      <?php 
                        foreach ($ids_reason as $id_reason) :

                        $reasons = $this->db->select('id_reason, img_reason, name_reason, price_reason')->where('id_reason', $id_reason['id_reason'])->from('reason')->get()->result_array(); 
                        ?>
                          <?php
                            foreach ($reasons as $items):  
                          ?>
                          <tr>
                            <td style="width: 101px">
                              <?php echo form_input(array('value' => $id_reason['qty'], 'style' => 'width:50%', 'min' => 1, 'disabled' => 'disabled')); ?>
                              

                              <img src="<?= base_url('assets/img/reason/'.$items['img_reason']); ?>" style="width: 100%">

                            </td>
                            <td><?= $items['name_reason']; ?> </td>
                            <td >
                              <label style="float: right;"><?php echo $this->cart->format_number($items['price_reason']); ?> FCFA</label>
                            </td>
                          </tr>

                          <tr style="float: bottom">
                            <td colspan="2" class="right">
                            <br>
                              <strong style="float: left;">Prix total : </strong>
                              <label style="float: right;">
                                <?php echo $this->cart->format_number($items['price_reason']* $id_reason['qty']); ?> FCFA</label>
                            <hr>
                            </td><td><br><hr></td><td><br><hr></td>
                          </tr>
                          <?php endforeach; ?>
                        <?php endforeach; ?>

                      </tbody>

                  </table>
                </div>
            </div>
            <div class="panel-footer">
              <i style=""><?= $old_order['state_paid']==1 ? '<label style="color: green">Paiement approuvé </label><a href="'.site_url('GeneratePdfController/receipt/'.$old_order['id_ord']).'" style="border-radius: 0px; padding: 4px; float: right;"><i class="fa fa-file-text-o"></i> Reçu_de_paiement.pdf</a>' : '
                  <a href="'.site_url('customer/CustomerPanel/delOrd/'.$old_order['id_ord']).'" class="btn btn-danger" style="border-radius: 0px; padding: 4px; float: right;"><i class=" fa fa-trash"></i> Renoncer</a><label style="color: red"> En attente pour vérification du paiement</label>'; ?>         
              </i>
            </div>
            <div class="panel-footer">
              <i style="">
                <tr style="float: bottom">
                  <td colspan="2" class="right">
                    <label class="btn btn-primary" style="border-radius: 0px; padding: 4px; float: right">
                    <strong style="">Total : </strong><?php echo $this->cart->format_number($old_order['total']); ?> FCFA</label>
                  </td>
                </tr>
              </i>
            </div>
        </div>
    </div>

    <?php endif; ?>

  <?php endforeach; ?>
        <!-- End  Hover Rows  -->