<!-- POSTS -->
<li class="panel panel-default hoverList panel-posts margin-zero li-group" data="<?php echo $idPost; ?>">
	<?php echo $spanAbsolute; ?>
	<div class="panel-heading timeline-title">
					  	
					  	<div class="pull-left col-avatar">
					  		<a class="openModal" href="<?php echo URL_BASE.$key['username']; ?>" data-id="<?php echo $_idUser; ?>">
					  			<img src="<?php echo URL_BASE.'thumb/45-45-public/avatar/'.$key['avatar']; ?>" alt="Avatar" class="media-object img-rounded" width="45"></a>
					  	</div>
					  	
					  	
					  	<div class="text-user-timeline">
					  		<strong>
					  			<a href="<?php echo URL_BASE.$key['username']; ?>" data-id="<?php echo $_idUser; ?>" class="username-posts openModal">
					  				<?php echo stripslashes( $key['name'] ).$verified; ?>
					  				</a>
					  			</strong> 
					  		@<?php echo $key['username']; ?>
					  	</div>
					  	
					  	<?php if( $key['geolocation'] != '' ) : ?>
					  	<div class="container-geo">
					  		<i class="fa fa-map-marker ico-geo myicon-right"></i> 
					  		
					  		<a class="text-geo" target="_blank" href="https://www.google.com/maps/place/<?php echo $key['geolocation']; ?>">
					  			<?php echo $key['geolocation']; ?>
					  			</a>
					  	</div>
					  	<?php endif; ?>
					  	
					  	<a href="<?php echo URL_BASE.$key['username'].'/status/'.$key['id']; ?>" class="date-status" title="<?php echo date('d/m/Y', strtotime( $key['date'] )); ?>">
					  		<span class="small sm-font sm-date timestamp timeAgo" data="<?php echo date('c', strtotime( $key['date'] )); ?>"></span>
					  	</a>
					  	
					  	
					  </div><!-- panel-heading -->
					  
	<div class="panel-body">
		
		<?php if( $key['post_details'] != '' || $key['video_site'] != '' ) : ?>	
		<p class="p-text">
			
  		<?php  
		 	/*<------- * POST DETAILS * -------->*/
			echo _Function::checkText( $key['post_details'] ); ?> 
		</p>
		<?php endif; ?>
		
		<?php if( $key['repost_of_id'] != 0 ) { ?>
				<p style="font-size: 13px; color: #999; font-style: italic;">
					<img style="vertical-align: middle;" src="<?php echo URL_BASE; ?>public/img/repost-ico.png" /> <?php echo $_SESSION['LANG']['reposted_by']; ?> <?php echo $nameUser; ?>
					</p>
			<?php } ?>
			
			<!-- ******* MEDIA ******** -->
			<?php
			$widthPhoto = _Function::getWidth( '../../upload/'.$key['photo'] ); 
			
				if( $widthPhoto >= 600  ) {
					$thumbPic = 'thumb/600-600-';
				} else  {
					$thumbPic = null;
				}
				
				$url_slideshare = preg_replace('#^https?:#', '', rtrim($key['doc_url'],'/'));
	//==== PHOTO	
	if( $key['photo'] != ''  ) {
		$media = "<a data-view='".$_SESSION['LANG']['details']." &rarr;' data-url=".$urlStatus." class='galeryAjax cboxElement link-img' href='".URL_BASE."upload/".$key['photo']."'><img class='photoPost img-responsive' src='".URL_BASE.$thumbPic."upload/".$key['photo']."'></a>";
	}
	
	//==== VIDEO VIMEO
	else if( $key['video_site'] == 'vimeo'  ) {
		$media = '<div class="embed-responsive embed-responsive-4by3"> <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$key['video_code'].'" width="450" height="360" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
	}

	//==== VIDEO YOUTUBE
	else if( $key['video_site'] == 'youtube'  ) {
		$media = '<div class="embed-responsive embed-responsive-4by3"> <iframe class="embed-responsive-item" height="360" src="https://www.youtube.com/embed/'.$key['video_code'].'" allowfullscreen></iframe></div>';
	}

	//==== DailyMotion
	else if( $key['video_site'] == 'dailymotion'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$key['video_url'].'"></iframe>';
	}
	
	//==== Screenr 
	else if( $key['video_site'] == 'screenr'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$key['video_url'].'"></iframe>';
	}
	
	//==== dotsub 
	else if( $key['video_site'] == 'dotsub'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$key['video_url'].'"></iframe>';
	}
	
	//==== hulu 
	else if( $key['video_site'] == 'hulu'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$key['video_url'].'"></iframe>';
	}

	//==== blip 
	else if( $key['video_site'] == 'blip'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$key['video_url'].'"></iframe>';
	}

	//==== SlideShare 
	else if( $key['doc_site'] == 'slideshare'  ) {
		$media = '<iframe class="embed-responsive-item" height="360" scrolling="no" src="'.$url_slideshare.'"></iframe>';
	}
	
	//==== SOUNDCLOUD
	else if( $key['url_soundcloud'] != ''  ) {
		$media = '<iframe class="embed-responsive-item" height="120" scrolling="no" src="https://w.soundcloud.com/player/?url='.$key['url_soundcloud'].'"></iframe>';
	} else {
		$media = null;
	}

	echo $media;
	
	if( $key['url_host'] != '' ) {
		
	?><div class="row list-media-mv margin-zero">
				  	<div class="col-sm-12 padding-zero">
				  		
					<!-- ******** Media ****** -->  
		    	  	<a href="<?php echo $key['url']; ?>" style="border-bottom: 2px solid #0088E2 !important;" target="_blank" class="media li-group list-group-ms links-sm">
		                   
		                   <?php if( $key['url_thumbnail'] != '' ) { ?>
		                    <div class="pull-left margin-zero thumb-url-load">
		                       	<img src="<?php echo URL_BASE.'image_url.php?url='.base64_encode( $key['url_thumbnail'] ); ?>" onerror="$(this).hide();" alt="Image" class="media-object thumbnail_url img-responsive">
		                    </div>
		                    <?php } ?>
		                    
		                    <div class="media-body clearfix text-overflow padding-tp padding-left-group">
		                       <strong class="media-heading">
		                       	<?php if( $key['url_title'] != '') { ?>
		                       		<?php echo $key['url_title']; 
		                       		 } else {
		                       			echo 'Untitled';
		                       		} ?>
		                       	</strong>
		                       <p class="text-col">
		                       	  	<?php if( $key['url_description'] != '') { ?>
		                       	  <span class="block-sm color-font text-overflow"><?php echo $key['url_description']; ?></span>
		                           <?php } ?>
		                          <small class="color-font-link text-uppercase text-link"><?php echo $key['url_host']; ?></small>
		                    </p></div><!-- media-body -->
		        	 </a><!-- ******** Media ****** -->
				</div><!-- col-sm-6 -->
			</div>
			
			<?php } ?>
			
		<!-- list -->
	  	<ul class="list-inline margin-bottom-zero list-options">	
			
			<!-- EXPAND -->
			<li><a data-expand="<?php echo $_SESSION['LANG']['expand']; ?>" data-hide="<?php echo $_SESSION['LANG']['hide']; ?>" class="expand getData" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
	  			<span class="textEx"><?php echo $_SESSION['LANG']['expand']; ?></span>
	  			</a>
	  		</li>
				  		
			<?php if( isset( $_SESSION['authenticated'] ) ): ?>
				
			<!-- FAVORITES -->
			<li>
		  	<a data-fav="<?php echo $_SESSION['LANG']['favorite']; ?>" data-fav-active="<?php echo $_SESSION['LANG']['favorited']; ?>"class="favorite favoriteIcon <?php echo $classFav; ?>" <?php echo $spanFav; ?> data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
		  		<span class="fa fa-star myicon-right"></span> 
		  		<?php echo $textFav; ?>
		  		</a>
		  	</li>
		  	<?php endif; ?>
		  
			<!-- REPOST -->
			<?php if( isset( $_SESSION['authenticated'] ) && $key['user'] !=  $_SESSION['authenticated'] ): ?>
			<li>
		  	<a data-fav="<?php echo $_SESSION['LANG']['repost']; ?>" data-rep-active="<?php echo $_SESSION['LANG']['reposted']; ?>"class="repost_button repostIcon <?php echo $spanRepost; ?>" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
		  		<span class="fa fa-retweet myicon-right"></span> 
		  		<?php echo $textRepost; ?>
		  		</a>
		  	</li>
			<?php endif; ?>
			
			<!-- TRASH -->
			<?php if( $key['user'] == $_SESSION['authenticated'] ): ?>
			
			<li><a data-message="<?php echo $_SESSION['LANG']['delete_post']; ?>" data-confirm="<?php echo $_SESSION['LANG']['confirm']; ?>" class="trash" data-image="<?php echo $key['photo']; ?>" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
		  	<span class="fa fa-trash myicon-right"></span> 
		  	<?php echo $_SESSION['LANG']['trash']; ?>
		  	  </a>
		  	</li>
			<?php endif; ?>
		</ul><!-- ./list -->
	</div><!-- panel-body -->

	<div class="panel-footer content-ajax details-post">
	
	
	<div class="container-media grid-media"></div>
	
	<?php if( isset( $_SESSION['authenticated'] ) ): ?>
	<div class="media">
				
	            <span href="#" class="pull-left">
	                <img alt="" src="<?php echo URL_BASE.'thumb/40-40-public/avatar/'.$infoSessioUsr->avatar; ?>" class="media-object img-circle" width="40">
	            </span>
	            
	            <div class="media-body">
	            <form action="" method="post" accept-charset="UTF-8" id="form_reply_post">	
	            	<textarea class="form-control textarea-text" name="reply_post" id="reply_post">@<?php echo $key['username']; ?> </textarea>
	                <input type="hidden" name="id_reply" id="id_reply" value="<?php echo $key['id']; ?>">
		   			<input type="hidden" name="token_reply" id="token_reply" value="<?php echo $key['token_id']; ?>">
		   					
	                <div class="help-block">
	                	<button id="button_reply" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit" class="btn btn-info btn-xs btn-border">
	                		<?php echo $_SESSION['LANG']['reply']; ?>
	                	</button>
	                </div>
	                </form>
	            </div><!-- media-body -->
	        </div><!-- media -->
	<?php endif; ?>
  </div><!-- panel-footer -->
</li>