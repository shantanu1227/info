<div id="wrapper">
	<div id="errorDisplay" style="float:left;position:fixed;width:100%;height:auto;background-color:#B10C0C;color:#FFFFFF;
								  line-height:200%;font-size:30px;text-align:center;z-index:1000;margin-left:-7.5%;">
		<div id="closebutton" style="height:auto;width:auto;margin-right:10px;float:right;"></div>
	</div>
	<div id="fixed_head">
		<div class="cname">Vinfocity</div>
		<div class="loginaccount">
			<div class="myaccount">My Account</div>
			<?php if($this->session->userdata('userName') == ""){?>
			<div class="reglog">Login/Register</div>
			<div class="mycartbut">Cart (0)</div>
			<?php }else{
				echo "<div class='reglog'>".anchor('/login/logout', 'Logout('.$this->session->userdata('userName').')')."</div>";
			}?>

		</div>
		
	</div>
	<div class="navigation">
		<div class="navbar">
			<ul>
				<li><?php echo anchor('', 'HOME'); ?></li>
				<li>FOOD
					<ul>
						<li><?php echo anchor('/welcome/subway', 'Subway'); ?></li>
						<li><?php echo anchor('/welcome/shivas', 'Shivas'); ?></li>
						<li><?php echo anchor('/welcome/coolpoint', 'Cool Point'); ?></li>
						<li><?php echo anchor('/welcome/qwiches', 'Qwiches'); ?></li>
						<li><?php echo anchor('/welcome/chatkazz', 'Chatkazz'); ?></li>
						<li><?php echo anchor('/welcome/koffee', 'Koffee++'); ?></li>
						<li><?php echo anchor('/welcome/bigbite', 'Bigbite'); ?></li>
					</ul>
				</li>
				<li><a>PROVISION</a>
					<ul>
						<li><?php echo anchor('/welcome/kavya', 'Kavya'); ?></li>
					</ul>
				</li>
				<li><a>MEDICAL</a>
					<ul>
						<li><?php echo anchor('/welcome/medicine', 'Ravi Chemist'); ?></li>
					</ul>
				</li>
				<li><a>STATIONARY</a>
					<ul>
						<li><?php echo anchor('/welcome/oxford', 'Oxford'); ?></li>
						<li><?php echo anchor('/welcome/vs', 'VS'); ?></li>
						<li><?php echo anchor('/welcome/crossword', 'Crossword'); ?></li>
					</ul>
				</li>
				<li><a>LAUNDRY</a>
					<ul>
						<li><?php echo anchor('/welcome/washexpress', 'Washexpress'); ?></li>
					</ul>
				</li>
				<li><a>TECH</a>
					<ul>
						<li><?php echo anchor('/welcome/ominfotech', 'OM Infotech'); ?></li>
						<li><?php echo anchor('/welcome/clublaptop', 'Club Laptop'); ?></li>
					</ul>
				</li>
				<li><a>PRINT/COPY</a>
					<ul>
						<li><?php echo anchor('/welcome/omega', 'Omega'); ?></li>
						<li><?php echo anchor('/welcome/apex', 'Apex'); ?></li>
					</ul>
				</li>
				<a href="http://localhost:8000/info/welcome/aboutus"><li>ABOUT US</li></a>
				<a href="http://localhost:8000/info/welcome/faq"><li>FAQs</li></a>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">  
	$(function() {  
		$('#closebutton').click(function() {  
			$('#errorDisplay').remove();  
		});  
	});  
</script>  
