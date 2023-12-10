 
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" style=" background-image: url(<?= base_url('assets/img/breadcrumb/background_body.jpg');?>)">
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
                    <?php foreach ($consultations->result_array() as $consultation) :
                        $personal = $this->db->select('first_name, second_name, function, genre, phone, profile_img')->where('id_user', $consultation['id_user'])->get('users')->row_object();
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
            			<div class="panel panel-back noti-box">
                            <span class="icon-box btn-primary set-icon">
                                <i class="<?= $consultation['img_com']; ?>"></i>
                            </span>
                            <div class="text-box" >
                                <?php if(!is_null($personal)): ?>
                                <p class="main-text"><?= $this->db->where('id_com', $consultation['id_com'])->from('issue')->count_all_results(); ?> <label class="fa fa-3x fa-comments-o"></label>
                                    <span class="icon-box set-icon" style="float: right;margin-top: -10%">
                                        <img style="width: 100%" src="<?= base_url('assets/img/personnals/'.$personal->profile_img);?>" alt="profile_opticien" class="img-thumbnail">
                                    </span>
                                </p>
                                <p class="text-muted">Avec <?= ($personal->genre == 1 ? 'M. ' : 'Mme ' ).$personal->first_name.' '.$personal->second_name; ?>
                                </p>
                                <label class="text-muted" style="float: right; font-size: 13px"><?= $personal->phone.' '.$personal->function; ?></label><br>
                                <?php endif; ?>
                                <?php if(is_null($consultation['date_end'])) : ?>
                                <p class="text-muted" style="font-size: 14px; text-align: center;">Demandée le <?= date('d-m-Y à H:i:s', strtotime($consultation['date_init'])); ?><br> 
                                    <?= !is_null($personal) ? 'Session ouverte' : '<br>En attente de programmation 

                                    <a href="'.site_url('customer/CustomerPanel/Actualisation/'.$consultation['id_com']).'" class="btn btn-warning" style="border-radius: 0px; padding: 4px; float: left"><i class=" fa fa-refresh"></i> Actualiser</a>

                                    <a href="'.site_url('customer/CustomerPanel/deleteConsult/'.$consultation['id_com']).'" class="btn btn-danger" style="border-radius: 0px; padding: 4px; float: right"><i class=" fa fa-trash"></i> Renoncer</a>' ?>

                                </p>
                                <?php else : ?>
                                <p class="text-muted" style="font-size: 14px; text-align: center;">Initiée le <?= date('d-m-Y à H:i:s', strtotime($consultation['date_init'])); ?><br> Fermée le <?= date('d-m-Y à H:i:s', strtotime($consultation['date_end'])); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
        		    </div>
                    <?php endforeach; ?>
                    <div class="col-md-6">
                        <div class="mu-contact-left">
                        <?php if(empty($this->db->where('state', -1)->where('subject', $this->session->userdata['auth_user']["id_user"])->get('communicate')->result_array())) : ?>
                            <h4 style="text-align: right;">FORMULAIRE DE DEMANDE D'UNE CONSULTATION</h4>
                          <form class="contactform" action="<?= site_url('customer/CustomerPanel/askConsult');?>" method="post">

                            <div class="col-md-3 col-sm-9 col-xs-12">
                              <label for="subject" class="" style="width:100%;">Sujet &nbsp;: <span class="required" style="color: red">*</span></label>

                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                              <input type="text" name="subject" value="" id="subject" class="form-control" style="width:100%;"  placeholder="Demande d'une consultation" disabled="disabled" />
                              <div class="">
                                <span class="help-block "></span >
                              </div>
                            </div>


                            <div class="col-md-3 col-sm-9 col-xs-12" style="text-align: center;" >
                              <label for="descrip">Description en quelques mots de votre malaise :<span class="required" style="color: red"> *</span></label>
                              <i class="fa fa-4x fa fa-user-md"></i>
                              <i class="fa fa-4x fa fa-eye"></i>
                            </div>
                            <div class=" col-md-9 col-sm-12 col-xs-12">
                                <textarea class="form-control wysihtml5" rows="5" cols="45" name="descrip" id="descrip" placeholder="Description">
                                    <?= (set_value('descrip')) ? set_value('descrip') : ''; ?>
                                </textarea>
                                <div class="<?= empty(form_error('descrip')) ? "" : "has-error" ?>">
                                  <span class="help-block "><?= form_error('descrip'); ?></span >
                                </div>

                                <p class="form-submit">
                                  <button class="btn btn-primary square-btn-adjust fa fa-send" style="float: right;" type="submit" value="Envoyer" name="submit">
                                    Envoyer
                                  </button>
                                </p> 

                            </div>
                          </form>
                        </div>
                    </div>
                            <p>N.B. : Ce formulaire n'est plus acczssible une qu'une demande est en cours et en attente de programmation.</p>
                    <?php endif; ?>
			    </div>
                 <!-- /. ROW  -->
                <hr />                
                
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
