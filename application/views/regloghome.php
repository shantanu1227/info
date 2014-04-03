</div>
	
<div id="reglogopen">
	<div id="closebuttonrl"><img src="<?php echo(IMG.'closebutton.png');?>" style="max-width:30px;
    max-height:30px;"></img></div>
	<div id="reglogwrap">
		<div class="vinfologin">
			<div class="reglogleft">
				<div class="loginhead">LOGIN</div>
				<?php $attributes = array('id' => 'loginform');
				echo form_open('login/index', $attributes);
				?>
					<div class="forminput"><input type="text" name="username" placeholder="e.g. '201101098'"><br></div>
					<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
					<input type="submit" value="Login" />
				<?php echo form_close();?>
			</div>
		</div>
		<div class="reglogline">
		x
		</div>
		<div class="vinforegister">
			<div class="reglogright">
				<div class="registerhead">REGISTER</div>
				<?php $attributes = array('id' => 'registerform');
				echo form_open('register/newuser', $attributes);
				?>
					<div class="forminput"><input type="text" name="username" placeholder="e.g. '201101098'"><br></div>
					<div class="forminput"><input type="text" name="fullname" placeholder="Full Name"><br></div>
					<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
					<div class="forminput"><input type="text" name="roomno" placeholder="e.g. 'B-108'"><br></div>
					<div class="forminput"><input type="text" name="mobileno" placeholder="Mobile Number"><br></div>
					<input type="submit" value="Register" />
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(".reglog").click(function(){
			$("#reglogopen").fadeIn(1000);
			$("#box").css("opacity","0.2");
			$(document).keyup(function(e) {
				if (e.keyCode == 27 ) {
					$("#reglogopen").fadeOut(100);
					$("#box").css('opacity',1);
				}		
			}); 
		}); 
	});
	$(document).on('click','#closebuttonrl',function(){
		$("#reglogopen").fadeOut(100);
		$("#box").css('opacity',1);
    });
</script>
		