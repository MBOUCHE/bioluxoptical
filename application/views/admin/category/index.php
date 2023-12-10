
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> : 
          <span style="float: right; color: red; font-size: 17px"> <br><?= $this->session->flashdata('flsh_mess'); ?></span><hr>
        </h3>
        <div class="row mt ">
          <form action="<?= site_url('admin/ControlPublic/addCat'); ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 17px">
                <div class="dmbox">
                  <h4>Formulaire d'ajout :</h4><hr>
                  <div class="service-icon col-lg-4 col-md-4">
                    <div class="fileupload fileupload-new " data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 143px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 143px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image"><i class="fa fa-paperclip"></i> Changer</span>
                        <span class="fileupload-exists"  title="Choisir une image"><i class="fa fa-undo"></i> Changer</span>
                        <input type="file" name="userimage" class="default" />
                        </span>
                      </div>
                    </div>
                      
                    <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>
                  </div>

                  <div class="service-icon col-lg-8 col-md-8">
                    <i class="fa fa-5x fa-tag"></i>
                  </div>
                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <div class="col-lg-2 col-md-3">
                      Titre :
                    </div>
                    <div class="col-lg-10 col-md-9">
                      <input class="form-control" type="text" name="label" value="<?= !empty(set_value('label')) ? set_value('label') : '' ; ?>">
                    </div>
                    <div class="<?= empty(form_error('label')) ? "" : "has-error" ?>">
                      <?= empty(form_error('label')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('label'); ?></span >
                    </div>

                  </div>

                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    
                    <div class="col-lg-2 col-md-2">
                      Type : 
                    </div>

                    <div class="col-lg-10 col-md-10">
                      <select name="article" id="article" class="form-control">
                        <option value="">
                          ----------------------
                        </option>
                        <option value="LUNETTE" <?= (!empty(set_value('article')) and set_value('article') == 'LUNETTE') ? ' selected="selected"' : '' ;?>>
                          LUNETTE
                        </option>

                        <option value="MONTURE" <?= (!empty(set_value('article')) and set_value('article') == 'MONTURE') ? ' selected="selected"' : '' ;?>>
                          MONTURE
                        </option>

                        <option value="VERRE" <?= (!empty(set_value('article')) and set_value('article') == 'VERRE') ? ' selected="selected"' : '' ;?>>
                          VERRE
                        </option>

                        <option value="SERVICE" <?= (!empty(set_value('article')) and set_value('article') == 'SERVICE') ? ' selected="selected"' : '' ;?>>
                          SERVICE
                        </option>

                      </select>
                      
                      <div class="<?= empty(form_error('article')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('article'); ?></span >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="col-lg-3 col-md-3">
                        Génération : 
                      </div>

                      <div class="col-lg-7 col-md-7">
                        <input class="form-control" type="text" name="generation" value="<?= !empty(set_value('generation')) ? set_value('generation') : '' ; ?>" placeholder="Exple Astérix ">
                          
                        <div class="<?= empty(form_error('generation')) ? "" : "has-error" ?>">
                          <span class="help-block "><?= form_error('generation'); ?></span >
                        </div>
                      </div>

                    </div>
                    <div class="col-lg-6" style=" float: right;">
                      <button type="submit" ><i class="fa fa-check"></i><input type="submit" name="submit" class="btn btn-theme03" style="border-radius: 0px;" value="Ajouter">
                      </button>
                      
                    </div>
                  </div>

                </div>
              </div>
            </form>
            <!-- <div class="dmbox">
              <h4><?= $presentation ?> : </h4><hr>
            </div> -->
            <?php foreach ($categories->result_array() as $categorie): ?>              
            <form action="<?= site_url('admin/ControlPublic/updateCat/'.$categorie['id_cat']) ?>" method="post" enctype="multipart/form-data" />
              
              <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 17px">
                <div class="dmbox">

                  <div class="service-icon col-lg-4 col-md-4">
                    <div class="fileupload fileupload-new " data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 143px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 143px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image de remplacement"><i class="fa fa-paperclip"></i> Changer</span>
                        <span class="fileupload-exists"  title="Choisir une image de remplacement"><i class="fa fa-undo"></i> Changer</span>
                        <input type="file" name="userimage<?= $categorie['id_cat'];?>" value="<?= !empty(set_value('userimage'.$categorie['id_cat'])) ? set_value('userimage'.$categorie['id_cat']) : $categorie['img_cat'] ; ?>" class="default" />
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="service-icon col-lg-6 col-md-6">
                    <img src="<?= base_url('assets/img/category/'.$categorie['img_cat']) ?>" alt='img_cat' style="width: 100%">
                  </div>
                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <div class="col-lg-2 col-md-3">
                      Titre :
                    </div>
                    <div class="col-lg-10 col-md-9">
                      <input class="form-control" type="text" name="label<?= $categorie['id_cat']; ?>" value="<?= $categorie['label']; ?>">
                    </div>
                    <div class="<?= empty(form_error('label'.$categorie['id_cat'])) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('label'.$categorie['id_cat']); ?></span >
                    </div>

                  </div>

                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    
                    <div class="col-lg-2 col-md-2">
                      Type :
                    </div>

                    <div class="col-lg-10 col-md-10">
                      <select name="article<?= $categorie['id_cat']; ?>" id="article<?= $categorie['id_cat']; ?>" class="form-control">
                        
                        <option value="LUNETTE" <?= ($categorie['article'] == 'LUNETTE') ? ' selected="selected"' : '' ; ?>>
                          LUNETTE
                        </option>

                        <option value="MONTURE" <?= ($categorie['article'] == 'MONTURE') ? ' selected="selected"' : '' ; ?>>
                          MONTURE
                        </option>

                        <option value="VERRE" <?= ($categorie['article'] == 'VERRE') ? ' selected="selected"' : '' ; ?>>
                          VERRE
                        </option>

                        <option value="SERVICE" <?= ($categorie['article'] == 'SERVICE') ? ' selected="selected"' : '' ; ?>>
                          SERVICE
                        </option>

                      </select>
                      
                      <div class="<?= empty(form_error('article'.$categorie['id_cat'])) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('article'.$categorie['id_cat']); ?></span >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12">

                      <div class="col-lg-3 col-md-3">
                        Génération : 
                      </div>

                      <div class="col-lg-9 col-md-9">
                        <input class="form-control" name="generation<?= $categorie['id_cat']; ?>" type="text" value="<?= !empty(set_value('generation'.$categorie['id_cat'])) ? set_value('generation'.$categorie['id_cat']) : $categorie['generation'] ; ?>" id="generation<?= $categorie['id_cat']; ?>" class="form-control" placeholder="Génération : ">
                        
                        <div class="<?= empty(form_error('generation'.$categorie['id_cat'])) ? "" : "has-error" ?>">
                          <span class="help-block "><?= form_error('generation'.$categorie['id_cat']); ?></span >
                        </div>  
                      </div>

                    </div>
                    <div class="col-lg-6" style=" float: right;">
                      <button type="submit" ><i class="fa fa-refresh"></i><input type="submit" name="submit<?= $categorie['id_cat']; ?>" class="btn btn-theme04" style="border-radius: 0px;" value="Modifier">
                      </button>
                      
                    </div>
                  </div>

                  <a style="float: left;" href="<?= base_url('admin/ControlPublic/stateCat/').$categorie['id_cat'].'/'.$categorie['state_cat'] ;?>">
                    <div class="switch demo">
                      <input type="checkbox" style="width: 40px"
                        <?php 
                          if ($categorie['state_cat']== -1 or $categorie['state_cat'] == 0 ) 
                            echo('');
                          else echo('checked');
                        ?> >
                      <label><i></i></label>
                    </div>
                  </a>
                  <hr>

                  <h5>Dernière modification : <br> <?= date("d/m/Y à H:i:s", strtotime( $categorie['date_reg'])); ?></h5>
                  <p>Auteur : <?= $categorie['first_name'].' '.$categorie['second_name'].'<br> Fonction : '.$categorie['function']; ?></p>
                </div>
              </div>
            </form>
            <?php endforeach; ?>
          
          </div>
          <!--  /col-lg-12 -->
        </div>

      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
