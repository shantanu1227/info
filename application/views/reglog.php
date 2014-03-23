<div id="reglogopen">
<div class="vinfologin">

<div class="reglogleft">
<div class="loginhead">LOGIN</div>
<form  id="loginform" action=""  method="post">

<div class="forminput"><input type="text" name="emailid" placeholder="Email ID"><br></div>
<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
<input type="submit" value="Login" />
</form>
</div>
</div>
<div class="reglogline">
x
</div>
<div class="vinforegister">
<div class="reglogright">
<div class="registerhead">REGISTER</div>
<form  id="registerform" action=""  method="post">

<div class="forminput"><input type="text" name="emailid" placeholder="Email ID"><br></div>
<div class="forminput"><input type="password" name="password" placeholder="Password"><br></div>
<input type="submit" value="Register" />
</form>
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
	  $("#reglogopen").fadeOut(10);
					$("#box").css('opacity',1);
   }			}); 
				}); 
				});
	    </script>
		