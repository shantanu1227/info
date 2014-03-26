<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Medicine</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel='stylesheet' type="text/css" href="<?php echo(CSS . 'medicinestyle.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo(CSS . 'js-image-slider.css'); ?>">
        <script type='text/javascript' src="<?php echo(JS . 'js-image-slider.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo(JS . 'jquery-1.7.1.min.js'); ?>"></script>
        <script>
            function addRow() {
                var table = document.getElementById('medicinelist');
                var lastrow = table.rows.length;
                var count = lastrow;
                var row = table.insertRow(lastrow);
                var cell1 = row.insertCell(0);
                var el1 = document.createElement('input');
                el1.type = 'text';
                el1.id = 'm' + count;
                el1.name = 'm' + count;
                cell1.appendChild(el1);
                var cell2 = row.insertCell(1);
                var el2 = document.createElement('input');
                el2.type = 'text';
                el2.id = 'p' + count;
                el2.name = 'p' + count;
                cell2.appendChild(el2);
                var cell3 = row.insertCell(2);
                var el3 = document.createElement('input');
                el3.type = 'text';
                el3.id = 'q' + count;
                el3.name = 'q' + count;
                cell3.appendChild(el3);
            }
        </script>
    </head>
    <body>
	<div id="box">
        <?php include 'header1.php'; ?>
            <div class="shopheading">
                MEDICINE
            </div>
			<div class="shopdetail">
			<div class="shoppic">
				<img src="<?php echo(IMG.'medicine/medicine_logo.jpg');?>"></img>
			</div>
			<div class="details">
				<div class="timing">9AM-9PM</div>
				<div class="dayswrap">
				<div class="days">
					<ul>
						<li>Mo</li>
						<li>Tu</li>
						<li>We</li>
						<li>Th</li>
						<li>Fr</li>	
						<li>Sa</li>
						<li>Su</li>
					</ul>
				</div></div>
				<div class="status">

					<img src="<?php echo(IMG.'open_button.png');?>"></img>
				</div>
				<div class="contact">
					<div class="owner">Owner</div>
					<div class="ownername">Mr.Sahil</div>
					<div class="ownernum">8460089916</div>
				</div>
			</div>
		</div>
		<div class="offerhead">Stay healthy!</div>
          
            <div class="offers">
                <div class="imgslide">
                    <div id="slider">
                        <img src="<?php echo(IMG . 'medicine/img1.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'medicine/img2.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'medicine/img3.jpg'); ?>"></img>
                    </div>
                </div>
            </div>
                <div class="menuhead"><i>Order here..</i></div>
            <div class="shopproducts">
                <table id="medicinelist" border="1">
                    <tr>
                        <td>MEDICINE</td>
                        <td>POWER</td>
                        <td>QUANTITY</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="m1" name="m1"></td>
                        <td><input type="text" id="p1" name="p1"></td>
                        <td><input type="text" id="q1" name="q1"></td>
                    </tr>
                </table>
            </div>
            <div class="button">
                <input type="button" id="addoption" value="Add Another" onclick="addRow()">
                <input type="submit" id="orderoption" value="Order">
            </div>
        </div>
        
		<div id="feedback">Feedback</div>
    </body>
</html>

