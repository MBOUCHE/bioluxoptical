

    <div class="row" style="text-align: center;">
    	
		<h2>
			<label style="padding: 2%; font-family: 'Gabriola'; font-size: 32px"><?= $sub_title?></label>
		</h2>

		<?php if(!empty($login_error)): ?>
			<div class="has-error">
				<span class="help-block"><?= $login_error ; ?></span >
			</div >
		<?php endif ; ?>
	
		<div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8">

			<form action="<?= site_url('Bioluxoptical/connexion') ?>" method="post" class="formulaire clearfix" style="width: 89%">
				<div class="col-md-4">
					<span class="fa fa-user" style="font-size: 200px"></span>
	    		</div>

	    		<input type="hidden" name="custumer" value="client">
	    		
	    		<div class="col-md-8">
	    			<div class="row">
	    				<div class="col-md-6">
				   			<?= form_label ("Nom d’utilisateur &nbsp;:", "username", ['class' => "", 'style' => "width:100%;"]) ?>
		    			</div>
		    			<div class="col-md-6">
				   			<?= form_input(['name' => "username", 'id' => "username", 'class' => '', 'style' => "width:100%;"], set_value('username')) ?><br>
				   			<div class="<?= empty(form_error('username')) ? "" : "has-error" ?>">
								<br><span class="help-block "><?= form_error('username'); ?></span >
							</div >
		    			</div>
	    			</div>
	    			
					
	    			<div class="row">
	    				<div class="col-md-6">
			   			<?= form_label('Mot de passe &nbsp;:', "password", ['class' => "", 'style' => "width:100%"]) ?>
		    			</div>
		    			<div class="col-md-6">
				   			<?= form_password(['name' => "password", 'id' => "password", 'class' => '', 'style' => "width:100%;"], set_value ('password')) ?><br>
							<div class="<?= empty(form_error('password')) ? "" : "has-error" ?>">
								<br><span class="help-block"><?= form_error('password'); ?></span >
							</div >
		    			</div>

	    			</div><hr>

					<div class="row">
						<div class="col-md-6">
							
							<p class="clearfix">

								<a href="<?= site_url('Bioluxoptical/forgetPass');?>" style=" float: right;">Mot de passe oublié ?</a>
								<label for="remember">Se souvenir de moi</label>
								<input type="checkbox" name="" id="remember">
							</p>
						</div>

						<div class="col-md-6">

							<?= form_submit ("send", "Envoyer", ['class' => "btn btn-default"]); ?>

						</div>
					</div>

				</div>


				
				
			</form>

		</div>
	</div>
