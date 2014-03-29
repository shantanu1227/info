<script src="<?php echo (JS.'jquery-validation-1.11.1/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
	// Setup form validation on the #register-form element
	$.validator.addMethod(
		"regex",
		function(value, element, regexp) {
			var re = new RegExp(regexp);
			return re.test(value);
		},
		"Please check your input."
	);

	$("#registerform").validate({
		errorElement: "div",
		// Specify the validation rules
		rules: {
			fullname: "required",
			username: {
				required: true,
				number: true,
				range: [201001001, 201499999]
			},
			password: {
				required: true,
				minlength: 5
			},
			roomno: {
				required: true,
				regex: '^[A-H]{1}-[1-3]{1}[0-2]{1}[0-9]{1}$'
				},
			mobileno: {
				required: true,
				minlength: 10
			},
		},
		
		// Specify the validation error messages
		messages: {
			fullname: "",
			username: {
				required:'',
				maxlength: "Please enter a your DA-IICT ID.",
				minlength: "Please enter a your DA-IICT ID.",
				range: "Please enter a your DA-IICT ID."
			},
			password: {
				required:'',
				minlength: "Password must be at least 5 characters long."
			},
			roomno: {
				required:'',
				regex: "Please enter a valid roomno."
				},
			mobileno: {
				required:'',
				minlength: "Please enter a valid mobile number."
				},
		},
		
		submitHandler: function(form) {
			form.submit();
		}
	});
	$("#loginform").validate({
		errorElement: "div",
		// Specify the validation rules
		rules: {
			username: {
				required: true,
				number: true,
				range: [201001001, 201499999]
			},
			password: {
				required: true,
				minlength: 5
			}
		},
		
		// Specify the validation error messages
		messages: {
			username: {
				required:'',
				maxlength: "Please enter a your DA-IICT ID.",
				minlength: "Please enter a your DA-IICT ID.",
				range: "Please enter a your DA-IICT ID."
			},
			password: {
				required:'',
				minlength: "Password must be at least 5 characters long."
			}
		},
		
		submitHandler: function(form) {
			form.submit();
		}
	});

  });
  
</script>
<style type="text/css">
	
</style>
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
		<div class="mycartbut"><?php echo anchor('/welcome/cart' ,'Cart ('.$this->cart->total_items().')');?></div>
	

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
			<li><a>STATIONARY</a>
				<ul>
					<li><?php echo anchor('/welcome/oxford', 'Oxford',$attr); ?></li>
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
