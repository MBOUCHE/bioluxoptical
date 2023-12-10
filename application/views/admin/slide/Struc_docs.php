
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3 >
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> : <?= $presentation ?>
        </h3> <br>
          <span style="float: left; color: red; font-size: 17px"><?= $this->session->flashdata('flsh_mess'); ?></span><hr>
        <div class="row mt ">
          <form action="<?= site_url('admin/ControlPublic/addStrucDoc') ?>" method="post" enctype="multipart/form-data" />
            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 17px">
              <div class="dmbox">
                <h4>Formulaire d'ajout : Structuration et documents</h4><hr>
                <div class="service-icon col-lg-3 col-md-3">
                  <span class="fa fa-5x fa fa-dashboard" style='font-size: 125px'></span>
                </div>

                  <div class="col-lg-9 col-md-9">
                    <div class="col-lg-3 col-md-3">
                      Titre :
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <input class="form-control" type="text" name="title_rm" value="<?= !empty(set_value('title_rm')) ? set_value('title_rm') : '' ; ?>" placeholder="Titre de la documentation/ structuration">
                    </div>
                    <div class="<?= empty(form_error('title_rm')) ? "" : "has-error" ?>">
                      <?= empty(form_error('title_rm')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('title_rm'); ?></span >
                    </div>

                    <div class="col-lg-5 col-md-5">
                    <br> Fontawesome :
                    </div>
                    <div class="col-lg-7 col-md-7">
                      <br><input class="form-control" type="text" name="img_issue" value="<?= !empty(set_value('img_issue')) ? set_value('img_issue') : '' ; ?>" placeholder="fa fa-exemple : Un Fontawesome">
                    </div>
                    <div class="<?= empty(form_error('img_issue')) ? "" : "has-error" ?>">
                      <?= empty(form_error('img_issue')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('img_issue'); ?></span >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <label for="content; ?>" class="control-label" style="float: left; margin: 4%">Contenu : </label>


                      <div class="col-lg-12 compose-editor">
                        <textarea class="wysihtml5 form-control" rows="9" value="<?= !empty(set_value('content')) ? set_value('content') : ''; ?>" name="content" id="content" class="form-control">
                          <?= !empty(set_value('content')) ? set_value('content') : ''; ?>
                          
                        </textarea>
                        
                        <div class="<?= empty(form_error('content')) ? "" : "has-error" ?>">
                          <?= empty(form_error('content')) ? '' : '<br>' ?>
                          <span class="help-block "><?= form_error('content'); ?></span >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <button type="submit" ><i class="fa fa-check"></i><input type="submit" name="submit" class="btn btn-theme03" style="border-radius: 0px" value="Valider">
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <?php foreach ($structurationDocs->result_array() as $structurationDoc): ?>              
            <form action="<?= site_url('admin/ControlPublic/updateStrucDoc/'.$structurationDoc['id_issue']) ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 17px">
                <div class="dmbox">
                  <div class="service-icon col-lg-3 col-md-3">
                    <span class="fa fa-5x <?= $structurationDoc['img_issue'];?>" style='font-size: 125px'></span>
                  </div>

                  <div class="col-lg-9 col-md-9">
                    <div class="col-lg-3 col-md-3">
                      Titre :
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <input class="form-control" type="text" name="title_rm<?= $structurationDoc['id_issue']; ?>" value="<?= $structurationDoc['title_rm']; ?>">
                    </div>
                    <div class="<?= empty(form_error('title_rm'.$structurationDoc['id_issue'])) ? "" : "has-error" ?>">
                      <?= empty(form_error('title_rm'.$structurationDoc['id_issue'])) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('title_rm'.$structurationDoc['id_issue']); ?></span >
                    </div>

                    <div class="col-lg-5 col-md-5">
                    <br> Fontawesome :
                    </div>
                    <div class="col-lg-7 col-md-7">
                      <br><input class="form-control" type="text" name="img_issue<?= $structurationDoc['id_issue']; ?>" value="<?= $structurationDoc['img_issue']; ?>">
                    </div>
                    <div class="<?= empty(form_error('img_issue'.$structurationDoc['id_issue'])) ? "" : "has-error" ?>">
                      <?= empty(form_error('img_issue'.$structurationDoc['id_issue'])) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('img_issue'.$structurationDoc['id_issue']); ?></span >
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <label for="content<?= $structurationDoc['id_issue']; ?>" class="control-label" style="float: left; margin: 4%">Contenu : </label>


                      <div class="col-lg-12 compose-editor">
                        <textarea  class="wysihtml5 form-control" rows="9" value="<?= !empty(set_value('content'.$structurationDoc['id_issue'])) ? set_value('content'.$structurationDoc['id_issue']) : $structurationDoc['content'] ; ?>" name="content<?= $structurationDoc['id_issue']; ?>" id="content<?= $structurationDoc['id_issue']; ?>" class="form-control"
                          ><?= !empty(set_value('content'.$structurationDoc['id_issue'])) ? set_value('content'.$structurationDoc['id_issue']) : $structurationDoc['content'] ; ?>
                          
                        </textarea>
                        
                        <div class="<?= empty(form_error('content'.$structurationDoc['id_issue'])) ? "" : "has-error" ?>">
                          <?= empty(form_error('content'.$structurationDoc['id_issue'])) ? '' : '<br>' ?>
                          <span class="help-block "><?= form_error('content'.$structurationDoc['id_issue']); ?></span >
                        </div>
                      </div>


                    </div>
                    <div class="col-lg-12">
                      <a style="float: left;" href="<?= base_url('admin/ControlPublic/stateStrucDoc/').$structurationDoc['id_issue'].'/'.$structurationDoc['state_msg'] ;?>">
                        <div class="switch demo">
                          <input type="checkbox" style="width: 40px"
                            <?php 
                              if ($structurationDoc['state_msg']== -1 or $structurationDoc['state_msg'] == 0 ) 
                                echo('');
                              else echo('checked');
                            ?> >
                          <label><i></i></label>
                        </div>
                      </a>
                      <button type="submit" ><i class="fa fa-check"></i><input type="submit" name="submit<?= $structurationDoc['id_issue']; ?>" class="btn btn-theme03" style="border-radius: 0px" value="Valider<?= $structurationDoc['id_issue']?>">
                      </button>
                      
                    </div>
                  </div>


                  <hr>

                  <h5>Dernière modification : <br> <?= date("d/m/Y à H:i:s", strtotime( $structurationDoc['date_issue'])); ?></h5>
                  <p>Auteur : <?= $structurationDoc['fname_cost'].' '.$structurationDoc['sname_cost'].'<br> Fonction : '.$structurationDoc['profession']; ?></p>
                </div>
              </div>
            </form>
            <?php endforeach; ?>
          
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row content-panel">
          <h2 class="centered"><?= mb_strtoupper($manage.' - Gestion des arrières-plans'); ?></h2>
          <div class="col-md-10 col-md-offset-1 mt mb">
            <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseOne">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to purchase this template?
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseTwo">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How can I install my server?
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseThree">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to change color schemes?
                    </a>
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFour">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How to integrate Revolution Slider?
                    </a>
                </div>
                <div id="collapseFour" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseFive">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>How Can I get Support?
                    </a>
                </div>
                <div id="collapseFive" class="accordion-body collapse">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end accordion -->
          <!-- col-md-10 -->
        </div>
        <!--  /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
