<html>
	<head>
		<link rel="stylesheet" type="text/css" href="footer.css">
	</head>
	<body>
		<div class="footer">
			<div class="columns">
			<ul>
				<li>
				<dt class="headings1">Popular Shops</dt>
					<ul>
						<li>
						
							<dd class="subheadings"><?php echo anchor('/welcome/subway', 'Subway'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/qwiches', 'Qwiches'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/chatkazz', 'Chatkazz'); ?></</dd>
							<dd class="subheadings"><?php echo anchor('/welcome/koffee', 'Koffee++'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/bigbite', 'Bigbite'); ?></dd>
						</li>
						<li>
							<dd class="subheadings"><?php echo anchor('/welcome/kavya', 'Kavya'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/oxford', 'Oxford'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/washexpress', 'Washexpress'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/ominfotech', 'OMInfotech'); ?></dd>
							<dd class="subheadings"><?php echo anchor('/welcome/clublaptop', 'ClubLaptop'); ?></dd>
						</li>
					</ul>
				</li>

				<li>
					<dt class="headings1">Account</dt></br>
					<dd class="subheadings"><?php echo anchor('/welcome/myaccount', 'MyAccount'); ?></dd>
					<dd class="subheadings">Login</dd>
					<dd class="subheadings">Sign up</dd>
					<dd class="subheadings"><?php echo anchor('/welcome/cart' ,'Cart');?></dd>				
				</li>

				<li>
					<dt class="headings1"> Virtual Infocity</dt>
					<dd class="subheadings"><?php echo anchor('/welcome/aboutus', 'ABOUT US',$attr); ?></dd>
					<dd class="subheadings"><?php echo anchor('/welcome/faq', 'FAQs',$attr); ?></dd>
					<dd class="subheadings">Privacy</dd>
					<dd class="subheadings">Terms & Conditions</dd>
				</li>

				<li>
					<div class="icons">Stay Connected!</br>
						<img class="google_icon" src="<?php echo(IMG.'social_icons/google_dark.png');?>"></img>
						<a href="https://www.facebook.com/Vinfocity" target="_blank"><img class="facebook_icon" src="<?php echo(IMG.'social_icons/facebook_dark.png');?>"></img></a>
						<img class="twitter_icon" src="<?php echo(IMG.'social_icons/twitter02_dark.png');?>"></img>
						<img class="yahoo_icon" src="<?php echo(IMG.'social_icons/yahoo_dark.png');?>"></img>
					</div>
				</li>
			</ul>	
			</div>
		</div>
		<script>
			$(".google_icon").mouseover(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/google_active.png');?>");
			});
			$(".google_icon").mouseout(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/google_dark.png');?>");
			});
			$(".facebook_icon").mouseover(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/facebook_active.png');?>");
			});
			$(".facebook_icon").mouseout(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/facebook_dark.png');?>");
			});
			$(".twitter_icon").mouseover(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/twitter02_active.png');?>");
			});
			$(".twitter_icon").mouseout(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/twitter02_dark.png');?>");
			});
			$(".yahoo_icon").mouseover(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/yahoo_active.png');?>");
			});
			$(".yahoo_icon").mouseout(function () {
				$(this).attr("src", "<?php echo(IMG.'social_icons/yahoo_dark.png');?>");
			});
		</script>
	</body>
</html>