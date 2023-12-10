   <div class="row" style="text-align: center;">
    	
		<h2>
			<label style="padding: 2%; font-family: 'Gabriola'; font-size: 32px"><?= $title ?></label>
		</h2>
		
		<?php if(!empty($login_error)): ?>
			<div class="has-error">
				<span class="help-block"><?= $login_error ; ?></span >
			</div >
		<?php endif ; ?>
		
		<form action="<?= site_url('Bioluxoptical/resetPass') ?>" method="post" class="formulaire clearfix" style="width: 53%">
			<div class="col-md-3">
	            <div class="col-md-12">
	              <?= form_label ("Email * :", "email", ['class' => "email", 'style' => "width:100%;", 'size' => "50"]) ?>
	            </div>
				<span class="fa fa-user" style="font-size: 175px"></span>
    		</div>
    		
    		<div class="col-md-9">
	             <?= form_input(['name' => "email", 'id' => "email", 'class' => '', 'style' => "width:100%;"], set_value('email')) ?>
              <div class="col-md-12 <?= empty(form_error('email')) ? "" : "has-error" ?>">
                <span class="help-block "><?= form_error('email'); ?></span >
              </div >
	    			

					<div class="row"><br>

						<div class="col-md-6" style="float: right;" >

							<input type="submit" name="send" value="Envoyer" class="btn btn-default" />

						</div>
					</div>
<hr>

			</div>

			<span style="font-size: 13px">
				<?= $sub_title; ?>
			</span>
			
			
		</form>

			
	</div>





