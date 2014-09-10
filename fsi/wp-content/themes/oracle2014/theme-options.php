<?php

add_action('admin_menu', 'oracle_create_menu');

function oracle_create_menu() {
    add_submenu_page( 'themes.php', 'Oracle Theme Options',
          'Theme Options', 'administrator', __FILE__,
          'oracle_settings_page');
    add_action( 'admin_init', 'oracle_register_settings' );
}


function oracle_register_settings() {
	register_setting( 'oracle-settings-group', 'facebook' );
	register_setting( 'oracle-settings-group', 'twitter' );
	register_setting( 'oracle-settings-group', 'google' );
	register_setting( 'oracle-settings-group', 'linkedin' );
	register_setting( 'oracle-settings-group', 'youtube' );
}


function oracle_settings_page() { ?>
    <div class="wrap">
    	<h2>Oracle Theme Settings</h2>

    	<h3>Social Links</h3>
		<form id="landingOptions" method="post" action="options.php">
			<?php settings_fields( 'oracle-settings-group' ); ?>
			<table class="form-table">
          		<tr valign="top">
          			<th scope="row">Facebook Link:</th>
          			<td>
          				<input type="text" name="facebook" value="<?php print get_option('facebook'); ?>" />
					</td>
				</tr>

				<tr valign="top">
          			<th scope="row">Twitter Link:</th>
          			<td>
          				<input type="text" name="twitter" value="<?php print get_option('twitter'); ?>" />
					</td>
				</tr>

				<tr valign="top">
          			<th scope="row">Google+ Link:</th>
          			<td>
          				<input type="text" name="google" value="<?php print get_option('google'); ?>" />
					</td>
				</tr>

				<tr valign="top">
          			<th scope="row">LinkedIn Link:</th>
          			<td>
          				<input type="text" name="linkedin" value="<?php print get_option('linkedin'); ?>" />
					</td>
				</tr>

				<tr valign="top">
          			<th scope="row">YouTube Link:</th>
          			<td>
          				<input type="text" name="youtube" value="<?php print get_option('youtube'); ?>" />
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        	</p>	
		</form>
	</div>

<?php } ?>