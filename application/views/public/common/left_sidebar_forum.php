              

          <div class="col-lg-2 col-md-3 col-sm-5 col-xs-12" style=" float: left;">

                <aside class="mu-sidebar" style="width: 100%">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url('Bioluxoptical/listStoreShop');?>">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%">
                        <?= mb_strtoupper('Services génériques'); ?>
                      </h5>
                    </a>
                    <ul class="mu-sidebar-catg">

                      <?php foreach ($generic_services->result_array() as $generic_service): ?>
                        
                        <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                          <a href="<?= site_url('Bioluxoptical/serviceReadMore/'.$generic_service['id_reason']) ?>"><?= $generic_service['name_reason']; ?> 
                          <img class="img-thumbnail" style="float: right; width: 50%" src="<?= base_url('assets/img/reason/').$generic_service['img_reason']; ?>">
                          </a>
                        </li>

                      <?php endforeach; ?>
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <div class="mu-single-sidebar">
                    <a href="<?= site_url()?>#structDocs">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: center;width: 100%"><?= mb_strtoupper('Vos possibilités'); ?></h5>
                    </a>
                    <ul class="mu-sidebar-catg">
                      <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                        <a href='<?= site_url("Bioluxoptical/propose"); ?>'>Proposer un sujet</a>
                        <i style="float: right; padding: 6px;" class=""></i>
                      </li>
                      <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                        <a href='<?= site_url(""); ?>'>Consulter un opticien lunettier</a>
                        <i style="float: right; padding: 6px;" class=""></i>
                      </li>

                      <li class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
                        <a href='<?= site_url(""); ?>'>Essayer une monture</a>
                        <i style="float: right; padding: 6px;" class=""></i>
                      </li>
                    </ul>
                  </div>
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar" style="">
                    <a href="<?= site_url('Bioluxoptical/forum')?>">
                      <h5 class="btn btn-info" style="border-radius: 0px; text-align: left;width: 100%"><?= mb_strtoupper('Sujets clos'); ?></h5>
                    </a>
                    <div class="tag-cloud">

                      <?php foreach ($forum_close_sujects->result_array() as $forum_suject): ?>
                        
                      <?php if (isset($communication->id_com) and $communication->id_com != $forum_suject['id_com']) : ?>
                      <a class="col-lg-12 col-md-12 col-sm-6 col-xs-4" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?>
                        <img class="img-thumbnail" style="float: left; width: 50%" src="<?= base_url('assets/img/communication/'.$forum_suject['img_com']); ?>">
                        <span style="text-align: right;"><i class="fa fa-2x fa-comments-o"></i> <?= $this->db->select('id_issue')->where('id_com', $forum_suject['id_com'])->count_all_results('issue'); ?></span>
                      </a>
                      <?php else: ?>
                        <a class="col-lg-12 col-md-12 col-sm-6 col-xs-4" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?>
                          <img class="img-thumbnail" style="float: left; width: 50%" src="<?= base_url('assets/img/communication/'.$forum_suject['img_com']); ?>">
                          <span style="text-align: right;"><i class="fa fa-2x fa-comments-o"></i> <?= $this->db->select('id_issue')->where('id_com', $forum_suject['id_com'])->count_all_results('issue'); ?></span>
                        </a>
                      <?php endif; ?>
                      <?php endforeach; //var_dump($forum_close_sujects->result_array()); ?>

                    </div>
                  </div>
                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->
              </div>
