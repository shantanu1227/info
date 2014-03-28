<div id="wrapper">
	<div id="errorDisplay" style="float:left;position:fixed;width:100%;height:auto;background-color:<?php echo $errorColor ;?> ;color:#FFFFFF;
	font-size:30px;text-align:center;z-index:1000;margin-left:-7.5%;"><?php echo $errorMessage; ?>
	<div id="closebutton" style="height:auto;width:auto;margin-right:10px;float:right;"><?php echo $errorClose ;?> </div>
</div>
<div id="fixed_head">
	<div class="cname">Vinfocity</div>
	<div class="loginaccount">
		<?php if($this->session->userdata('userName') == ""){?>
		<div class="reglog">Login/Register</div>
		<?php }else{
			echo anchor('/login/logout', 'Logout ('.$this->session->userdata('userName').')',array('class' => 'reglog') );
			echo anchor('/welcome/myaccount', 'My Account', array('class' => 'myaccount'));
		}?>
		<div class="mycartbut">Cart (<?php echo ($this->cart->total_items());?>)</div>

	</div>

</div>
<div class="navigation">
	<div class="navbar">
		<ul>
			<li><?php echo anchor('', 'HOME'); ?></li>
			<li>FOOD
				<ul>
				<?php $attr = array('style'=>'display:block');?>
					<li><?php echo anchor('/welcome/subway', 'Subway',$attr); ?></li>
					<li><?php echo anchor('/welcome/shivas', 'Shivas',$attr); ?></li>
					<li><?php echo anchor('/welcome/coolpoint', 'Cool Point',$attr); ?></li>
					<li><?php echo anchor('/welcome/qwiches', 'Qwiches',$attr); ?></li>
					<li><?php echo anchor('/welcome/chatkazz', 'Chatkazz',$attr); ?></li>
					<li><?php echo anchor('/welcome/koffee', 'Koffee++',$attr); ?></li>
					<li><?php echo anchor('/welcome/bigbite', 'Bigbite',$attr); ?></li>
				</ul>
			</li>
			<li><a>PROVISION</a>
				<ul>
					<li><?php echo anchor('/welcome/kavya', 'Kavya',$attr); ?></li>
				</ul>
			</li>
			<li><a>MEDICAL</a>
				<ul>
					<li><?php echo anchor('/welcome/medicine', 'Ravi Chemist',$attr); ?></li>
				</ul>
			</li>
			<li><a>STATIONARY</a>
				<ul>
					<li><?php echo anchor('/welcome/oxford', 'Oxford',$attr); ?></li>
					<li><?php echo anchor('/welcome/vs', 'VS',$attr); ?></li>
					<li><?php echo anchor('/welcome/crossword', 'Crossword',$attr); ?></li>
				</ul>
			</li>
			<li><a>LAUNDRY</a>
				<ul>
					<li><?php echo anchor('/welcome/washexpress', 'Washexpress',$attr); ?></li>
				</ul>
			</li>
			<li><a>TECH</a>
				<ul>
					<li><?php echo anchor('/welcome/ominfotech', 'OM Infotech',$attr); ?></li>
					<li><?php echo anchor('/welcome/clublaptop', 'Club Laptop',$attr); ?></li>
				</ul>
			</li>
			<li><a>PRINT/COPY</a>
				<ul>
					<li><?php echo anchor('/welcome/omega', 'Omega',$attr); ?></li>
					<li><?php echo anchor('/welcome/apex', 'Apex',$attr); ?></li>
				</ul>
			</li>
			<li><?php echo anchor('/welcome/aboutus', 'ABOUT US',$attr); ?></li>
			<li><?php echo anchor('/welcome/faq', 'FAQs',$attr); ?></li>
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
