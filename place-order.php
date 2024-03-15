<?php
include 'includes/connect.php';
include 'includes/wallet.php';
$total = 0;
	if($_SESSION['customer_sid']==session_id())
	{
$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
$name = $row['name']; 
$address = $row['address'];
$contact = $row['contact'];
$verified = $row['verified'];
}?>

	<style type="text/css">
    /* Style the dropdown button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Style links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

/* Hide testimonial and category sections on screens with a maximum width of 768px (typical mobile devices) */
@media screen and (max-width: 768px) {
    /* Hide testimonial section */
    #hide-in-mobile {
        display: none;
    }

    /* Hide category section */
    #food {
        display: none;
    }
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
    position: absolute; /* Add absolute positioning */
    z-index: 1000; /* Ensure it's above other content */
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

/* Adjust position of dropdown content for mobile view */
@media screen and (max-width: 768px) {
    .dropdown-content {
        position: fixed; /* Change position to fixed for mobile */
        top: 80px; /* Adjust top position as needed */
        left: 0; /* Align with the left edge */
        width: 100%; /* Take full width */
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1000; /* Ensure it's above other content */
    }
}
.navbar {
   position: relative; /* Make it relative so that it doesn't stick */
    transition: opacity 0.3s ease; /* Add transition for smooth fade */
    z-index: 1000; 
    top: 0;
    left: 0;
    width: 100%;
    height: 70px; /* Increase the height as needed */
    background-color: rgba(255, 255, 255, 0.9);
    transition: background-color 0.3s ease;
    z-index: 1000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
/* Container styles */
.container {
  max-width: 960px; /* Adjust as needed */
  margin: 0 auto; /* Center the container */
}

/* Column styles */
.column {
  width: calc(50% - 20px); /* Calculate the width of each column */
  float: left; /* Float the columns to make them side by side */
  margin: 10px; /* Add margin between columns */
  padding: 20px; /* Add padding inside columns */
  box-sizing: border-box; /* Include padding and border in the total width */
  background-color: #f0f0f0; /* Background color for columns */
}

/* Clearfix to clear floats */
.row::after {
  content: "";
  display: table;
  clear: both;
}
/* CSS for table styling */
.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th,
.custom-table td {
  
    padding: 8px;
    text-align: left;
}

.custom-table th {
	 border: none;
    background-color: #f2f2f2;
}
.custom-table{
	margin-top: 20px;
}
body
{
	background-color: #f0f0f0;

}
#place-orde
{
	background-color: white;
}
.column {
    background-color: white;
    margin-bottom: 20px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
  }

  /* Media query for small screens (up to 768px) */
  @media screen and (max-width: 768px) {
    .column {
      margin-bottom: 10px;
      padding: 10px;
    }
  }
    /* CSS for the column */

  /* Media query for smaller screens */
  @media screen and (max-width: 768px) {
    .column {
    	width: 100%;
      padding: 10px; /* Reduce padding for smaller screens */
      margin-bottom: 10px; /* Reduce margin for smaller screens */
    }
  }
</style>
</head>
<body>
	<?php include 'header.php'; ?>

<div class="container" id=place-order>
  <div class="row">
    <div class="column" style="background-color: white"	>
      <!-- Content for the first column -->
      <div class="container">
					<p class="caption">Estimated Receipt</p>
					<div class="divider"></div>
					<!--editableTable-->
					<div id="work-collections" class="seaction">
					<div class="row">
					<div>
					<ul id="issues-collection" class="collection">
<?php
	$sr_n = 0; 
		?>
	
		 <p> Name : <?php echo $name; ?>  </p>
		<p>Contact Number : <?php echo $contact;?> </p>
		<?php 
	foreach ($_POST as $key => $value)
	{
		
		if($value==0){
						continue;
						echo "Null";
						}
					
			 if(is_numeric($key)){
				$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
				while($row = mysqli_fetch_array($result))
				{
						$price = $row['price'];
						$item_name = $row['name'];
						$item_id = $row['id'];
						$sr_n = $sr_n + 1;
				}
						$price1 = $value*$price; ?>
					
		<table class="custom-table">
        <tbody>
            <tr>
                <td id="items"> #<?php  echo $sr_n?></td>
                <td id="items"> <?php  echo $item_name?></td>
                <td id="items"> <?php  echo $value  ?> x <?php  echo $price ?></td>
                <td id="items"> Rs. <?php  echo $price1 ?></td>
            </tr>
        </tbody>
    </table>
			<?php	
		 $total = $total + $price1; 
		}
		}?>
		<style type="text/css">
			#items{
				width: 150px;
			}
		</style>
		<hr>
		<table class="custom-table">
        <tbody>
            <tr>
            	
                <td id="items">Total : </td>
                <td id="items"> &nbsp; &nbsp; &nbsp;&nbsp; </td>
                <td id="items"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</td>
                <td id="items"> Rs. <?php  echo $total ?></td>
            </tr>
        </tbody>
    </table>
		<?php		if(!empty($_POST['description']))
				echo '<li class="collection-item avatar"><p><strong>Note: </strong>'.htmlspecialchars($_POST['description']).'</p></li>';
