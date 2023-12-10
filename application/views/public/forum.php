<section id="mu-course-content">
   <div class="mu-course-content-area">



  <!-- <div class="col-md-2"> la div insérée pour être généralisée -->
  <!-------------------------------------------------------->

        <?php include('common/left_sidebar_forum.php'); ?>

  <!-------------------------------------------------------->
  <!--</div> -->

        <div class="col-md-8">
          <!-- start course content container -->
          <div class="mu-course-container mu-blog-single" style="width: 100%">
            <div class="row">
              <div class="col-md-12">
                <article class="mu-blog-single-item">
                  <figure class="mu-blog-single-img">
                    <div class=" col-lg-6 col-md-6 col-sm-6">
                      <a href="#"><img class="img-thumbnail" src="<?= base_url('assets/img/communication/'.$forum_page->img_com);?>" style="width: 100%;"></a>
                    </div>
                    <div class=" col-lg-6 col-md-6 col-sm-6">
                      <figcaption class="mu-blog-caption">
                        
                        <h3><a href="#"><?= mb_strtoupper($forum_page->subject); ?></a></h3>

                          <?php $user0 = $this->db->select('id_costomer, fname_cost, sname_cost, genre, profile_img')->where('id_costomer', $forum_page->issuer_id)->get('customer')->row_object(); ?>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <img style="width: 100%" alt="img" src="<?= base_url('assets/img/customers/'.$user0->profile_img);?>" alt="profile_img">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="#">Par <?= (($user0->genre==1) ? 'M. ' : 'Mme '). mb_strtoupper($user0->fname_cost.' '.$user0->sname_cost); ?></a>
                            
                          </div>
                      
                      </figcaption>
                      <a href="#"> depuis le <?php $datestring = '%d/%m/%Y - %H:%i:%s'; echo date("d/m/Y à H:i:s", strtotime($forum_page->date_init)); ?></a><hr>
                      <i class="fa fa-5x <?= $forum_page->img_issue; ?>"></i><p> <?= $forum_page->descrip; ?></p> 
                    </div>
                                          
                  </figure>
                  
                  <div class="mu-blog-description">
                    <blockquote>
                      <p >
                        <?= $forum_page->content;?>
                      </p>                            
                    </blockquote>
                    <ul>
                      <?php foreach ($messages->result_array() as $message): ?>

                      <li><?= $message['content']; ?></li>

                      <?php endforeach; ?>

                    </ul>
                    
                  </div>
                  <!-- start blog post tags -->
                  <div class="mu-blog-tags">

                    <ul class="breadcrumb mu-news-single-tagnav">
                      <label class="bg-info" style="padding: 4px">Sujets sur le forum :</label>

                      <?php foreach ($forum_sujects->result_array() as $forum_suject): ?>
                        <li>
                          <a href="<?= site_url('Bioluxoptical/forum/'.$forum_suject['id_com'])?>"><?=$forum_suject['subject'] ?></a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                    When answering a question please:
Read the question carefully.
Understand that English isn't everyone's first language so be lenient of bad spelling and grammar.
If a question is poorly phrased then either ask for clarification, ignore it, or edit the question and fix the problem. Insults are not welcome.
Don't tell someone to read the manual. Chances are they have and don't get it. Provide an answer or move on to the next question. 
Let's work to help developers, not make them feel stupid. 
                  </div>
                  <!-- End blog post tags -->
                  <!-- start blog social share -->
                  <div class="mu-blog-social">
                    <ul class="mu-news-social-nav">
                      <li>SOCIAL SHARE :</li>
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    </ul>
                  </div>
                  <!-- End blog social share -->
                </article>
              </div>                                   
            </div>
          </div>
          <!-- end course content container -->
          

        </div>


  <!-- <div class="col-md-3"> la div insérée pour être généralisée : à ne pas toucher -->
  <!-------------------------------------------------------->

        <?php include('common/right_sidebar.php'); ?>

  <!-------------------------------------------------------->
  <!--</div> -->
     </div>

     <?php include('home/testimonial.php'); ?>

 </section>
