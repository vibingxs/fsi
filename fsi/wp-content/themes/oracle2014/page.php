<?php get_header(); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>




<div class="banner">
		
		<?php if( get_field('slider_image_1') ): ?>
			<div>
				<img src="<?php the_field('slider_image_1'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Turn strategic planning into real business outcomes</h2>
						<p>Robert Kaplan, has fresh advice for financial services organizations—on maximizing the impact of business strategy. </p>
						<a class="red-btn pull-left" href="http://w.on24.com/r.htm?e=791976&s=1&k=D24B1969DCEF0634372031D40926BBD0">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_2') ): ?>
			<div>
				<img src="<?php the_field('slider_image_2'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Innovation in Financial Services - Staying Ahead of the Competition</h2>
						<p>This on-demand webcast will help you discover how leading banks and financial services organizations are forging a competitive advantage.</p>
						<a class="red-btn pull-left" href="http://oracle-eppm.com/fsi/service-innovation/cio-demand-webcast-accenture-innovation-financial-services-staying-ahead-competition/#anchor">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_3') ): ?>
			<div>
				<img src="<?php the_field('slider_image_3'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Enabling effective strategic innovation through the enterprise PMO</h2>
						<p>Watch this on-demand webcast from Gartner on the evolution and role of the Enterprise PMO to better plan and control business transformations.</p>
						<a class="red-btn pull-left" href="http://event.on24.com/r.htm?e=782949&s=1&k=05B76C408AC5024FBCF50D3D314BD7BF">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('slider_image_4') ): ?>
			<div>
				<img src="<?php the_field('slider_image_4'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Mastering Project Portfolio Management for effective regulatory change</h2>
						<p>Learn how financial organizations are using project portfolio management to maintain agility and strategic project planning.</p>
						<a class="red-btn pull-left" href="http://oracle-eppm.com/fsi/regulatory-mastery/compliance-week-ondemand-webcast-project-portfolio-management-can-enable-regulatory-mastery/#anchor">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>	
	</div>


<div class="container">
		
	<div id="anchor"></div>

	
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li>You are here:</li>
					<li><a href="/fsi/">Home</a></li>
					<li class="active"><?php the_title(); ?></li>
				</ol>
			</div>
		</div><!-- /.row -->

	<?php endwhile;  endif; ?>
		
		<div class="row">
			<div class="col-md-3">
				<aside class="sidebar">
					<div class="hidden-xs">
						<h3>Related Themes</h3>
<?php
/*$args = array(
	'post_type' 			=> $postType,
	'category_name' 		=> $category,	
	'author'				=> $author_id,
	'posts_per_page' 		=> $numPosts,
	'paged'          		=> $page,	
	'orderby'   			=> 'date',
	'order'     			=> 'DESC',
	'post_status' 			=> 'publish',
	'ignore_sticky_posts' 	=> true,
);*/


$argsx = array(
	'post_type' 			=> 'post',
	'category_name' 		=> 'service-innovation',	
	'post_status' 			=> 'publish',
	'ignore_sticky_posts' 	=> true,
);


/*Array ( [post_type] => post [category_name] => service-innovation [author] => [posts_per_page] => 999 [paged] => 1 [orderby] => date [order] => DESC [post_status] => publish [ignore_sticky_posts] => 1 [tag] => )**/

$cats = query_posts($argsx);



//echo "<pre>".print_r($cats,TRUE)."</pre>";


?>
						<ul class="list-unstyled">
							<li><a href="/fsi/service-innovation/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/fsi/service-innovation/"){ ?>class="active"<?php } ?>>Service Innovation (<?=count_cat_post('Service Innovation');?>)</a>
							
								<ul class="list-unstyled related-types first">
									<li class="filter" data-filter=".brochure">Brochure</li>
									<li class="filter" data-filter=".white-paper">White Paper</li>
									<li class="filter" data-filter=".webcast">Webcast</li>
									<li class="filter" data-filter=".video">Video</li>
									<li class="filter" data-filter="all">View All</li>
								</ul>
								
							</li>
							<li><a href="/fsi/business-transformation/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/fsi/business-transformation/"){ ?>class="active"<?php } ?>>Business Transformation (<?=count_cat_post('Business Transformation');?>)</a>
							
								<ul class="list-unstyled related-types second">
									<li class="filter" data-filter=".brochure">Brochure</li>
									<li class="filter" data-filter=".white-paper">White Paper</li>
									<li class="filter" data-filter=".webcast">Webcast</li>
									<li class="filter" data-filter=".video">Video</li>
									<li class="filter" data-filter="all">View All</li>
								</ul>
								
							</li>
							<li><a href="/fsi/regulatory-mastery/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/fsi/regulatory-mastery/"){ ?>class="active"<?php } ?>>Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</a>
							
								<ul class="list-unstyled related-types third">
									<li class="filter" data-filter=".brochure">Brochure</li>
									<li class="filter" data-filter=".white-paper">White Paper</li>
									<li class="filter" data-filter=".webcast">Webcast</li>
									<li class="filter" data-filter=".video">Video</li>
									<li class="filter" data-filter="all">View All</li>
								</ul>
							
							</li>
						</ul>


					</div>

					<div class="visible-xs">
						<select class="form-control mobile-filter" onchange="if (this.value) window.location.href=this.value">
							<option value="">Sector</option>
							<option value="/fsi/service-innovation/#anchor">Service Innovation (<?=count_cat_post('Service Innovation');?>)</option>
							<option value="/fsi/business-transformation/#anchor">Business Transformation (<?=count_cat_post('Business Transformation');?>)</option>
							<option value="/fsi/regulatory-mastery/#anchor">Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</option>
						</select>

						<select class="filter-select form-control mobile-filter">
							<option value="">Filter Resources</option>
							<option value=".brochure">Brochure</option>
							<option value=".white-paper">White Paper</option>
							<option value=".webcast">Webcast</option>
							<option value=".video">Video</option>
							<option value="all">View All</option>
						</select>
					</div>
				</aside>
			</div>

			<section id="ajax-load-more">

                <div class="col-md-9" id="content">

                    <ul id="sort" class="listing list-unstyled" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="post" data-category="<?=$post_slug=$post->post_name;?>" data-display-posts="3" data-scroll="false" data-button-text="Load More Posts">
                    </ul><!--/#sort -->
                    <!--<button id="load-more">Load More Posts <i class="fa fa-long-arrow-down"></i></button>-->
                </div>

			</section>
		</div><!-- /.row -->
	
		<hr class="break">
		
		<div class="main-content">
			<div class="row">
				<?=the_content(); ?>
			</div>
		</div><!-- /.main-content -->


		<?php 
$argsx = array(
	'post_type' 			=> 'post',
	'category_name' 		=> 'service-innovation',	
	'post_status' 			=> 'publish',
	'ignore_sticky_posts' 	=> true,
);


/*Array ( [post_type] => post [category_name] => service-innovation [author] => [posts_per_page] => 999 [paged] => 1 [orderby] => date [order] => DESC [post_status] => publish [ignore_sticky_posts] => 1 [tag] => )**/

$cats = query_posts($argsx);

foreach($cats as $cat){
	//print_r(get_post_meta($cat->ID));
	//echo "<pre>".print_r(get_post_meta($cat->ID),TRUE)."</pre>";
}

//echo "<pre>".print_r($cats,TRUE)."</pre>";
		?>

	
	</div><!-- /.container -->	
	
	


<?php get_footer(); ?>