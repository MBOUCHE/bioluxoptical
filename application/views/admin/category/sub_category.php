
    <?php $categories = $this->db->where('state_cat', 1)->get('category'); ?>


    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> 
          <span style="float: right; color: red; font-size: 17px"> <br><?= $this->session->flashdata('flsh_mess'); ?></span><hr>
        </h3>
        <div class="row mt ">
          <form action="<?= site_url('admin/ControlPublic/addSubCat'); ?>" method="post" enctype="multipart/form-data" />
              
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
                          <span class="fileupload-new" style="border-radius: 0px" title="Choisir une image de remplacement"><i class="fa fa-paperclip"></i> Changer</span>
                        <span class="fileupload-exists"  title="Choisir une image de remplacement"><i class="fa fa-undo"></i> Changer</span>

                        <input type="file" name="userimage" class="default" />

                        </span>
                      </div>
                    </div>
                      
                    <div class="<?= empty(form_error('userimage')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('userimage'); ?></span >
                    </div>
                  </div>

                  <div class="service-icon col-lg-8 col-md-8">
                    <i class="fa fa-5x fa-tags"></i>
                  </div>
                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <div class="col-lg-4 col-md-5">
                      Sous-catégorie :
                    </div>
                    <div class="col-lg-8 col-md-7">
                      <input class="form-control" type="text" name="label_c_cat" value="<?= !empty(set_value('label_c_cat')) ? set_value('label_c_cat') : '' ; ?>">
                    </div>
                    <div class="<?= empty(form_error('label_c_cat')) ? "" : "has-error" ?>">
                      <?= empty(form_error('label_c_cat')) ? '' : '<br>' ?>
                      <span class="help-block "><?= form_error('label_c_cat'); ?></span >
                    </div>

                  </div>

                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    

                    <div class="col-lg-3 col-md-4">
                      Catégorie :
                    </div>

                    <div class="col-lg-9 col-md-8">
                      <select name="id_cat" id="id_cat" class="form-control">
                        
                        <option value="">
                          ----------------------
                        </option>

                        <?php $categories = $this->db->where('state_cat', 1)->get('category'); ?>

                        <?php foreach ($categories->result_array() as $categorie): ?>

                        <option value="<?= $categorie['id_cat']; ?>" <?= (!empty(set_value('id_cat')) and set_value('id_cat') == $categorie['id_cat']) ? ' selected="selected"' : '' ;?>>
                          <?= $categorie['label']; ?>
                        </option>

                        <?php endforeach; ?>

                      </select>
                      
                      <div class="<?= empty(form_error('id_sub_cat')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('id_sub_cat'); ?></span>
                      </div>
                    </div>

                  </div>

                  <div class="row">
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
            <?php foreach ($sub_categories->result_array() as $sub_categorie): ?>              
            <form action="<?= site_url('admin/ControlPublic/updateSubCat/'.$sub_categorie['id_sub_cat']) ?>" method="post" enctype="multipart/form-data" />
              
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
                        <input type="file" name="userimage<?= $sub_categorie['id_cat'];?>" value="<?= !empty(set_value('userimage'.$sub_categorie['id_cat'])) ? set_value('userimage'.$sub_categorie['id_cat']) : $sub_categorie['img_sub_cat'] ; ?>" class="default" />
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="service-icon col-lg-6 col-md-6">
                    <img src="<?= base_url('assets/img/category/'.$sub_categorie['img_sub_cat']) ?>" alt='img_sub_cat' style="width: 100%">
                  </div>
                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <div class="col-lg-4 col-md-5">
                      Sous-catégorie :
                    </div>
                    <div class="col-lg-8 col-md-7">
                      <input class="form-control" type="text" name="label_c_cat<?= $sub_categorie['id_sub_cat']; ?>" value="<?= $sub_categorie['label_c_cat']; ?>">
                    </div>
                    <div class="<?= empty(form_error('label_c_cat'.$sub_categorie['id_sub_cat'])) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('label_c_cat'.$sub_categorie['id_sub_cat']); ?></span >
                    </div>

                  </div>

                  <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                  </div>

                  <div class="row">
                    
                    <div class="col-lg-3 col-md-4">
                      Catégorie :
                    </div>

                    <div class="col-lg-8 col-md-7">
                      <select name="id_cat<?= $sub_categorie['id_sub_cat']; ?>" id="id_cat<?= $sub_categorie['id_sub_cat']; ?>" class="form-control">

                        <?php
                          foreach ($categories->result_array() as $categorie):
                        ?>

                        <option value="<?= $categorie['id_cat']; ?>" <?= ($sub_categorie['id_cat'] == $categorie['id_cat']) ? ' selected="selected"' : '' ; ?>>
                          <?= $categorie['label']; ?>
                        </option>

                        <?php
                          endforeach;
                        ?>

                      </select>
                      
                      <div class="<?= empty(form_error('id_cat'.$sub_categorie['id_sub_cat'])) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('id_cat'.$sub_categorie['id_sub_cat']); ?></span >
                      </div>

                    </div>
                    <div class="col-lg-6" style=" float: right;">
                      <button type="submit" ><i class="fa fa-refresh"></i><input type="submit" name="submit<?= $sub_categorie['id_sub_cat']; ?>" class="btn btn-theme04" style="border-radius: 0px;" value="Modifier">
                      </button>
                      
                    </div>
                  </div>

                  <a style="float: left;" href="<?= base_url('admin/ControlPublic/stateSubCat/').$sub_categorie['id_sub_cat'].'/'.$sub_categorie['state_sub_cat'] ;?>">
                    <div class="switch demo">
                      <input type="checkbox" style="width: 40px"
                        <?php 
                          if ($sub_categorie['state_sub_cat']== -1 or $sub_categorie['state_sub_cat'] == 0 ) 
                            echo('');
                          else echo('checked');
                        ?> >
                      <label><i></i></label>
                    </div>
                  </a>
                  <hr>

                  <h5>Dernière modification : <br> <?= date("d/m/Y à H:i:s", strtotime( $sub_categorie['date_reg'])); ?></h5>
                  <p>Auteur : <?= $sub_categorie['first_name'].' '.$sub_categorie['second_name'].'<br> Fonction : '.$sub_categorie['function']; ?></p>
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
