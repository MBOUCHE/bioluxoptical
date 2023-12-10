 <!-- Start from blog -->
  <section id="mu-from-blog" style="margin-top: -4%">

            <!-- start title -->
        <div class="mu-title">
          <h2><?= $index_com_advise->subject; ?>S GENERAUX</h2>
          <p><?= $index_com_advise->descrip; ?></p>
        </div>
            <!-- end title -->
        <div class="mu-from-blog-area" style="text-align: justify;">


<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

              <?php include('common/right_sidebar.php'); ?>

<!-------------------------------------------------------->
<!--</div> -->
          <div class="col-md-8 col-lg-8 col-sm-9">  
            <!-- start from blog content   -->

              <div class="panel-group" id="accordion">

                <?php foreach ($advides->result_array() as $advide): ?>

                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $advide['id_issue']; ?>">
                        <?= $advide['title_rm']; ?>
                        <a style="float: right;" href="<?= base_url('Bioluxoptical/readMore/').$advide['id_issue'];?>">Autre</a>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?= $advide['id_issue']; ?>" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <i class="fa fa-5x <?= $advide['img_issue']; ?>"></i>
                      <?= $advide['content']; ?>
                      <label style="float: right;"><br>
                        <i>Par <?= $advide['fname_cost'].' '.$advide['sname_cost']; ?></i> - <?= $advide['profession']; ?>
                      </label>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>

              </div>
              <hr>
          </div>
        </div>

<!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
<!-------------------------------------------------------->

              <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->
<!--</div> --> 
        </div>
  </section>
  <!-- End from blog -->