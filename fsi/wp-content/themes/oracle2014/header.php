<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        // Webmaster Tools: verify your ownership of http://www.oracle-eppm.com
        if( !in_array($_SERVER['REMOTE_ADDR'], array('88.215.22.66', '127.0.0.1')) )
            echo '<meta name="google-site-verification" content="bWbOJtdQ7KG5LXk4aC_rw5Md3p8aADs0N-NEt8KqDMw" />';
    ?>

    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link href="//www.oracle.com/us/assets/compass.css" media="print, screen" rel="Stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
    <?php wp_head(); ?>
	<!--[if gte IE 7]>
		<link rel="stylesheet" href="<?=bloginfo('template_directory');?>/css/ie.css">
	<![endif]-->
    <!--[if lt IE 9]>
    	<script src="<?=bloginfo('template_directory');?>/js/html5shiv.min.js"></script>
    	<script src="<?=bloginfo('template_directory');?>/js/respond.js"></script>
    <![endif]-->
      <script>
          jQuery(document).ready(function($){

              $('body').on('click','.sso', function(e){
                  e.preventDefault();
                  var self = this;

                  $.post(
                      '/fsi/wp-admin/admin-ajax.php',
                      {
                          'action':'sso'
                      },
                      function(r) {
//                          if(window.console) console.log(r);
                          if(r.success){
                              // notify SSO - log activity
                              $.get(
                                  '/fsi/wp-admin/admin-ajax.php',
                                  {
                                      'action':'sso',
                                      'data' : {
                                          'url': self.href
                                      }
                                  },function(r){
                                      // debugging
//                                      if(window.console) console.log(r);
//                                      if(window.console) console.log($(self).data('url'));

                                      // redirect to download
                                      if($(self).attr('target')){
                                        window.open($(self).data('url'),'_blank');
                                      }else{
                                        window.location.replace($(self).data('url'));
                                      }

                                  },
                                  'json'
                              );

                          } else {
//                              if(window.console) console.log('HERE');
                              // no sso uid - run sso redirect

                                      if($(self).attr('target')){
                                        window.open('/fsi/sso/?request_url='+window.location.href,'_blank');
                                      }else{
                                        window.location.replace('/fsi/sso/?request_url='+window.location.href);
                                      }



                          }
                      },
                      'json'
                  );

              });


              if($('.cw21help')){

                    $('.cw21chat a').click(function(event){
                        event.preventDefault();

                        window.open($(this).attr('href'), "Chat", "width=400, height=600");

                    });

                

                    $('.cw21help a').click(function(event){
                        event.preventDefault();

                        var theDisplay,theRight;

                        if($('#cw21-calltab').css('display') == "none"){
                          theDisplay = "block";
                          theRight = "0px";
                          $('#cw21-calltab').css('display',theDisplay);
                        }else{
                          theDisplay = "none";
                          theRight = "-262px";
                        }

                            

                        $( ".cw21" ).animate({
                          right:theRight,
                        }, 1000, function() {
                          // Animation complete.
                          $('#cw21-calltab').css('display',theDisplay);
                        });
                    });
              }

          });
      </script>

  </head>
  <body <?php body_class(); ?>>
  	<div class="fixed-header">
		<div class="toolbar hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-md-6 col-xs-12">
						<?php get_search_form(); ?>
					</div>
					<?php if( is_user_logged_in() ){ ?>
					<div class="col-sm-5 col-md-6 col-xs-12 contact-us">
						<p><a class="red" href="/fsi/contact-us">Contact Us</a><img src="<?=bloginfo('template_directory');?>/img/contact-us.gif" alt="" /></p>
					</div>
					<?php } ?>
				</div>
			</div><!-- /.container -->
		</div><!-- /.toolbar -->
		<div class="navbar navbar-default navbar-static-top" role="navigation">
		    <div class="container">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="/fsi/">
						<img src="<?=bloginfo('template_directory');?>/img/oracle-logo.gif" alt="" class="img-responsive logo">
		            </a>
		        </div>
		        <div class="navbar-collapse collapse">
		            <?php
		            	$args = array(
		            		'menu' => 'main-menu',
		            		'menu_class' => 'nav navbar-nav navbar-right',
		            		'walker' => new rc_scm_walker,
		            	);

		            	wp_nav_menu($args);
		            ?>
		        </div><!--/.nav-collapse -->
		    </div>
		</div>
	</div><!-- /.fixed-header -->