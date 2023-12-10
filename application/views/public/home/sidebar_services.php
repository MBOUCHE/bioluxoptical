              <div class="col-lg-2 col-md-3 col-sm-5 col-xs-12" style="float: left;">
<!-- start sidebar -->

                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <?php if ($sub_title != 'Accueil') :?>
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url('Bioluxoptical/listStoreShop');?>">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%">
                        <?= mb_strtoupper('Services Génériques'); ?>
                      </h5>
                    </a>
                    <ul class="mu-sidebar-catg" style="width: 100%">

                      <?php foreach ($generic_services->result_array() as $generic_service): ?>
                        <li class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
                          <img style="float: right; width: 100%; padding: 4px" src="<?= base_url('assets/img/reason/').$generic_service['img_reason']; ?>">
                          <a class="btn btn-success" style="width: 100%; border-radius: 0px; font-size: 12px" href="<?= site_url('Bioluxoptical/details/'.$generic_service['id_reason']);?>">
                            <?= mb_strtoupper($generic_service['name_reason']); ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif?>
                  <!-- end single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url()?>#structDocs">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%; font-size: 12px"><?= mb_strtoupper('Structure et documentation'); ?></h5>
                    </a>
                    <ul class="mu-sidebar-catg img-thumbnail" style="width: 100%">

                      <?php foreach ($structurationDocs->result_array() as $structurationDoc): ?>

                      <li class="col-lg-12 col-md-12 col-sm-6 col-xs-6"><a href='<?= site_url('Bioluxoptical/readMore/'.$structurationDoc["id_issue"]); ?>'><?=$structurationDoc['title_rm'] ?></a><i style="float: right; padding: 6px;" class="<?=$structurationDoc['img_issue'] ?>"></i></li>

                      <?php endforeach; ?>

                    </ul>
                  </div>
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar" style="">
                    <a href="<?= site_url('Bioluxoptical/forum')?>#structDocs">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%; font-size: 12px"><?= mb_strtoupper('Sujets sur le Forum'); ?></h5>
                    </a>
                    <div class="mu-sidebar-catg img-thumbnail" style="width: 100%">

                      <?php foreach ($forum_sujects->result_array() as $forum_suject): ?>

                        <a class="col-lg-12 col-md-12 col-sm-6 col-xs-6" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?><img class="img-thumbnail" style="float: right; width: 50%" src="<?= base_url('assets/img/communication/'.$forum_suject['img_com']); ?>"></a><hr>


                      <?php endforeach; ?>

                    </div>
                  </div>
                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->
              </div>
