<div id = "feedbackopen">
	<div id="closebutton"><img src="<?php echo(IMG.'closebutton.png');?>" style="max-width:30px;
    max-height:30px;"></img></div>
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
			$("#box").css("visibility","hidden");
			$(document).keyup(function(e) {
				if (e.keyCode == 27 ) {
					$("#feedbackopen").fadeOut(10);
					$("#box").css("visibility","visible");
				}		
			}); 
		});
	$("#feedbackform").validate({
		errorElement: "div",
		// Specify the validation rules
		rules: {
			comment: "required"
		},
		
		// Specify the validation error messages
		messages: {
			comment: "Haha! Was that even a feedback? :/"
		},
			submitHandler: function(form) {
			form.submit();
		}
	});	
	$(document).on('click','#closebutton',function(){
		$("#feedbackopen").fadeOut(500);
		$("#box").css('opacity',1);
		$("#box").css("visibility","visible");
    });
});
</script>
		
