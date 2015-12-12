<?php 
/*----------------------------------------------
 *  SHOW NUMBER NOTIFICATIONS IN BROWSER ( 1 )
 * --------------------------------------------
 */
if( $this->notiMsg->total != 0 &&  $this->notiIntera->total != 0 ) {
	$totalNotifications = '('.( $this->notiMsg->total + $this->notiIntera->total ).') ';
	$totalNotify        = ( $this->notiMsg->total + $this->notiIntera->total );
} else if( $this->notiMsg->total == 0 &&  $this->notiIntera->total != 0  ) {
	$totalNotifications = '('.$this->notiIntera->total.') ';
	$totalNotify = $this->notiIntera->total;
} else if ( $this->notiMsg->total != 0 &&  $this->notiIntera->total == 0 ) {
	$totalNotifications = '('.$this->notiMsg->total.') ';
	$totalNotify = $this->notiMsg->total;
} else {
	$totalNotifications = null;
	$totalNotify = null;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo URL_BASE; ?>" target="_top" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo DESCRIPTION_SITE; ?>" />
	<meta name="keywords" content="<?php echo KEYWORDS_SITE; ?>" />
    <link rel="icon" href="<?php echo URL_BASE; ?>public/img/favicon.ico">

    <title><?php echo $totalNotifications; if( isset( $this->title ) ) : echo _Function::spaces(strip_tags( $this->title )).' - '; endif; ?><?php echo SITE_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_layoutParams['root_css']; ?>bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $_layoutParams['root_css']; ?>main.css" rel="stylesheet">
    
     <!-- FLAT UI CSS -->
    <link href="<?php echo $_layoutParams['root_css']; ?>flat-ui.css" rel="stylesheet">
    
    <!-- FONT Awesome CSS -->
    <link href="<?php echo $_layoutParams['root_css']; ?>font-awesome.min.css" rel="stylesheet">
    
    <!-- IcoMoon CSS -->
    <link href="<?php echo $_layoutParams['root_css']; ?>icomoon.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo $_layoutParams['root_js']; ?>ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $_layoutParams['root_js']; ?>ie10-viewport-bug-workaround.js"></script>
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
    	
    	.navbar-inverse:not(.navbar-user-ui) {
    		background-color: <?php echo $this->settings->bg_navbar; ?>;
    	}
    	.navbar-inverse .navbar-nav > li > a {
    		color: <?php echo $this->settings->color_link_navbar; ?>;
    	}
    	i.verified {
    		color: <?php echo $this->settings->color_icons_verified; ?>;
    	}
    	
    </style>
    
<?php if( Session::get( 'authenticated' ) ): ?>
<script type="text/javascript">

//<----- Notifications
function Notifications() {	
	
	 var _title = '<?php if( isset( $this->title ) ) : echo addslashes(  _Function::spaces( strip_tags( $this->title ) ) ).' - '; endif; ?><?php echo addslashes( SITE_NAME ); ?>';
	 console.time('cache');
	 $.get("public/ajax/notifications.php", function( data ) {	
		if ( data ) {
			//* Messages */
			if( data.messages != 0 ) {
				
				var totalMsg = data.messages;
				
				$('#noti_msg').fadeIn().html(data.messages);
			} else {
				$('#noti_msg').fadeOut().html('');
				
				if(  data.interactions == 0 ) {
					 $('title').html( _title );
				}
			}
			
			//* Interactions */
			if( data.interactions != 0 ) {
				
				var totalIntera = data.interactions;
				$('#noti_connect').fadeIn().html(data.interactions);
			}
			
			//* Error */
			if( data.error == 1 ) {
				window.location.reload();
			}
			
			var totalGlobal = parseInt( totalMsg ) + parseInt( totalIntera );
		
		if( data.interactions != 0 && data.messages != 0 ) {
		    $('title').html( "("+ totalGlobal + ") " + _title );
		  } else if( data.interactions != 0 && data.messages == 0 ) {
		    $('title').html( "("+ data.interactions + ") " + _title );
		  } else if( data.interactions == 0 && data.messages != 0 ) {
		    $('title').html( "("+ data.messages + ") " + _title );
		  } 
		
		}//<-- DATA
	     	
		},'json');
		
		console.timeEnd('cache'); 
}//End Function TimeLine
	
timer = setInterval("Notifications()", 10000);
        </script>
            <?php endif; ?>
            
<script type="text/javascript">
    
    // AllLoaded
    var AllLoaded = "<?php echo $_SESSION['LANG']['all_loaded']; ?>";
    // ReadMore
    var ReadMore = "<?php echo $_SESSION['LANG']['read_more']; ?>";
    var ReadLess = "<?php echo $_SESSION['LANG']['read_less']; ?>";
    
    <?php if( !Session::get( 'authenticated' ) ): ?>
    // Mail Verify True or False
    var emailVerify = <?php echo EMAIL_VERIFY; ?>;
    <?php endif; ?>
    </script>