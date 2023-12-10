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
                      <a href="#"><img style="width: 100%;" alt="img" src="<?= base_url('assets/img/communication/'.$communication->img_com);?>"></a>
                    </div>
                    
                    <div class=" col-lg-6 col-md-6 col-sm-6">
                      <figcaption class="mu-blog-caption">
                        
                        <h3><a href="#"><?= mb_strtoupper($communication->subject); ?></a></h3>

                          <?php $user0 = $this->db->select('id_costomer, fname_cost, sname_cost, genre, profile_img')->where('id_costomer', $communication->id_user)->get('customer')->row_object(); ?>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <img style="width: 100%" alt="img" src="<?= base_url('assets/img/customers/'.$user0->profile_img);?>" alt="profile_img">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="#">Par <?= (($user0->genre==1) ? 'M. ' : 'Mme '). mb_strtoupper($user0->fname_cost.' '.$user0->sname_cost); ?></a>
                            
                          </div>
                      
                      </figcaption>
                          <a href="#"> depuis le <?php $datestring = '%d/%m/%Y - %H:%i:%s'; echo date("d/m/Y à H:i:s", strtotime($communication->date_init)); ?></a><hr>
                      <p><?= $communication->descrip; ?></p> 
                      <div class="media-body">
                        <a class="mu-read-more-btn" href="<?= site_url('/forum') ?>" style="float: right; color: black">
                          <span class="fa fa-long-arrow-left"> RETOURNER A LA LISTE DES SUJETS </span>
                        </a>
                      </div> 
                    </div>
                                        
                  </figure>
                  <div class="container-fluid">
                  
                    <blockquote>
                      <p><?php $content = $this->db->from('issue')->where('communicate.id_com',$communication->id_com)->where('title_rm', 'indexForum')->join('communicate', 'communicate.id_com=issue.id_com')->get()->row_object(); ?>

                        <?= !is_null($content) ? $content->content : ''; ?>
                      </p>                            
                    </blockquote>
                    <div class="row">
                      <div class="col-md-12">
                        <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?= base_url('Bioluxoptical/send_msg'); ?>" enctype="multipart/form-data"/>
                          <input type="hidden" name="id_com" value="<?= $communication->id_com; ?>">
                          <div class="mu-comments-area">
                            <h3>
                              <?php $total= $this->db->from('issue')->select('id_issue')->where('id_com', $communication->id_com)->where('state_msg', 1)->count_all_results()-1; ?>
                              <span><i class="fa fa-comments-o"></i><?= ($total==0 or $total ==-1) ? 'Aucune réponse pour le moment' : (($total==1) ? 'Déjà une réponse' : $total. ' Réponses' ); ?> </span>
                            </h3>
                            <div class="comments">
                              <ul class="commentlist">
                              <?php if($total > 0 ): ?>

                              <?php foreach ($issues->result_array() as $issue): ?>
                                <?php 

                                $user = $this->db->where('id_costomer',$issue['issuer_id'])
                                                ->join('customer_role', 'customer_role.id_user=customer.id_costomer')
                                                ->get('customer')->row_object(); 
                                //var_dump($user);
                                ?>
                                <li>
                                  <div class="media">
                                    <?php if(isset($this->session->userdata['auth_user']['id_user']) and $this->session->userdata['auth_user']['id_user'] == $user->id_costomer): ?>
                                      <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
                                        <div class="media-body">
                                          <?php if($user0->id_costomer == $user->id_costomer): ?>
                                            <span class="author-tag">Autheur</span>
                                          <?php endif; ?>
                                          <p><?= $issue['content']; ?></p>
                                        </div>
                                        
                                      </div>
                                      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">

                                        <div class="media-right">  
                                         <h4 class="author-name"><?= $user->fname_cost.' '.$user->sname_cost; ?></h4>  
                                          <img alt="img" src="<?= base_url('assets/img/customers/'.$user->profile_img) ?>" class="media-object news-img img-thumbnail">
                                         <span class="comments-date"><?= date("d/m/Y H:i:s", strtotime($issue['date_issue'])); ?></span>
                                        </div>

                                      </div>

                                    <?php elseif (isset($this->session->userdata['auth_user']['id_user']) and $this->session->userdata['auth_user']['id_user'] != $user->id_costomer) : ?>

                                      
                                      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
                                        <div class="media-left">  
                                         <h4 class="author-name"><?= $user->fname_cost.' '.$user->sname_cost; ?></h4>  
                                          <img alt="img" src="<?= base_url('assets/img/customers/'.$user->profile_img) ?>" class="media-object news-img img-thumbnail">
                                         <span class="comments-date"><?= date("d/m/Y H:i:s", strtotime($issue['date_issue'])); ?></span>
                                        </div>
                                      </div>

                                      <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
                                        <div class="media-body">
                                          <?php if($user0->id_costomer == $user->id_costomer): ?>
                                            <span class="author-tag">Autheur</span>
                                          <?php endif; ?>
                                          <p><?= $issue['content']; ?></p>
                                          <a class="reply-btn" href="#" style="float: right;">Reprendre <span class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                      </div>

                                    <?php else: ?>

                                      <div class="media-left">  
                                       <h4 class="author-name"><?= $user->fname_cost.' '.$user->sname_cost; ?></h4>  
                                        <img alt="img" src="<?= base_url('assets/img/customers/'.$user->profile_img) ?>" class="media-object news-img img-thumbnail">
                                       <span class="comments-date"><?= date("d/m/Y H:i:s", strtotime($issue['date_issue'])); ?></span>
                                      </div>
                                      <div class="media-body">
                                        <?php if($user0->id_costomer == $user->id_costomer): ?>
                                          <span class="author-tag">Autheur</span>
                                        <?php endif; ?>
                                      <a class="reply-btn" href="#" style="float: right;">Reprendre <span class="fa fa-long-arrow-right"></span></a>
                                      
                                     <p><?= $issue['content']; ?></p>
                                    <?php endif ?>
                                  </div>
                                </li>


                              <?php endforeach; ?>

                              <?php endif ?>
                                
                              </ul>
                            <!-- comments pagination -->
                            </div>

                            <?php if($communication->state != 2): ?>
                            <div class=" col-lg-12 col-md-12">
                              <div class=" col-lg-10 col-md-10">
                                <div class="compose-editor"><br>
                                  <textarea  class="wysihtml5 form-control" rows="9" value="<?= set_value('content'); ?>" name="content" id="content" class="form-control">
                                    <?= set_value('content'); ?>
                                  </textarea>

                                  <div class="<?= empty(form_error('content')) ? "" : "has-error" ?>">
                                    <span class="help-block "><?= form_error('content'); ?></span >
                                  </div>
                                </div>
                              </div>
                              <div class=" col-lg-2 col-md-2">
                                  <p class="form-submit" style="margin-top: 100%">
                                    <button class="mu-post-btn" type="submit" value="Enregistrer" style="margin: 4%; float: right; border-radius: 0px"><span class="fa fa-send"></span> Envoyer</button>
                                  </p>
                                  <?php //var_dump($user); die; 
                                    if(isset($user) and isset($this->session->userdata['auth_user']['id_user']) and $this->session->userdata['auth_user']['id_user'] == $user->id_costomer and $user0->id_costomer == $user->id_costomer): 
                                  ?>
                                    <p class="form-submit" style="margin-top: 100%">
                                      <a class="mu-post-btn" href="<?= base_url('Bioluxoptical/satisfy/'.$communication->id_com); ?>" style="margin: 4%; float: right; border-radius: 0px"><span class="fa fa-thumbs-o-up"></span> Satisfait</a>
                                    </p>
                                  <?php endif; ?>
                              </div>
                            </div>

                            <?php else: ?>
                              <div class="row">
                                  <p class="form-submit mu-post-btn" style="width: 100%">
                                    Sujet résolu.
                                  </p>
                              </div>
                            <?php endif; ?>
                              <hr>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- end blog comment -->

                    
                  </div>
                  <!-- start blog post tags -->
                  <div class="mu-blog-tags">
                    <ul class="mu-news-single-tagnav">
                      <li>Sujets connexes :</li>
                      <li><a href="#">Science,</a></li>
                      <li><a href="#">English,</a></li>
                      <li><a href="#">Sports,</a></li>
                      <li><a href="#">Health</a></li>
                    </ul>
                  </div>
                  <!-- End blog post tags -->

                  
                  <!-- start blog social share -->

                  <?php include('common/blog_social.php'); ?>
                  
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