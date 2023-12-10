
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
      
    <section id="main-content" class="">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPublic/consultations')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%"><span class="fa fa-reply" style=""></span> Abandonner
        </a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?> <?= $this->session->flashdata('flsh_mess'); ?>
        </h3><hr>
        <!-- FORM VALIDATION -->
        <div class=" col-lg-12  mt container-fluid content-panel" style="margin-top: -8px">
          <p style="text-align: center;">Choisir celle à prendre en compte</p>
          <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                action="<?= base_url('admin/ControlPublic/addThereConsult'); ?>" enctype="multipart/form-data"/>
            <?php foreach ($consults->result_array() as $consult): ?>

            <div class="col-lg-12"><hr>
              <div class="col-lg-5 col-md-5">
                
                <?php $customer = $this->db->where('id_costomer', $consult['subject'])->get('customer')->row_object(); ?>
                  
                <div class="form-group ">
                  <span class="fa fa-3x <?= $consult['img_com'];?>"></span>
                  <label for="reg_num_mat" class="control-label">Client / Abonné <span style="color: red">*</span> :</label>
                  <b for="reg_num_mat" class="control-label"><?= $customer->genre == 1 ? 'M. ' : 'Mme ' ?><?= $customer->fname_cost.' '.$customer->sname_cost; ?></b>
                </div>

                <div class="form-group ">
                  <label for="id_user" class="control-label col-lg-4 col-md-4">
                    <span class="fa fa-3x fa-user-o" style="float: left;"></span> Personnel <span style="color: red">*</span> :
                  </label>

                  <div class="col-lg-8 col-md-8">
                    <select name="id_user<?= $consult['id_com'];?>" id="id_user<?= $consult['id_com'];?>" class="form-control">
                      <option value="">
                        ------ Choisir un personnel -------
                      </option>

                      <?php foreach ($opticians->result_array() as $optician): ?>
                      <option value="<?= $optician['id_user']; ?>" <?= (!empty(set_value('id_user'.$consult['id_com'])) and set_value('id_user'.$consult['id_com']) == $optician['id_user']) ? ' selected="selected"' : '' ; ?>>
                        <?= $optician['genre'] == 1 ? 'M. ' : 'Mme ' ?><?= $optician['first_name'].' '.$optician['second_name'].' - <i>'.$optician['name_role'].'<i/>'.' - <b>'.$optician['function'].'<b/>'; ?>
                      </option>
                      <?php endforeach ?>

                      <?php foreach ($consultants->result_array() as $optician): ?>
                      <option value="<?= $optician['id_user']; ?>" <?= (!empty(set_value('id_user'.$consult['id_com'])) and set_value('id_user'.$consult['id_com']) == $optician['id_user']) ? ' selected="selected"' : '' ; ?>>
                        <?= $optician['genre'] == 1 ? 'M. ' : 'Mme ' ?><?= $optician['first_name'].' '.$optician['second_name'].' - <i>'.$optician['name_role'].'<i/>'.' - <i>'.$optician['function'].'<i/>'; ?>
                      </option>
                      <?php endforeach ?>

                    </select>
                    
                    <div class="<?= empty(form_error('id_user'.$consult['id_com'])) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('id_user'.$consult['id_com']); ?></span >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="date_init_d<?= $consult['id_com'];?>" class="control-label col-lg-2 col-md-3 col-sm-3 col-xs-3">Pour le : </label>
                  <div class="col-lg-3 col-md-6 col-xs-6">
                    <div data-date-viewmode="years" data-date-format="dd/mm/yyyy" data-date="<?= !empty(set_value('date_init_d'.$consult['id_com'])) ? set_value('date_init_d'.$consult['id_com']) : date('d/m/Y', time()) ?>" class="input-append date dpYears">
                      <input name="date_init_d<?= $consult['id_com'];?>" id="date_init_d<?= $consult['id_com'];?>" type="text" readonly="" value="<?= !empty(set_value('date_init_d'.$consult['id_com'])) ? set_value('date_init_d'.$consult['id_com']) : date('d/m/Y', time()) ?>" size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>

                    <div class="<?= empty(form_error('date_init_d'.$consult['id_com'])) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('date_init_d'.$consult['id_com']); ?></span >
                    </div>
                  </div>
                  <label for="date_init_h<?= $consult['id_com'];?>" class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-3" style="text-align: right;"> (J) à : </label>
                  <div class="col-lg-4 col-md-6 col-xs-6">
                    <div class="input-group bootstrap-timepicker">
                      <input name="date_init_h<?= $consult['id_com'];?>" id="date_init_h<?= $consult['id_com'];?>" type="text" class="form-control timepicker-24" value="<?= !empty(set_value('date_init_h'.$consult['id_com'])) ? set_value('date_init_h'.$consult['id_com']) : '' ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
                        </span>
                    </div>
                  </div>
                  <label class="control-label col-lg-1 col-md-2 col-sm-2 col-xs-3" style="text-align: right;"> (H)</label>

                  <div class="<?= empty(form_error('date_init_h'.$consult['id_com'])) ? "" : "has-error" ?>">
                    <span class="help-block "><?= form_error('date_init_h'.$consult['id_com']); ?></span >
                  </div>
                </div>
                
              </div>
              <div class="col-lg-2 col-md-2">

                <div class="form-group last col-lg-12 col-md-12 col-sm-6 col-xs-6">
                  <img class="img-thumbnail" style="width: 100%" src="<?= base_url('assets/img/customers/'.$customer->profile_img); ?>" alt="" />

                  <?= 'Consultation demandée le '.date('d/m/Y à H:i:s', strtotime($consult['date_init'])); ?><hr>
                  <?= 'Compte créé le '.date('d/m/Y à H:i:s', strtotime($customer->reg_date_cost)); ?>
                </div>
                
              </div>
              <div class="col-lg-5 col-md-5">
                <label for="descrip" class="control-label col-lg-5 col-md-5">Description donnée <span style="color: red">*</span> :

                  <div class="switch demo" style="">
                    <input type="checkbox" style="width: 50px;" name="checked<?= $consult['id_com'];?>" 
                      <?= ($consult['state']== -1 or $consult['state'] == 0 ) ? '' : 'checked'; ?>
                     >
                    <label style="padding: 0%"><i></i></label>
                  </div>
                </label>
                <div class="form-group col-lg-7 col-md-7">
                  <i style="margin: 8px; float: right;"><b style="text-align: justify;"><?= $consult['descrip']; ?></b></i>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="col-lg-12 col-md-12">
            <hr>
            <button class="btn btn-success col-lg-3 col-md-3" type="submit" value="Enregistrer" style="float: right; border-radius: 0px; margin: 20px"><span class="glyphicon glyphicon-saved"></span> Enregistrer</button>

            <a href="" class="btn btn-theme04 col-lg-3 col-md-3" type="button" style="float: right; border-radius: 0px; margin: 20px"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser
            </a>
          </div> 
        </form>
      </section>
    </section>
