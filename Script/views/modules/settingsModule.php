<!--********* panel panel-default ***************-->
     	<div class="panel panel-default">
		  <div class="panel-heading grid-panel-title">
		  	
		  	<h3 class="panel-title titleBar" data-title="<?php echo  $this->title; ?>"><?php if( isset( $this->title ) ): echo stripslashes( $this->title ); endif; ?></h3>
		  
		  </div><!-- ** panel-heading ** -->
		  
   <div class="panel-body">
				  
			<form class="form-horizontal formAjax" action="" method="POST" id="formSettings">
			 
			 <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['username']; ?></label>
			    <div class="col-sm-10">
			      <input  type="text" data-username="<?php echo $this->infoSession->username ?>" name="username" id="username" value="<?php echo $this->infoSession->username ?>" class="form-control input-sm" placeholder="<?php echo $_SESSION['LANG']['username']; ?>">
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['mail']; ?></label>
			    <div class="col-sm-10">
			      <input  type="text" data-email="<?php echo $this->infoSession->email ?>" name="email" id="email" value="<?php echo $this->infoSession->email ?>" class="form-control input-sm" placeholder="<?php echo $_SESSION['LANG']['mail']; ?>">
			    </div>
			  </div><!-- **** form-group **** -->
			  
			 <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['account'] ?></label>
			    <div class="col-sm-10">
					  <select name="mode" id="mode" class="input-sm btn-block">
						<option class="mod_1" value="1"><?php echo $_SESSION['LANG']['option_public']; ?></option>
						<option class="mod_0" value="0"><?php echo $_SESSION['LANG']['option_private']; ?></option>
					</select>
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['country']; ?></label>
			    <div class="col-sm-10">
			    	<select name="country" id="country" class="input-sm btn-block">
			    		<option class="country_xx" value="xx"><?php echo $_SESSION['LANG']['worldwide']; ?></option>
						 <?php
	                foreach ( $this->countries as $key ) {
	                    ?>
	                    <option class="country_<?php echo $key['short']; ?>" value="<?php echo $key['short']; ?>"><?php echo $key['country']; ?></option>
	                    <?php
	                }
	                 ?>
					</select>
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['lang_title']; ?></label>
			    <div class="col-sm-10">
			    	<select name="lang" id="lang" class="input-sm btn-block">
					 <?php foreach ( _Function :: arrayLang() as $key => $value ) : ?>
						<option class="<?php echo $value; ?>" value="<?php echo $value; ?>"><?php echo $key; ?></option>
					<?php endforeach;  ?>
					</select>
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  <hr />
			  
			  <h4 class="titleBar" style="margin-bottom: 20px; font-size: 16px; color: #333;" data-title="Settings"><?php echo $_SESSION['LANG']['privacy']; ?></h4>
	
			  <hr />
			  
			  <!-- **** form-group **** -->
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['msg_private']; ?></label>
			    <div class="col-sm-10">
			    	<label class="radio-inline">
					  <input type="radio" id="radio_0" class="no-show" value="0" name="msg_private" value="option1"> 
					  <span class="input-sm"><?php echo $_SESSION['LANG']['msg_private_1']; ?></span>
					</label>
					<label class="radio-inline">
					  <input type="radio" id="radio_1" class="no-show" value="1" name="msg_private"> 
					   <span class="input-sm"><?php echo $_SESSION['LANG']['msg_private_2']; ?></span>
					</label>
					<label class="radio-inline">
					  <input type="radio" id="radio_2" class="no-show" value="2" name="msg_private"> 
					   <span class="input-sm"><?php echo $_SESSION['LANG']['msg_private_3']; ?></span>
					</label>
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  <?php 
	if( $this->infoSession->email_notification_msg === '1' ) {
		$check_0 = 'checked="checked"';
	} else {
		$check_0 = null;
	}
	
	if( $this->infoSession->email_notification_follow === '1' ) {
		$check_1 = 'checked="checked"';
	} else {
		$check_1 = null;
	}
	?>
			  
			  <!-- **** form-group **** -->
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label input-sm"><?php echo $_SESSION['LANG']['email_notification']; ?></label>
			    <div class="col-sm-10">
			    	<label class="checkbox-inline">
					 <input id="check_0" <?php echo $check_0; ?> class="no-show"type="checkbox" value="1" name="check_0" />
					   <span class="input-sm"><?php echo $_SESSION['LANG']['msg_private']; ?></span>
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" <?php echo $check_1; ?> class="no-show" id="check_1" value="1" name="check_1" /> 
					  <span class="input-sm"><?php echo $_SESSION['LANG']['follow_me']; ?></span>
					</label>
				
			    </div>
			  </div><!-- **** form-group **** -->
			  
			  
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<div class="alert alert-danger error-update btn-sm"></div>
			      <button type="submit" id="editProfile" disabled="disabled" style="opacity: 0.5; cursor: default;" class="btn btn-info btn-sm profile-settings-account"><?php echo $_SESSION['LANG']['save']; ?></button>
			    </div>
			  </div><!-- **** form-group **** -->
			  
			</form><!-- **** form **** -->
				  
		</div><!-- Panel Body -->

   </div><!-- Panel Default -->
   
<button type="button" class="btn btn-danger btn-df btn-sm btn-block margin-bt delete-account">
							<i class="icon-remove2"></i> <?php echo $_SESSION['LANG']['delete_account']; ?>
						</button>