?>
</ul>

								</div>
				</div>
								</div>
							</div>
    </div>
    <div class="column" style="background-color: white">
      <!-- Content for the second column -->
 				<div class="container">
					<p class="caption">Provide required delivery and payment details.</p>
					<div class="divider"></div>
						<div class="row">
							<div class="col s12 m4 l3">
								</div>
						    <div>
								<div class="card-panel">
									<div class="row">
										<form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirm-order.php" novalidate="novalidate">
											<div class="row">
												<div class="input-field col s12">
														<label for="payment_type">Payment Type</label><br><br>
														<select id="payment_type" name="payment_type">
																		<option value="Wallet" selected>Wallet</option>
																		<option value="Cash On Delivery" <?php if(!$verified) echo 'enabled';?>>Cash on Delivery</option>                           
														</select>
												</div>
											</div>                    
											<div class="row">
												<div class="input-field col s12">
													<i class="mdi-action-home prefix"></i>
													<input type="text" name="total_price" value =" <?php echo $total?>">
														<textarea name="address" id="address" class="materialize-textarea validate" data-error=".errorTxt1"><?php echo $address;?></textarea>
														<label for="address" class="">Address</label>
														<div class="errorTxt1"></div>
												</div>
											</div>
											<div class="row">
												<div class="input-field col s12">
													<i class="mdi-action-credit-card prefix"></i>
														<input name="cc_number" id="cc_number" type="text" data-error=".errorTxt2" required>
														<label for="cc_number" class="">Card Number</label>
														<div class="errorTxt2"></div>
												</div>
											</div>
											<div class="row">
												<div class="input-field col s12">
													<i class="mdi-communication-vpn-key prefix"></i>  
														<input name="cvv_number" id="cvv_number" type="text" data-error=".errorTxt3" required>
														<label for="cvv_number" class="">CVV Number</label>                             
														<div class="errorTxt3"></div>
												</div>
											</div>                      
											<div class="row">
												<div class="row">
													<div class="input-field col s12">
														<button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
															<i class="mdi-content-send right"></i>
														</button>
													</div>
												</div>
											</div>
											<?php
												foreach ($_POST as $key => $value)
												{
														if($key == 'action' || $value == ''){
																break;
														}
														echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
												}
											?>
										</form>
									</div>
								</div>
							</div>
						
					</div>
				<!--end container-->

			</div>
	<!-- END MAIN -->
    </div>
  </div>
</div>

</body>
</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");    
		}
		else{
			header("location:login.php");
		}
	}
?>
<style type="text/css">
	

    

    .caption {
      font-size: 24px;
      margin-bottom: 20px;
      list-style: none;
    }

    .divider {
      border-bottom: 1px solid #ccc;
      margin-bottom: 20px;
    }

    .collection-item {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    .collection-item:last-child {
      border-bottom: none;
    }

    .collection-title {
      font-weight: bold;
    }

    .form-panel {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 5px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .btn {
      background-color: #60b246;
      color: white;
      padding: 15px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
	  float:right;
    }

    .btn:hover {
      background-color: #45a049;
    }
</style>