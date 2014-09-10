<?php get_header(); ?>

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="slider">
		
		<?php if( get_field('slider_image_1') ): ?>
			<div>
				<img src="<?php the_field('slider_image_1'); ?>" />
				<div class="ns_slideContent">
					<div class="container">
						<h2>Turn Strategic Planning into Real Business Outcomes</h2>
						<p>Robert Kaplan, has fresh advice for financial services organizations—on maximizing the impact of business strategy. </p>
						<a target="_blank" class="red-btn pull-left" href="http://w.on24.com/r.htm?e=791976&s=1&k=D24B1969DCEF0634372031D40926BBD0">Watch webcast <i class="fa fa-angle-double-right"></i></a>
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
						<h2>Enabling Effective Strategic Innovation Through the Enterprise PMO</h2>
						<p>Watch this on-demand webcast from Gartner on the evolution and role of the Enterprise PMO to better plan and control business transformations.</p>
						<a target="_blank" class="red-btn pull-left" href="http://event.on24.com/r.htm?e=782949&s=1&k=05B76C408AC5024FBCF50D3D314BD7BF">Watch webcast <i class="fa fa-angle-double-right"></i></a>
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
						<a target="_blank" class="red-btn pull-left" href="http://oracle-eppm.com/fsi/regulatory-mastery/compliance-week-ondemand-webcast-project-portfolio-management-can-enable-regulatory-mastery/#anchor">Watch webcast <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>	
	</div><!-- /.slider -->
<?php endwhile; endif; ?>

<div class="container">
	<div class="col-md-12">
		<h1 class="centre red">Featured Resource</h1>
	</div>

	<?php 

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'category_name' => 'featured'
			);

		$the_query = new WP_Query($args);

	if(have_posts()) : while($the_query->have_posts()) : $the_query->the_post();

        $sso_code = get_field('sso_code');
        $resource_file = get_field('resource_file');
        $mime_type = $resource_file['mime_type'];
        $title = $resource_file['title'];
        $url = $resource_file['url'];
        $href = '/fsi/sso/?campaign_code='.urlencode($sso_code).'&activity='.urlencode($mime_type).'&details='.urlencode($title);

	?>
		<div class="row">
			<div class="col-md-5">
                <a data-url="<?=$url;?>" href="<?=$href;?>" class="sso"><img src="<?php the_field('resource_image');?>" class="img-responsive" alt=""></a>
			</div>
			<div class="col-md-7">
				<div class="post-content">
					<?php the_content(); ?>
				</div>

                <?php
                echo '<a data-url="'.$url.'" href="'.$href.'" target="_blank" class="red-btn pull-left sso">Download Resource <i class="fa fa-long-arrow-down"></i></a>';
                ?>
                <!--<a href="" class="pull-left grey-btn">View all Resources <i class="fa fa-long-arrow-down"></i></a>-->
			</div>
		</div>
	<?php endwhile; endif; ?>
</div><!-- /.container -->

<div class="grey-container">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<a href="/fsi/service-innovation"><img src="<?=bloginfo('template_directory');?>/img/service-innovation-cat.jpg" class="img-responsive category-img" alt=""></a>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<a href="/fsi/business-transformation"><img src="<?=bloginfo('template_directory');?>/img/strategic-efficiency-cat.jpg" class="img-responsive category-img" alt=""></a>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<a href="/fsi/regulatory-mastery"><img src="<?=bloginfo('template_directory');?>/img/regulatory-mastery-cat.jpg" class="img-responsive category-img" alt=""></a>
			</div>
		</div>
	</div><!-- /.container -->
</div><!-- /.grey-container -->

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="row front-page-content">
			<?=the_content(); ?>
		</div>
	</div><!-- /.container -->
<?php endwhile; endif; ?>


<?php get_footer(); ?>
