
    <section id="main-content" style="margin-bottom: 2%">
      <section class="wrapper">
        <a href="<?= site_url('admin/ControlPanel/personal/list')?>" class="btn btn-theme04" style="float: left; border-radius: 0px; float: right; margin-top: 2%"><span class="fa fa-reply" style=""></span> Abandonner</a>
        <h3>
          <i class="fa fa-angle-right"></i> <?= $sub_title; ?>  <br>
          <span style="color: red; font-size: 17px">
            <?= $this->session->flashdata('flsh_mess'); ?>
          </span>
        </h3><hr>

       <!-- FORM VALIDATION -->
          <div class="col-lg-12 content-panel">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
                  action="<?= base_url('admin/ControlPanel/affectHispersonal/'); ?>" enctype="multipart/form-data"/>
              <input type="hidden" name="id_user" value="<?= $user->id_user;?>">

              <div class="col-lg-3 col-md-3">
                <div class="form-group ">

                  <dt>Matricule actuelle <span style="float: right;">Droit / Rôle</span></dt>
                  <dd><?= $user->reg_number; ?>
                    <span style="float: right;"><?= $this->db->where('id_role', $user->id_role)->get('role')->row_object()->name_role; ?></span>
                  </dd><hr>


                  <dt>Email <span style="float: right;">Téléphone</span></dt>
                  <dd><?= $user->email; ?>
                    <span style="float: right;"><?= $user->phone; ?></span>
                  </dd>

                </div>

                  
              </div>
              <div class="col-lg-2 col-md-2">

                  <dt>Photo profile</dt>
                  <img class="img-thumbnail" src="<?= base_url('assets/img/personnals/'.$user->profile_img) ?>" style="width: 100%">

                  
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="form-group ">

                  <dt>Horaires<span style="float: right;">Expérience</span></dt>
                  <dd><?= $user->working_time1 . ' et ' . $user->working_time2; ?>
                    <span style="float: right;"><?= $user->years_exp; ?> ans</span>
                  </dd><hr>

                  <dt>Fonction actuelle </dt>
                  <dd><?= $user->function; ?>
                  </dd>
                </div>
                  
              </div>
              <div class="col-lg-4 col-md-4">

                <div class="form-group">
                  <label for="id_mag" class="control-label col-lg-4">Magasin <i style="color: red">*</i> :</label>
                  
                  <div class="col-lg-8">
                    <select name="id_mag" id="id_mag" class="form-control" value="<?= (!empty(set_value('id_mag')) ? set_value('id_mag') : $user->id_mag) ;?>">
                      
                      
                      <?php foreach ($storeshops->result_array() as $storeshop): ?>
                        <option value="<?= $storeshop['id_mag']; ?>" <?= ($user->id_mag == $storeshop['id_mag']) ? ' selected="selected"' : '' ; ?>>
                          <?= $storeshop['description']; ?>
                        </option>
                      <?php endforeach ?>
                    </select>

                    
                    <div class="<?= empty(form_error('id_mag')) ? "" : "has-error" ?>">
                      <span class="help-block "><?= form_error('id_mag'); ?></span >
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4" style="float: left;">
                    <label for="id_role" class="control-label">Droit / Rôle<i style="color: red"> *</i> :</label>
                    <div class="<?= empty(form_error('role')) ? "" : "has-error" ?>">
                        
                      <span class="help-block "><?= form_error('role'); ?></span >
                    </div>
                  </div>
                  <div class=" col-lg-8 col-md-8">
                    <select name="id_role" id="id_role" class="form-control">
                        <option value="">
                          -------------
                        </option>

                        <?php foreach ($roles->result_array() as $role): ?>
                        <option value="<?= $role['id_role']; ?>" <?= ($user->id_role == $role['id_role']) ? ' selected="selected"' : '' ; ?>>
                          <?= $role['name_role']; ?>
                        </option>
                        <?php endforeach ?>
                      </select>
                      
                      <div class="<?= empty(form_error('id_role')) ? "" : "has-error" ?>">
                        <span class="help-block "><?= form_error('id_role'); ?></span >
                      </div> 
                  </div>
                  <div class=" col-lg-4 col-md-4" style="float: ;">
                    <label for="function" class="control-label">Fonction<i style="color: red"> *</i> :</label>
                  </div>
            

                  <div class="col-lg-8">
                      <?= form_input(['name' => "function", 'id' => "function", 'class' => 'form-control'],  (!empty(set_value('function')) ? set_value('function') : $user->function)) ?>
                    <div class="<?= empty(form_error('function')) ? "" : "has-error" ?>">
                      
                      <span class="help-block "><?= form_error('function'); ?></span >
                    </div>
                  </div>

                  <div class="col-lg-12"><hr>
                    <div class="col-lg-5">
                      <A href="" class="btn btn-theme04" type="button" style="float: left; border-radius: 0px"><span class="glyphicon glyphicon-refresh" style=""></span> Réinitialiser
                      </A>
                    </div>
                    <div class="col-lg-5" style="float: right;">
                      <button class="btn btn-success" type="submit" value="Enregistrer" style="float: right; border-radius: 0px"><span class="glyphicon glyphicon-saved"></span> Enregistrer
                      </button>
                    </div>
                  </div>
                </div>
                
              </div>

          </form>
      </div>
    </section>
  </section>
