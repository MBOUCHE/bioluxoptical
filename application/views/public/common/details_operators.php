

          <div class="col-lg-2 col-md-3 col-sm-5 col-xs-12">
            
            <div class="panel-group" id="accordion">


              <?php foreach ($operators->result_array() as $operator): ?>


              <div class="panel panel-default">
                <a class="" data-toggle="collapse" data-parent="#accordion" href="#<?= $operator['id_prov'];?>">
                  <div class="panel-heading btn btn-info" style="width: 100%">
                    <h4 class="panel-title">
                      <span style="float: left;">Par </span><?= $operator['name_prov'];?>
                    </h4>
                  </div>
                </a>
                <div id="<?= $operator['id_prov'];?>" class="panel-collapse collapse <?= (isset($id_op) and $id_op == $operator['id_prov']) ? 'in' : '' ;?>">
                  <div class="panel-body">
                    <img class="img-rounded" style="float: left; width: 100%; height: 71px; margin-right: 0.1%" src="<?= base_url('assets/img/') ?>pay/<?= $operator['img_logo']; ?>" alt='img_logo'>
                    <?php //$operator['contact']; //$operator['social_reason'];  ?>
                    Compte de paiement : <br>" <?= $operator['code_number']; ?> "<hr>

                    Procédure de paiement : <br><?= $operator['description']; ?>

                  </div>
                </div>
              </div>

              <?php endforeach; ?>

            </div>
          </div>