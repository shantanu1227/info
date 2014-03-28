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

<div id="wrapper">
	<div id="errorDisplay" style="float:left;position:fixed;width:100%;height:auto;background-color:#B10C0C;color:#FFFFFF;
								  font-size:30px;text-align:center;z-index:1000;margin-left:-7.5%;">
		<div id="closebutton" style="height:auto;width:auto;margin-right:10px;float:right;"></div>
	</div>
	<div id="fixed_head">
		<div class="cname">Vinfocity</div>
		<div class="loginaccount">
			<div class="myaccount">My Account</div>
			<?php if($this->session->userdata('userName') == ""){?>
			<div class="reglog">Login/Register</div>
			<div class="mycartbut"><?php echo anchor('welcome/cart', 'Cart ('.$this->cart->total_items().')'); ?></div>
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
