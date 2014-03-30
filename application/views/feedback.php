<div id = "feedbackopen">
<div class="feedcontainer">
	<?php $attributes = array('id' => 'feedbackform');
		echo form_open('welcome/feedback', $attributes);
	?>
	<div id = "fhead">We need your Feedbacks!</div>
	<div id = "feedbacktext" >Feedback<br>
		<textarea rows="6" cols="50" name="comment"></textarea>
	</div>			
	<div id = "submit"><br>			
		<input type = "submit" value="Submit">
	</div>
	<?php echo form_close();?>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#feedback").click(function(){
			$("#feedbackopen").fadeIn(1000);
			$("#box").css("opacity","0.2");
			$(document).keyup(function(e) {
				if (e.keyCode == 27 ) {
					$("#feedbackopen").fadeOut(10);
					$("#box").css('opacity',1);
				}		
			}); 
		}); 
	});
</script>
		
