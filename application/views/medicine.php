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
        <div class="wrapper">
            <div class="loginaccount">
                <div class="reglog">Login/Register</div>
                <div class="myaccount">My Account</div>
            </div>
            <div class="header">
                <div id="mono">Vinfocity</div>
                <div class="searchdiv">search here</div>
            </div>

            <div class="navigation">
                <div class="navbar">
                    <ul>
                        <li><a>HOME</a></li>
                        <li>FOOD
                            <ul>
                                <li><a>Subway</a></li>
                                <li><a>Shivas</a></li>
                                <li><a>Cool Point</a></li>
                            </ul>
                        </li>
                        <li><a>PROVISION</a></li>
                        <li><a>MEDICAL</a></li>
                        <li><a>STATIONARY</a></li>
                        <li><a>LAUNDRY</a></li>
                        <li><a>PERIPHERALS</a></li>
                        <li><a>PRINT/COPY</a></li>
                        <li><a>ABOUT US</a></li>
                        <li><a>FAQS</a></li>
                    </ul>
                </div>

            </div>
            <div class="medicineshopheading">
                MEDICINE
            </div>
            <div class="offers">
                <div class="imgslide">
                    <div id="slider">
                        <img src="<?php echo(IMG . 'medicine/img1.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'medicine/img2.jpg'); ?>"></img>
                        <img src="<?php echo(IMG . 'medicine/img3.jpg'); ?>"></img>
                    </div>
                </div>
            </div>
            <div class="medicineshopproducts">
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
    </body>
</html>

