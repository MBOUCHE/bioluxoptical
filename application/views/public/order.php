

 <section id="mu-course-content">
   <div class="col-md-12">
     <div class="mu-course-content-area">
        <div class="row">

        <?php include('common/details_operators.php'); ?>

	      <div  style="text-align: center; margin-top: -2%" class="col-md-8">
	        <h2>
	          <label style="font-family: 'Gabriola'; font-size: 32px;">
	            Vérification des informations préalablement renseignées et paiement
	          </label>
	        </h2>


	        <?php if(isset($_SESSION['flsh_mess'])): ?>
	          <div class="has-error">
	            <span class="help-block"><?= $_SESSION['flsh_mess'] ; ?></span >
	          </div >
	        <?php endif ; ?>
	        

	    <?php
	      echo form_open_multipart('Bioluxoptical/ThisPayment', array('name' => 'ThisPayment',
	    'class'=>'form-horizontal formulaire', 'style' => "width: 100%; text-align: left;"));
	    ?>
	    <div class="col-lg-3 col-md-3 col-sm-6">
	      	<?= form_label('Image de profile &nbsp;', "", ['class' => "", 'style' => "width: 100%"]) ?>
	      	<img class="img-thumbnail" src="<?= base_url('assets/img/').$this->session->userdata['auth_user']["profile_img"]?>" alt="img_user" style="width: 100%">
	      	<?php $customer = $this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object();?>


	        <div class="row">
	            <div class="col-md-9">
	              <?= form_label ("Profession ", "profession", ['class' => "", 'style' => "width:100%;"]) ?>
	            </div>
	            <div class="col-md-12">
	            	<input type="text" name="profession" id="profession" class="form-control" value="<?= (!empty(set_value('profession')) ? set_value('profession') : $customer->profession);?>" style="width:100%; padding: 8px; float: right;"><br>
		            <div class="<?= empty(form_error('profession')) ? "" : "has-error" ?>">
		                <br><span class="help-block"><?= form_error('profession'); ?></span >
		            </div >
	            </div>

	        </div>
	    </div>
	    <div class="col-lg-5 col-md-7 col-sm-6">

	        <h5 style="float: right; color: white">Informations utilisateur</h5><hr>
	          <div class="row">
	            <div class="col-md-4">
	              <?= form_label ("Nom *", "fname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
	            </div>
	            <div class="col-md-8">
	              <?= form_input(['name' => "fname_cost", 'id' => "fname_cost", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('fname_cost'))) ? set_value('fname_cost') : $customer->fname_cost); ?><br>
	              
	            </div>
	            <div class="col-md-12 <?= empty(form_error('fname_cost')) ? "" : "has-error"?> ">
	              <span class="help-block "><?= form_error('fname_cost'); ?></span >
	            </div >
	          </div>


	          <div class="row">
	            <div class="col-md-4">
	              <?= form_label ("Prénom &nbsp;", "sname_cost", ['class' => "", 'style' => "width:100%;"]) ?>
	            </div>
	            <div class="col-md-8">
	              <?= form_input(['name' => "sname_cost", 'id' => "sname_cost", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('sname_cost')) ? set_value('sname_cost') : $customer->sname_cost)); ?>
	            </div>

	            <div class="col-md-12 <?= empty(form_error('sname_cost')) ? "" : "has-error" ?>">
	              <span class="help-block "><?= form_error('sname_cost'); ?></span >
	            </div >
	          </div>


	          <div class="row">
	            <div class="col-md-4">
	              <?= form_label ("Email *", "email", ['class' => "email", 'style' => "width:100%;", 'size' => "50"]) ?>
	            </div>
	            <div class="col-md-8">
	              <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%;"], (!empty(set_value('email_cost')) ? set_value('email_cost') : $customer->email_cost)); ?>
	            </div>
              	<div class="col-md-12 <?= empty(form_error('email')) ? "" : "has-error" ?>">
                	<span class="help-block "><?= form_error('email'); ?></span >
              	</div >
	          </div>



	          <div class="row">

	            <div class="col-md-4">

	                <select name="country" id="country" style="padding: 6px;">
	                  <?php foreach ($countries->result_array() as $countrie): ?>
	                  
	                  <option value="<?= $countrie['id_country']?>" <?= (!empty(set_value('country')) and set_value('country') == $countrie['id_country']) ? ' selected="selected"' : (($customer->id_country == $countrie['id_country']) ? ' selected="selected"' : '') ; ?>>
	                    <?= $countrie['num_zone']?>
	                  </option>

	                  <?php endforeach; ?>
	                </select>

	              <div class="col-md-12 <?= empty(form_error('country')) ? "" : "has-error" ?>">
	                <span class="help-block"><?= form_error('country'); ?></span >
	              </div >

	            </div>

	            <div class="col-md-8">
	              <?= form_input(['name' => "phone", 'id' => "phone", 'class' => '', 'style' => "width:100%; padding: 8px" ], (!empty(set_value('phone')) ? set_value('phone') : $customer->phone)); ?>
	            </div>
	            <div class="col-md-12 <?= empty(form_error('phone')) ? "" : "has-error" ?>">
	              <span class="help-block"><?= form_error('phone'); ?></span >
	            </div >
	        </div>

	    </div>
	    <div class="col-lg-4 col-md-6 col-sm-6">

	        <h5 style="float: right; color: white">Informations sur le paiement </h5><hr>

	        <div class="row">

	            <div class="col-md-12">
	              <?= form_label ("Moyen de paiement*", "id_prov", ['class' => "id_prov", 'style' => "width:100%;"]) ?>
	            </div>
	            <div class="col-md-12">

	                <select name="id_prov" id="id_prov" style="padding: 6px; width: 100%">

		                <option value="">
		                  ----------------
		                </option>

	                  <?php foreach ($operators->result_array() as $operator): ?>
	                  
	                  	<option value="<?= $operator['id_prov']?>" <?= (!empty(set_value('id_prov')) and set_value('id_prov') == $operator['id_prov']) ? ' selected="selected"' : ''; ?>>
	                    	<?= $operator['name_prov']?>
	                  	</option>

	                  <?php endforeach; ?>
	                </select>

		            <div class="col-md-12 <?= empty(form_error('id_prov')) ? "" : "has-error" ?>">
		                <span class="help-block"><?= form_error('id_prov'); ?></span >
		            </div >
	          	</div>
	        </div>

	        <div class="row">
	            <div class="col-md-12">
	              <?= form_label ("Compte Payeur *", "payload", ['class' => "", 'style' => "width:98%;"]) ?>
	            </div>
	            <div class="col-md-12">
	              <?= form_input(['name' => "payload", 'id' => "payload", 'class' => '', 'style' => "width:100%; padding: 8px", 'placeholder' => 'Numéro de Téléphone ou Numéro de Compte ayant servi pour le paiement', 'title' => 'Numéro de Téléphone ou Numéro de Compte ayant servi pour le paiement' ], (!empty(set_value('payload')) ? set_value('payload') : '')); ?>
	            </div>
	            <div class="col-md-12 <?= empty(form_error('payload')) ? "" : "has-error" ?>">
	              <span class="help-block"><?= form_error('payload'); ?></span >
	            </div >
	        </div>

	        <div class="row">
	            <div class="col-md-12">
	              <?= form_label ("Reférence de paiement *", "pay_ref", ['class' => "", 'style' => "width:98%;"]) ?>
	            </div>
	            <div class="col-md-12">
	              <?= form_input(['name' => "pay_ref", 'id' => "pay_ref", 'class' => '', 'style' => "width:100%; padding: 8px", 'placeholder' => 'Reférence émise par l\'opérateur lors du transfert ou du dépôt', 'title' => 'Reférence émise par l\'opérateur lors du transfert ou du dépôt' ], (!empty(set_value('pay_ref')) ? set_value('pay_ref') : '')); ?>
	            </div>
	            <div class="col-md-12 <?= empty(form_error('pay_ref')) ? "" : "has-error" ?>">
	              <span class="help-block"><?= form_error('pay_ref'); ?></span >
	            </div >
	        </div>
	      	
	    </div>
	    <div class="col-lg-12 col-md-6" style="float: left;">
	    	
	        <h5 style="float: left; color: white">Informations sur la commande</h5><hr>
	        <div class="row">
	            <div class="col-lg-6 col-md-12" style="float: left;">
		            <div class="col-md-12">
		              <?= form_label ("Magasin de réception *", "id_mag", ['class' => "", 'style' => "width:100%;"]) ?>
		            </div>
	                <select name="id_mag" id="id_mag" style="padding: 6px;width:100%;">
		            	<option value="">
		            		--------------------------------------
		            	</option>
	                  	
	                  	<?php foreach ($storeshops->result_array() as $storeshop): ?>
	                  
		                <option value="<?= $storeshop['id_mag']?>" <?= (!empty(set_value('id_mag')) and set_value('id_mag') == $storeshop['id_mag']) ? ' selected="selected"' : '' ; ?>>
		                    <?= $storeshop['description']; ?> -- <?=  $storeshop['phone_ss']; ?>
		                </option>

	                  <?php endforeach; ?>
	                </select>

		            <div class="col-md-12 <?= empty(form_error('id_mag')) ? "" : "has-error" ?>">
		                <span class="help-block"><?= form_error('id_mag'); ?></span >
		            </div >
	          	</div>
	        	<div class="col-lg-6 col-md-12" style="float: right;">
		            <?= form_label ("Article(s) : ", "total", ['class' => "col-md-12", 'style' => "width:100%;"]) ?>
			        
			        <?php $i = 1; ?>
			        	<?php foreach ($this->cart->contents() as $items): ?>
		            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-2">
		        		<?php echo form_input(array('name' => $i.'[qty]', 'placeholder' => $items['qty'],'value' => $items['qty'], 'disabled' => "disabled", "style" => "width:100%")); ?>
		        	</div>
		        	<div class="col-lg-9 col-md-8 col-sm-9 col-xs-10">
	                    <?php echo form_input(array('name' => $i.'[name]', 'placeholder' => $items['name'],'value' => $items['name'], 'disabled' => "disabled", "style" => "width:100%")); ?>

			        		<?php $i++; ?>

	                    <div class="dropdown">
	                      <a data-toggle="dropdown" href="#"></a>
	                      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
	                        <?php echo form_input($i.'[rowid]', $items['rowid']); ?>
	                      </ul>
	                    </div>
		            </div>
			        	<?php endforeach; ?>
			    </div>

		        <div class="col-lg-6 col-md-12">
		        	
		        	<div class="col-md-5">
		              <?= form_label ("Total : ", "total", ['class' => "", 'style' => "width:98%;"]) ?>
		            </div>

		            <div class="col-md-7">
		            	<span class="btn btn-success" style="padding: 2px; width: 100%; border-radius: 1px"><?php echo $this->cart->format_number($this->cart->total()); ?> FCFA <i class="fa fa-2x fa fa-money" style="float: right;"></i></span>
		            </div>
		        </div>
	        </div><hr>
	    </div>
    	<div class="row col-md-12">
	        <div class="col-lg-5 col-md-5" style="float: left;">
	          	<a  style="float: right; border-radius: 1px;" href="<?= site_url('detailsPayment') ?>" type="submit"  class="btn btn-warning pull-right">
	          		<span class="fa fa-pencil" style="float: left;"> </span><label style=" padding: 0px">Modidier l'achat</label>
	          	</a>
	        </div>

	        <div class="col-lg-5 col-md-5" style=" float: right;">
	            <input type="submit" class="btn btn-primary pull-right" name="save" value="Confirmer votre versement" />
	        </div>
    	</div>

	<?php
	  echo form_close();
	?>

	    </div>
<!-------------------------------------------------------->

        <?php include('common/categories_list.php'); ?>

<!-------------------------------------------------------->
       
       </div>
     </div>
   </div>
 </section>

