<?php
$sso_code = get_field('sso_code');
$resource_file = get_field('resource_file');
$mime_type = $resource_file['mime_type'];
$title = $resource_file['title'];
$url = $resource_file['url'];
$href = '/fsi/sso/?campaign_code='.urlencode($sso_code).'&activity='.urlencode($mime_type).'&details='.urlencode($title);
$type = get_field('resource_type');
?>
<li class="col-md-4 mixitem <?php the_field('resource_type');?>" style="display:inline-block">
	<div class="resource-listing">

        <?php if(in_array($type, array('video'))): ?>
            <?php
            $href = '/fsi/sso/?campaign_code='.urlencode(get_field('sso_code')).'&activity=youtube&details='.get_field('youtube_link');
            ?>
            <a data-url="<?=the_permalink();?>#anchor" href="<?=$href;?>" class="sso"><img src="<?php the_field('resource_image'); ?>" class="img-responsive" alt="<?= the_title();?>"></i></a>
        <?php else: ?>
            <a href="<?=the_permalink();?>#anchor"><img src="<?php the_field('resource_image'); ?>" class="img-responsive" alt="<?= the_title();?>"></a>
        <?php endif; ?>
		<h4 class="resource-title"><?= the_title();?></h4>
		<div class="resource-type">
			<img src="<?=resource_icon($type);?>" height="31" width="28" alt="">
			<?=the_field('resource_subtitle'); ?>
		</div>
        <?php if(in_array($type, array('video'))): ?>
            <?php
            $url = '/fsi/sso/?campaign_code='.urlencode(get_field('sso_code')).'&activity=youtube&details='.get_field('youtube_link');
            ?>
		    <a data-url="<?=the_permalink();?>#anchor" href="<?=$url;?>" class="grey-btn pull-left details-btn sso">View Details <i class="fa fa-angle-double-right"></i></a>
        <?php else: ?>
            <a href="<?=the_permalink();?>#anchor" class="grey-btn pull-left details-btn">View Details <i class="fa fa-angle-double-right"></i></a>
        <?php endif; ?>
		<?php if(!in_array($type, array('webcast', 'video'))): ?>
            <a data-url="<?=$url;?>" href="<?=$href;?>" target="_blank" class="blue-btn pull-left sso"><i class="fa fa-arrow-down"></i></a>
        <?php endif; ?>
	</div><!--/.resource-listing -->
</li>