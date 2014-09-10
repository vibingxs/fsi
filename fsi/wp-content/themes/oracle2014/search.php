<?php get_header(); ?>

    <div class="banner">
        <img class="img" src="<?=bloginfo('template_directory');?>/img/slider/1.jpg"/>
    </div>


<div class="container">
	

	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li>You are here:</li>
				<li><a href="/">Home</a></li>
				<li>Search</li>
			</ol>
		</div>
	</div><!-- /.row -->

		<div class="row">
			<div class="col-md-3">
				<aside class="sidebar">
					<h3>Sector</h3>
					<ul class="list-unstyled">
						<li><a href="/fsi/service-innovation/">Service Innovation (<?=count_cat_post('Service Innovation');?>)</a></li>
						<li><a href="/fsi/strategic-efficiency/">Strategic Efficiency (<?=count_cat_post('Strategic Efficiency');?>)</a></li>
						<li><a href="/fsi/regulatory-mastery/">Regulatory Mastery (<?=count_cat_post('Regulatory Mastery');?>)</a></li>
					</ul>

					<h3>Resources</h3>
					<ul class="list-unstyled">
						<li class="filter" data-filter=".white-paper">White Paper</li>
						<li class="filter" data-filter=".webcast">Webcast</li>
						<li class="filter" data-filter=".video">Video</li>
						<li class="filter" data-filter="all">View All</li>
					</ul>
				</aside>
			</div>

			<div class="col-md-9">

				<div id="sort">
					<?php if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : ?>
						<div class="col-md-12">
							<h3><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
						</div>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-4  mix <?php the_field('resource_type');?>">
								<div class="resource-listing">
									<img src="<?php the_field('resource_image'); ?>" class="img-responsive" alt="">
									<h4><?= the_title();?></h4>
									<div class="resource-type">
										<img src="<?=bloginfo('template_directory');?>/img/icons/pdf.gif" height="31" width="28" alt="">
										<?=the_field('resource_subtitle'); ?>
									</div>
									<a href="<?=the_permalink();?>" class="grey-btn" style="width:60%">View Details <i class="fa fa-angle-double-right"></i></a>
								</div><!--/.resource-listing -->
							</div>	
						<?php endwhile; ?>
					<?php else : ?>
						<p>There are no results for the search term.</p>
					<?php endif; ?>

				</div><!--/#sort -->
			</div>

		</div><!-- /.row -->
	</div><!-- /.container -->	


<?php get_footer(); ?>