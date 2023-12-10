 
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner" class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= $sub_title; ?>  <span style="float: right;"><?= $presentation; ?></span> </h4>
                        <?= (!empty($this->session->flashdata('flsh_mess'))) ? '<br><span style="color: green">'.$this->session->flashdata('flsh_mess').'</span>' : ''; ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                   
                        <div class="chat-panel panel panel-primary chat-boder chat-panel-head" style="width: 100%">
                            <div class="panel-heading" style="padding: 4px">
                              <?php $total= $this->db->from('issue')->select('id_issue')->where('id_com', $consult->id_com)->where('state_msg', 1)->count_all_results()-1; ?>
                                <i class="fa fa-comments-o"> </i> <?= ($total==0 or $total ==-1) ? 'Aucune réponse pour le moment' : (($total==1) ? 'Déjà une réponse' : $total. ' Réponses' ); ?>
                                
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu slidedown">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-refresh fa-fw"></i>Refresh
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-check-circle fa-fw"></i>Available
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-times fa-fw"></i>Busy
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-clock-o fa-fw"></i>Away
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-sign-out fa-fw"></i>Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <ul class="chat-box">
                                    <?php foreach ($issues->result_array() as $issue) : 
                                        $profile = $this->db->where('id_costomer', $issue['issuer_id'])->get('customer')->row_object();
                                    ?>

                                    <?php if ($issue['issuer_id'] != $this->session->userdata['auth_user']["id_user"]) : ?>
                                    <li class="left clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span class="pull-left col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                            <img src="<?= base_url('assets/img/customers/'.$profile->profile_img) ?>" alt="User" class="img-circle img-thumbnail" style="width: 100%"/>
                                        </span>
                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">                                        
                                            <strong ><?= ($profile->genre=='1' ? 'M. ' : 'Mme '). $profile->fname_cost.' '.$profile->sname_cost ?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?= date('H:i:s [d-m-Y]', strtotime($issue['date_issue'])); ?>
                                            </small>                                      
                                            <p>
                                                <?= $issue['content']; ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php else : ?>
                                    <li class="right clearfix">
                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                                                   
                                            <small class="pull-left text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?= date('H:i:s [d-m-Y]', strtotime($issue['date_issue'])); ?>
                                            </small>                                     
                                            <p>
                                                <?= $issue['content']; ?>
                                            </p>
                                        </div>
                                        <span class="pull-right col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                            <img src="<?= base_url('assets/img/customers/'.$profile->profile_img) ?>" alt="User" class="img-circle img-thumbnail" style="width: 100%"/>   
                                        </span>
                                    </li>
                                    <?php endif; ?>

                                    <?php endforeach; ?>

                                </ul>
                            </div>

                        </div>
                    
                    </div>

                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="mu-contact-left">
                          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?= base_url('Bioluxoptical/send_msg'); ?>" enctype="multipart/form-data"/>
                          <input type="hidden" name="id_com" value="<?= $consult->id_com; ?>">
                          <div class="mu-comments-area">                           

                            <?php if($consult->state != 2): ?>
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
                                      <a class="mu-post-btn" href="<?= base_url('Bioluxoptical/satisfy/'.$consult->id_com); ?>" style="margin: 4%; float: right; border-radius: 0px"><span class="fa fa-thumbs-o-up"></span> Satisfait</a>
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
			    </div>
                 <!-- /. ROW  -->
                <hr />                
                
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
