              

          <div class="col-lg-2 col-md-3 col-sm-5 col-xs-12" style=" float: left;">

                <aside class="mu-sidebar" style="width: 100%">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url('Bioluxoptical/listStoreShop');?>">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%">
                        <?= mb_strtoupper('Ville'); ?>
                      </h5>
                    </a>
                    <ul class="mu-sidebar-catg" style="padding: 4%">

                      <?php foreach ($towns->result_array() as $town): ?>
                        
                        <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                          <a href="<?= site_url('Bioluxoptical/listStoreShop/'.$town['id_town']);?>"><?= $town['name_town']; ?> 
                          </a>
                          <img style="float: right; width: 31px; padding: 4px" src="<?= base_url('assets/img/country/').$town['img_flag']; ?>">
                        </li>

                      <?php endforeach; ?>
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url()?>#structDocs">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%"><?= mb_strtoupper('Structure / <br>documentation'); ?></h5>
                    </a>
                    <ul class="mu-sidebar-catg" style="padding: 4%">

                      <?php foreach ($structurationDocs->result_array() as $structurationDoc): ?>

                        <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                          <a href='<?= site_url('Bioluxoptical/readMore/'.$structurationDoc["id_issue"]); ?>'><?=$structurationDoc['title_rm'] ?></a><i style="float: right; padding: 6px;" class="<?=$structurationDoc['img_issue'] ?>"></i>
                        </li>

                      <?php endforeach; ?>

                    </ul>
                  </div>

                <?php if ($sub_title != 'Forum') : ?>
                
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url('Bioluxoptical/forum')?>#structDocs">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center; width: 100%"><?= mb_strtoupper('Sujets non clos'); ?></h5>
                    </a>
                    <div class="tag-cloud" style="padding: 4%">

                      <?php foreach ($forum_sujects->result_array() as $forum_suject): ?>

                      <?php if (isset($communication->id_com) and $communication->id_com != $forum_suject['id_com']) : ?>
                      <a class="col-lg-12 col-md-12 col-sm-12 col-xs-12" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?>
                        <img class="img-thumbnail" style="width: 50%" src="<?= base_url('assets/img/communication/'.$forum_suject['img_com']); ?>">
                        <span style="text-align: right;"><i class="fa fa-2x fa-comments-o"></i> <?= $this->db->select('id_issue')->where('id_com', $forum_suject['id_com'])->count_all_results('issue'); ?></span>
                      </a><hr>

                      <?php else: ?>
                      <a class="col-lg-12 col-md-12 col-sm-12 col-xs-12" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?>
                        <img class="img-thumbnail" style="width: 50%" src="<?= base_url('assets/img/communication/'.$forum_suject['img_com']); ?>">
                        <span style="text-align: right;"><i class="fa fa-2x fa-comments-o"></i> <?= $this->db->select('id_issue')->where('id_com', $forum_suject['id_com'])->count_all_results('issue'); ?></span>
                      </a><hr>

                      <?php endif; ?>

                      <?php endforeach; ?>

                    </div>
                  </div>
                  <!-- end single sidebar -->
                <?php endif; ?>  
                </aside>
                <!-- / end sidebar -->
              </div>
