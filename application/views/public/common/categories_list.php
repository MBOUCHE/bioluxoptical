

          <div class="col-lg-2 col-md-3 col-sm-5 col-xs-12" style=" float: right; text-align: center;">


            <h6><?= mb_strtoupper('Votre correction dans le style de votre choix') ?></h6>
            <?php foreach ($Scategories->result_array() as $Scategorie): ?>
            <div class="list-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
              <a href="<?= site_url('Bioluxoptical/listGlassOnly/'.$Scategorie['id_cat'])?>" class="list-group-item active" style="border-radius: 0px;">
                <span style="text-align: justify;">
                  <?= $Scategorie['label']; ?>
                  <img src="<?= base_url('assets/img/category/');?><?= $Scategorie['img_cat']; ?>" style="width: 100%; height: 125px" class="img-thumbnail" alt="img"/>
                </span>
              </a>
              
              <?php foreach ($Ssub_categories->result_array() as $Ssub_categorie): ?>
              <?php if ($Scategorie['id_cat'] == $Ssub_categorie['id_cat']) : ?>

              <a style="border-radius: 0px; text-align: center; padding: 1px" href="<?= site_url('Bioluxoptical/listGlassOnly/'.$Scategorie['id_cat'].'/'.$Ssub_categorie['label_c_cat'])?>" class="list-group-item col-lg-12 col-md-12 col-sm-6 col-xs-6"><h6><?= strtoupper($Ssub_categorie['label_c_cat']); ?></h6> </a>

              <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <?php endforeach; ?>
          </div>

