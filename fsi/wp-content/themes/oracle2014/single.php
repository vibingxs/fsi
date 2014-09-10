<?php 

get_header();

$str = explode('/', $_SERVER['REDIRECT_URL']);

$args = array(
	'post_type' => 'page',
	'pagename' => $str[2],
	);
$the_query = new WP_Query($args);
if(have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); 
?>

    <div class="banner">
        <?php if( get_field('slider_image_1') ): ?>
			<div>
				<img src="<?php the_field('slider_image_1'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Innovation in Financial Services - Staying Ahead of the Competition </h2>
						<p>This on-demand webcast will help you discover how leading banks and financial services organizations are forging a competitive advantage.</p>
						<a class="red-btn pull-left" href="#">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_2') ): ?>
			<div>
				<img src="<?php the_field('slider_image_2'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Enabling effective strategic innovation through the enterprise PMO</h2>
						<p>Watch this on-demand webcast from Gartner on the evolution and role of the Enterprise PMO to better plan and control business transformations.</p>
						<a class="red-btn pull-left" href="#">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_3') ): ?>
			<div>
				<img src="<?php the_field('slider_image_3'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Mastering Project Portfolio Management for effective regulatory change</h2>
						<p>Learn how financial organizations are using project portfolio management to maintain agility and strategic project planning.</p>
						<a class="red-btn pull-left" href="#">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_4') ): ?>
			<div>
				<img src="<?php the_field('slider_image_4'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>An Interesting Title</h2>
						<p>Phasellus accumsan augue quis diam ornare dictum quis sit amet risus. Sed at odio eu dolor volutpat tempor in sed lorem. </p>
						<a class="red-btn pull-left" href="#">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>	
    </div>

<?php endwhile; endif; ?>	

	<div class="container">

		<div id="anchor"></div>

		<div class="row">
			<ol class="breadcrumb">
				<li>You are here:</li>
				<li><a href="/fsi/">Home</a></li>
				<li><a href="/fsi/<?=$str[2];?>/"><?=$str[2];?></a></li>
				<li class="active"><?=$str[3];?></li>
			</ol>
		</div><!-- /.row -->

		<div class="row">
			<div class="col-md-3">
				<aside class="sidebar">
					<div class="hidden-xs">
						<h3>Related Themes</h3>
						<ul class="list-unstyled">
							<li><a href="/fsi/service-innovation/" class="active">Service Innovation (<?=count_cat_post('Service Innovation');?>)</a></li>
							<li><a href="/fsi/strategic-efficiency/">Strategic Efficiency (<?=count_cat_post('Strategic Efficiency');?>)</a></li>
							<li><a href="/fsi/regulatory-mastery/">Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</a></li>
						</ul>

						<ul class="list-unstyled">
							<li class="filter" data-filter=".white-paper">White Paper</li>
							<li class="filter" data-filter=".webcast">Webcast</li>
							<li class="filter" data-filter=".video">Video</li>
							<li class="filter" data-filter="all">View All</li>
						</ul>
					</div>

					<div class="visible-xs">
						<select class="form-control mobile-filter" onchange="if (this.value) window.location.href=this.value">
							<option value="">Sector</option>
							<option value="/fsi/service-innovation/">Service Innovation (<?=count_cat_post('Service Innovation');?>)</option>
							<option value="/fsi/strategic-efficiency/">Strategic Efficiency (<?=count_cat_post('Strategic Efficiency');?>)</option>
							<option value="/fsi/regulatory-mastery/">Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</option>
						</select>

						<select class="filter-select form-control mobile-filter">
							<option value="">Filter Resources</option>
							<option value=".white-paper">White Paper</option>
							<option value=".webcast">Webcast</option>
							<option value=".video">Video</option>
							<option value="all">View All</option>
						</select>
					</div>
				</aside>
			</div>

			<div class="col-md-9">
				<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="resource-details">
					
					<div class="resource-title">
						<img src="<?=resource_icon(get_field('resource_type'));?>" class="pull-left" alt="">
						<h3><?php the_title();?></h3>
					</div>
					<?php if(get_field('resource_type') == "video"){ ?>

						<div class="video-container">
							<iframe width="640" height="360" src="//www.youtube.com/embed/<?php the_field('youtube_link');?>" frameborder="0" allowfullscreen></iframe>
						</div><!-- /.video-container -->

					<?php } elseif(in_array(get_field('resource_type'), array("brochure", "white-paper"))){ ?>
						<img src="<?php the_field('resource_image');?>" class="img-responsive resource-img" alt="">
					<?php } ?>
					<div class="post-content clearfix">
						<?php the_content(); ?>

                        <div class="cta clearfix">
                            <?php

                            if(get_field('resource_type') == 'webcast'){
                                // serve direct link
                                echo '<a href="'.get_field('webcast_link').'" class="red-btn pull-left" target="_blank">View webcast <i class="fa fa-video-camera"></i></a>';
                            } elseif(in_array(get_field('resource_type'), array("brochure", "white-paper"))){
                                // serve sso link
                                $sso_code = get_field('sso_code');
                                $resource_file = get_field('resource_file');
                                $mime_type = $resource_file['mime_type'];
                                $title = $resource_file['title'];
                                $url = $resource_file['url'];
                                $href = '/fsi/sso/?campaign_code='.urlencode($sso_code).'&activity='.urlencode($mime_type).'&details='.urlencode($title);
//                                $url = '/fsi/sso/?campaign_code='.urlencode(get_field('sso_code')).'&activity='.urlencode(get_field('resource_file')['mime_type']).'&details='.urlencode(get_field('resource_file')['title']);
                                echo '<a data-url="'.$url.'" href="'.$href.'" target="_blank" class="red-btn pull-left sso">Download Resource <i class="fa fa-long-arrow-down"></i></a>';
                            }

                            ?>
                        </div>

                        <!-- /.resource-download -->
					</div><!-- /.post-content -->


					<ul class="resource-share-list list-unstyled">
						<li>
							<a href="https://twitter.com/share" class="btn btn-primary btn-twitter">
							<i class="fa fa-twitter hidden-xs"></i> Share on Twitter</a></li>
						<li><a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-google"><i class="fa fa-google-plus hidden-xs"></i> Share on Google+</a></li>
						<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A//oracle.mointernational-clients.co.uk<?=$_SERVER['REQUEST_URI'];?>&amp;title=<?php the_title();?>" class="btn btn-linkedin"><i class="fa fa-linkedin hidden-xs"></i> Share on LinkedIn</a></li>
					</ul>
				</div><!-- /.resource-details -->

				<?php endwhile; else: ?>
	
					THIS PAGE HAS NO CONTENT
	
				<?php endif; ?>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
	
	<?php if(have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
	<div class="container">
		
		<hr class="break">
		
		<div class="main-content">
			<div class="row">
				<?php the_content(); ?>
			</div>
		</div><!-- /.main-content -->

	</div>
	<?php endwhile; endif; ?> 

<?php get_footer(); ?>