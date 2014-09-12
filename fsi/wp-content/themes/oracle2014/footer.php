<div class="social-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>Stay Connected</h4>
					<ul class="social-list list-unstyled">
						<li><a href="<?=get_option('facebook'); ?>"><img src="<?=bloginfo('template_directory');?>/img/facebook.jpg"  alt="Follow us on Facebook"></a></li>
						<li><a href="<?=get_option('linkedin'); ?>"><img src="<?=bloginfo('template_directory');?>/img/linkedin.jpg" alt="Connect with us on Linkedin"></a></li>
						<li><a href="<?=get_option('twitter'); ?>"><img src="<?=bloginfo('template_directory');?>/img/twitter.jpg" alt="Follow us on Twitter"></a></li>
						<li><a href="<?=get_option('google'); ?>"><img src="<?=bloginfo('template_directory');?>/img/google.jpg" alt="Follow us on Google+"></a></li>
						<li><a href="<?=get_option('youtube'); ?>"><img src="<?=bloginfo('template_directory');?>/img/youtube.jpg" alt="Subscribe on Youtube"></a></li>
					</ul>
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.social-bar -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-unstyled">
                        <a href="/fsi/">
						<img src="<?=bloginfo('template_directory');?>/img/oracle-logo.png" width="100" alt="Oracle Instantis" class="footer-logo" title="Oracle Instantis">
                        </a>
						<li><a href="/fsi/">Financial Services Overview</a></li>
						<li><a href="/fsi/service-innovation/">Service Innovation</a></li>
						<li><a href="/fsi/business-transformation/">Business Transformation</a></li>
						<li><a href="/fsi/regulatory-mastery/">Regulatory Mastery</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="copyright-text">Oracle Enterprise Project Portfolio Management - Copyright <?= date("Y"); ?></p>
				</div>
			</div>
		</div>
	</footer>

	



        <!-- CW21v0 -->
        <div class="cw21 cw21v0 cw21opened" style="z-index:10000;">
            <div class="cw21slideout">

                <div class="cw21handle">
                    <ul class="cw21navigation">
                        <li class="cw21help"><a href="#cw21-calltab">Call<b></b></a></li>
                        <li class="cw21chat"><div data-lbl="chat-widget" id="atgchat-flyout"><a target="_blank" href="https://apps.instantservice.com/OracleChat/?wvurl=https%3A%2F%2Fc-603.estara.com%2FUI%2Fgui.php&wvpost=YToxOntzOjEzOiJvcHRpb25hbGRhdGE1IjtzOjY0OiJQcmltYXZlcmEgRW50ZXJwcmlzZSBQcm9qZWN0IFBvcnRmb2xpbyBNYW5hZ2VtZW50IChQUE0pIHwgT3JhY2xlIjt9&wvsplashurl=https%3A%2F%2Fapps.instantservice.com%2FOracleChat%2F">Chat<b></b></a><!--— spacer —--></div></li>

                    </ul>
                </div>

                <div class="cw21w1">

                    <div class="cw21w2" id="cw21-calltab">
                        <h4>We're here to help</h4>
                        <p>Engage a Sales Expert</>
                        <ul>
                            <li class="cw21phone">Sales<br />1-800-423-0245</li>
                            <li class="cw21phone">UK<br />+44 -0-870-8-768711</li>
                            <li><a href="javascript:startCallback('0i2wzK12842','customer data')">Have Oracle Call You</a></li>
                            <li class="cw21global"><a target="_blank" href="http://www.oracle.com/us/corporate/contact/global-070511.html">Global Contacts</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- /CW21v0 -->

	<?php wp_footer(); ?>

    <?php if( !in_array($_SERVER['REMOTE_ADDR'], array('88.215.22.66', '127.0.0.1')) ): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-50479397-2', 'oracle-eppm.com');
            ga('send', 'pageview');

        </script>
    <?php endif; ?>

	</body>
</html>