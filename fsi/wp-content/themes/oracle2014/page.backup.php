<?php get_header(); ?>

<div class="slider">
	<img src="<?=bloginfo('template_directory');?>/img/slider/1.jpg" alt="">
	<img src="<?=bloginfo('template_directory');?>/img/slider/2.jpg" alt="">
</div><!-- /.slider -->

<div class="container">
	
	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="main-content">
			<div class="row">
				<?=the_content(); ?>
			</div>
		</div><!-- /.main-content -->
		

		<div id="anchor">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li>Your are here:</li>
						<li><a href="/">Home</a></li>
						<li class="active"><?php the_title(); ?></li>
					</ol>
				</div>
			</div><!-- /.row -->

	<?php endwhile;  endif; ?>
		
		<div class="row">
			<div class="col-md-3">
				<aside class="sidebar">
					<div class="hidden-xs">
						<h3>Sector</h3>
						<ul class="list-unstyled">
							<li><a href="/service-innovation/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/service-innovation/"){ ?>class="active"<?php } ?>>Service Innovation (<?=count_cat_post('Service Innovation');?>)</a></li>
							<li><a href="/strategic-efficiency/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/strategic-efficiency/"){ ?>class="active"<?php } ?>>Strategic Efficiency (<?=count_cat_post('Strategic Efficiency');?>)</a></li>
							<li><a href="/regulatory-mastery/#anchor" <?php if($_SERVER['REQUEST_URI'] == "/regulatory-mastery/"){ ?>class="active"<?php } ?>>Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</a></li>
						</ul>

						<h3>Resources</h3>
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
							<option value="/service-innovation/">Service Innovation (<?=count_cat_post('Service Innovation');?>)</option>	
							<option value="/strategic-efficiency/">Strategic Efficiency (<?=count_cat_post('Strategic Efficiency');?>)</option>
							<option value="/regulatory-mastery/">Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</option>
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

			<div class="col-md-9" id="content">

				<div id="sort">

				<?php  

				$cat = get_field('resource_category');


				$args = array(
					'post_type' => 'post',
					'cat' => $cat,
					);

				$the_query = new WP_Query($args);

				if(have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
					
					<div class="col-md-4  mix <?php the_field('resource_type');?>">
						<div class="resource-listing">
							<a href="<?=the_permalink();?>"><img src="<?php the_field('resource_image'); ?>" class="img-responsive" alt="<?= the_title();?>"></a>
							<h4 class="resource-title"><?= the_title();?></h4>
							<div class="resource-type">
								<img src="<?=resource_icon(get_field('resource_type'));?>" height="31" width="28" alt="">
								<?=the_field('resource_subtitle'); ?>
							</div>
							<a href="<?=the_permalink();?>" class="grey-btn pull-left details-btn">View Details <i class="fa fa-angle-double-right"></i></a>
							<a href="" class="red-btn pull-left"><i class="fa fa-arrow-down"></i></a>
						</div><!--/.resource-listing -->
					</div>

				<?php endwhile; endif; ?>
				</div><!--/#sort -->
			</div>
		</div><!-- /.row -->
		</div><!-- /#anchor -->
	</div><!-- /.container -->	


<?php get_footer(); ?>