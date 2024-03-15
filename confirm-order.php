<?php
include 'includes/connect.php';
include 'includes/wallet.php';
$continue=0;
$total = 0;
if($_SESSION['customer_sid']==session_id())
{
        if($_POST['payment_type'] == 'Wallet'){
        $_POST['cc_number'] = str_replace('-', '', $_POST['cc_number']);
        $_POST['cc_number'] = str_replace(' ', '', $_POST['cc_number']); 
        $_POST['cvv_number'] = (int)str_replace('-', '', $_POST['cvv_number']);
        $sql1 = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = $wallet_id");
        while($row1 = mysqli_fetch_array($sql1)){
            $card = $row1['number'];
            $cvv = $row1['cvv'];
            if($card == $_POST['cc_number'] && $cvv==$_POST['cvv_number'])
            $continue=1;
            else
                header("location:index.php");
        }
        }
        else
            $continue=1;
}

$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
    $name = $row['name'];
    $contact = $row['contact'];
}

if($continue){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Provide Order Details</title>

  <!-- Favicons-->
 
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
<style>
    body{
        background-color: #f0f0f0;
    }
#reciept{
width:60%;
Padding:4rem;
background-color:White;
}
    /* Page header styles */
    #header {
      background-color: #009688; /* Teal */
      color: #fff; /* White */
      padding: 10px;
    }

    .logo-wrapper {
      margin-left: 20px; /* Adjust as needed */
    }

    .logo-text {
      font-size: 24px;
      margin-left: 10px;
    }

    /* Content section styles */
    #content {
      padding: 20px;
    }

    .caption {
      font-size: 24px;
      color: #009688; /* Teal */
    }

    .divider {
      height: 2px;
      background-color: #009688; /* Teal */
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .collection-item {
      border-bottom: 1px solid #ddd; /* Light gray */
    }

    .collection-item:last-child {
      border-bottom: none; /* Remove border from last item */
    }

    /* Form button styles */
    .btn {
      background-color: #60b246; /* Green */
      color: #fff; /* White */
      Float:right;
    }

    /* Footer styles */
    .page-footer {
      background-color: #009688; /* Teal */
      color: #fff; /* White */
      padding: 20px;
    }

    /* Responsive styles for smaller screens */
    @media only screen and (max-width: 600px) {
      .logo-text {
        font-size: 20px;
      }

      .caption {
        font-size: 20px;
      }
    }
    h5{
        text-align:center;
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
#items{
                width: 200px;
            }
             #reciept {
   /* Add some padding around the receipt section */
  }

  /* Media query for smaller screens */
  @media screen and (max-width: 768px) {
    #reciept {
          width: 100%; /* Ensure the receipt section stretches to the full width */
    box-sizing: border-box; /* Include padding and border in the total width */
    padding: 20px;
      padding: 10px; /* Reduce padding for smaller screens */
    }

    .custom-table {
      font-size: 14px; /* Reduce font size for smaller screens */
    }
  }
    </style>
</head>

<body>
<?php include 'header.php'; ?>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--start container-->
        <div class="container" id="reciept">
          <p class="caption">Receipt</p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
<div class="row">
    <div>
        <table class="custom-table">
        <tbody>
            <tr>
                <td id="items">Name : <br/> Contacst : <br/> Address : <br/> Payment Method :  </td>
                <td><?php  echo $name?> <br/> <?php  echo $contact?> <br/> <?php echo htmlspecialchars($_POST['address']) ?> <br/> <?php  echo $_POST['payment_type'] ?></td>
                <tr>
        </tbody>
    </table>
    <hr>
    </div>
<div>
<ul id="issues-collection" class="collection">
<?php
        
    foreach ($_POST as $key => $value)
    {
        if(is_numeric($key)){       
        $result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
        while($row = mysqli_fetch_array($result))
        {
            $price = $row['price'];
            $item_name = $row['name'];
            $item_id = $row['id'];
        }
            $price = $value*$price;

        $total = $total + $price;
    }

    }?>
    <table class="custom-table">
        <tbody>
            <tr>
                <td id="items">Total Price  </td>
                <td> Rs. <?php  echo $total ?></td>
                <tr>
        </tbody>
    </table>


   <?php  if(!empty($_POST['description']))
        echo '<li class="collection-item avatar"><p><strong>Note: </strong>'.htmlspecialchars($_POST['description']).'</p></li>';
    if($_POST['payment_type'] == 'Wallet')
    echo '<div id="basic-collections" class="section">
        <div class="row">
            <div class="collection">
                <a href="#" class="collection-item">
                    <div class="row"><div class="col s7">Current Balance</div><div class="col s3">'.$balance.'</div></div>
                </a>
                <a href="#" class="collection-item active">
                    <div class="row"><div class="col s7">Balance after purchase</div><div class="col s3">'.($balance-$total).'</div></div>
                </a>
            </div>
        </div>
    </div>';
?>
<form action="routers/order-router.php" method="post">
<?php
foreach ($_POST as $key => $value)
{
    if(is_numeric($key)){
        echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
    }
}
?>
<input type="hidden" name="payment_type" value="<?php echo $_POST['payment_type'];?>">
<input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']);?>">
<?php if (isset($_POST['description'])) { echo'<input type="hidden" name="description" value="'.htmlspecialchars($_POST['description']).'">';}?>
<?php if($_POST['payment_type'] == 'Wallet') echo '<input type="hidden" name="balance" value="<?php echo ($balance-$total);?>">'; ?>
<input type="hidden" name="total" value="<?php echo $total;?>">
<div class="input-field col s12">
<button class="btn cyan waves-effect waves-light right" type="submit" name="action" <?php if($_POST['payment_type'] == 'Wallet') {if ($balance-$total < 0) {echo 'disabled'; }}?>>Confirm Order
<i class="mdi-content-send right"></i>
</button>
</div>
</form>
</ul>


                </div>
                </div>
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  

    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> 
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
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