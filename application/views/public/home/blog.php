
  <!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>Sujets récurents sur le forum</h2>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae quae vero ut natus. Dolore!</p> -->
            </div>
            <!-- end title -->  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">

                <?php foreach ($forum_sujects->result_array() as $forum_suject): ?>

                
                      
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a style="width: 100%" href="#"><img src="<?= base_url('assets/img/communication/'.$forum_suject["img_com"]) ?>" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="#"><?=$forum_suject['subject'] ?></a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <span><i class="fa fa-comments-o"></i>
                        <?= $this->db->where('state_msg=1')->where('issue.id_com', $forum_suject['id_com'])->join('communicate', 'communicate.id_com=issue.id_com')->count_all_results('issue');
                        ?>
                      </span><br>
                      <a href="#">Initié le <?= date("d/m/Y à H:i:s", strtotime($forum_suject["date_init"])); ?></a><br>
                        <?php
                          $user = $this->db->select('first_name, function')->where('id_user', $forum_suject["id_user"])->get('users')->row_object()
                        ?>
                      <a href="#">Par :  <?= $user->first_name.' - '.$user->function; ?></a>
                    </div>
                    <div class="mu-blog-description">
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ipsum non voluptatum eum repellendus quod aliquid. Vitae, dolorum voluptate quis repudiandae eos molestiae dolores enim.</p> -->
                      <div class="media">
                        <a class="mu-read-more-btn" href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com']); ?>">En savoir <i class="fa fa-plus"></i></a>
                      </div>
                  </article>
                </div>

                <?php endforeach; ?>

            </div>     
            <!-- end from blog content   -->   
          </div>
        </div>
    </div>
  </section>
  <!-- End from blog -->
