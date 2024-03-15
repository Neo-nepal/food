<?php 
include 'includes/connect.php'; 
include 'includes/wallet.php'; 
if($_SESSION['customer_sid']==session_id()) {
?>

<html lang="en">

<head>
     <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Veg | Shree </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/custom/style.css"/>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style type="text/css"> /* CSS styles */ </style>
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
</style>

<body>
        <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li id="hide-in-mobile"><a href="#food">Category</a></li>
                <li><a href="#food-menu">Menu</a></li>
                <li id="cartBtn" class="cart-button"><a href="#food-menu">Cart</a></li>
                <li id="hide-in-mobile"><a href="#testimonials">Testimonial</a></li>
                <li class="dropdown"><a href="#food-menu">Order
                    <div class="dropdown-content">
                    <?php $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
                    while($row = mysqli_fetch_array($sql)){
                    echo '<a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>';
                    }?>
                    <a href="orders.php">All Order</a>
                    </div>
                </li>
                <li class="dropdown"><a href="#contact"><?php echo $name;?>
                      <div class="dropdown-content">
                        <a href="routers/logout.php">Logout</a>
                        <a href="tickets.php">Ticket</a>
                        <a href="details.php">Edit Details</a>
                      </div>
                </li>
            </ul>
            <h1 class="logo">VegShree</h1>
        </div>
    </nav>


<section class="showcase-area" id="showcase">
    <div class="showcase-container">
        <h1 class="main-title" id="home">Eat Right Food</h1>
        <p>Eat Healthy, it's good for your health.</p>
        <a href="#food-menu" class="btn btn-primary">ORDER</a>
    </div>
</section>

<section id="about">
    <div class="about-wrapper container">
        <div class="about-text">
            <p class="small">About Us</p>
            <h2>We've been making healthy food last for 10 years</h2>
            <p> Focusing on nutrient-rich options like fruits, vegetables, whole grains, lean proteins, and healthy fats can provide essential vitamins, minerals, and antioxidants. These foods support vital bodily functions, promote weight management, and reduce the risk of chronic diseases like heart disease and diabetes. A balanced diet also boosts immunity, improves digestive health, and enhances mental well-being. 
            </p>
        </div>
        <div class="about-img">
            <img src="https://i.postimg.cc/mgpwzmx9/about-photo.jpg" alt="food" />
        </div>
    </div>
</section>

<section id="food">
    <h2>Types of food</h2>
    <div class="food-container container">
        <div class="food-type fruite">
            <div class="img-container">
                <img src="https://i.postimg.cc/yxThVPXk/food1.jpg" alt="error" />
                <div class="img-content">
                    <h3>Fruit</h3>
                    <a href="https://en.wikipedia.org/wiki/Fruit" class="btn btn-primary" target="_blank">Learn
                        more</a>
                </div>
            </div>
        </div>
        <div class="food-type vegetable">
            <div class="img-container">
                <img src="https://i.postimg.cc/Nffm6Rkk/food2.jpg" alt="error" />
                <div class="img-content">
                    <h3>Vegetable</h3>
                    <a href="https://en.wikipedia.org/wiki/Vegetable" class="btn btn-primary" target="_blank">Learn
                        more</a>
                </div>
            </div>
        </div>
        <div class="food-type grain">
            <div class="img-container">
                <img src="https://i.postimg.cc/76ZwsPsd/food3.jpg" alt="error" />
                <div class="img-content">
                    <h3>Grain</h3>
                    <a href="https://en.wikipedia.org/wiki/Grain" class="btn btn-primary" target="_blank">Learn
                        more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .bg-food{
        background-color: #f5f5f7;
    }
</style>
<div class="bg-food">
<section id="food-menu">

    <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
        <span id="food-list">Your Delicious Food</span>
        <div class="food-menu-container container">
            <?php
            $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
            while($row = mysqli_fetch_array($result)) {?>
                <div class="food-menu-item row">
                    <div class="food-img col-sm-3">
                        <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt="" />
                    </div>
                    <div class="food-description col-sm-6">
                        <?php echo $row["name"]; ?>
                        Natural framing carry from frame Sarbati White;
                        <br/>
                        Price: &#8377; <?php echo $row["price"]; ?>
                    </div>

                        <!-- Quantity input with increase and decrease buttons -->
                        <div class="quantity-input col-sm-3">
                            <span class="quantity-btn decrease-btn">-</span>
                           <input id="<?php echo $row['id']; ?>" name="<?php echo $row['id']; ?>" class="quantity" type="text" value="0" readonly>
                            <span class="quantity-btn increase-btn">+</span>
     
            <button class="btn cyan waves-effect waves-light order-btn" type="submit" name="action"> Order
                <i class="mdi-content-send right"></i>
            </button>

                        </div>
                </div>
            <?php } ?>
        </div>
        <div class="form-container">
            <input class="custom-input" id="description" type="description" placeholder="Type your special Note ">
            <button class="btn cyan waves-effect waves-light order-btn" type="submit" name="action"> Order
                <i class="mdi-content-send right"></i>
            </button>
        </div>
    </form>
</section>
</div>
    <section id="testimonials">
        <h2 class="testimonial-title">What Our Customers Say</h2>
        <div class="testimonial-container container">
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/5Nrw360Y/male-photo1.jpg" alt="" />
                        <p class="customer-name">Ross Lee</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                   Sarbati Wheat.
                </p>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/sxd2xCD2/female-photo1.jpg" alt="" />
                        <p class="customer-name">Amelia Watson</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">
                    <div class="customer-photo">
                        <img src="https://i.postimg.cc/fy90qvkV/male-photo3.jpg" alt="" />
                        <p class="customer-name">Ben Roy</p>
                    </div>
                </div>
                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="testimonial-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
                    voluptas cupiditate aspernatur odit doloribus non.
                </p>

            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact-container container">
            <div class="contact-img">
                <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt="" />
            </div>

            
    </section>
    <footer id="footer">
        <h2>Restraunt &copy; all rights reserved</h2>
    </footer>
    <!-- .................../ JS Code for smooth scrolling /...................... -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>

</html>

</body>

</html>
<script type="text/javascript">
    documen
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

// Disable text selection on the entire page
document.addEventListener('selectstart', function(e) {
    e.preventDefault();
});
</script>
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

<style>
    body {
    user-select: none; 
    user-se
/* Prevents text selection */
}

.quantity-input {
    display: flex;
    align-items: center;
    justify-content: center; /* Center horizontally */
}

.quantity-btn {
    cursor: pointer;
    padding: 5px 10px;
    background-color: #ccc;
    border: none;
    outline: none;
}

.quantity {
    width: 50px; /* Set width as needed */
    text-align: center;
}

/* Media query for mobile devices */
@media only screen and (max-width: 768px) {
    .quantity-input {
        width: 100%; /* Make the container occupy 100% width */
        padding: 0 10px; /* Add padding for better spacing */
    }

    .quantity-btn {
        margin: 0; /* Remove margins */
    }
}

#food-list {
    font-weight: bold;
    padding-top: 40px;
    font-size: 34px; /* Increase font size */
    color: black; /* Change text color */
    text-align: center; /* Center text horizontally */
    line-height: 50px; /* Set line height to vertically center text */
    display: block; /* Ensure span is displayed as a block element */
}




    input.quantity
    {
        border: none;
    }
    .quantity input {
    border: none;
}

.quantity:focus {
    outline: none;
}



.quantity-btn {
    cursor: pointer;
}
.food-description {
    width: 100%; /* Adjust width as needed */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.food-img img {
    width: 20%; /* Ensure the image fills its container */
}
<.food-menu-item {
    margin-bottom: 20px; /* Add margin between food menu items */
}

.food-img img {
    width: 100%; /* Make the image responsive within its container */
}

.food-description {
    padding: 0 15px; /* Add padding to the description for spacing */
}

.food-price {
    margin-top: 10px; /* Add space between description and price */
}
.food-img {
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.food-img img {
border-radius: 8px;
transition: transform 0.3s ease;
}

.food-img:hover img {
    transform: scale(1.05);
}



/* Style for quantity buttons */
.quantity-btn {
    display: inline-block;
    width: 30px;
    height: 30px;
    background-color: #ccc;
    color: #000;
    text-align: center;
    line-height: 30px;
    cursor: pointer;
    border-radius: 3px;
    margin-right: 5px;
}

.quantity {
    width: 50px; /* Adjust width of the quantity input */
    text-align: center;
}

.quantity-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 5px;
}

.quantity {
    width: 50px;
    height: 30px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}




    .food-title {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .food-price {
        font-size: 16px;
        color: #666;
        margin-top: 10px;
    }

    /* Style for the quantity input */
 
    .quantity-btn {
        background-color: #4CAF50;
        color: white;
        padding: 8px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        margin: 0 5px;
        font-size: 16px;
    }
    .quantity-input {
    display: flex;
    align-items: center;
    /* Disable text selection */
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
}



    /* Style for the form container */
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .custom-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .order-btn {
        width: 100%;
        padding: 10px;
        background-color: cyan;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .order-btn:hover {
        background-color: #4CAF50;
    }

    .form-container button i {
        margin-left: 5px;
    }


    /* Style for the form container */
    .form-container {
        max-width: 50%; /* Set a maximum width to prevent it from stretching too wide */
        margin: 0 auto; /* Center the container horizontally */
        padding: 20px; /* Add some padding for spacing */
        border: 1px solid #ccc; /* Add a border for visual separation */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
    }

    /* Style for the input box */
    .form-container input.custom-input {
        width: 100%; /* Make input fill the container horizontally */
        margin-bottom: 15px; /* Add some spacing between input and button */
        padding: 10px; /* Add padding for spacing inside the input */
        border: 1px solid #ccc; /* Add a border for visual consistency */
        border-radius: 5px; /* Add rounded corners */
        box-sizing: border-box; /* Ensure padding is included in the width */
    }

    /* Style for the button */
    .form-container button.order-btn {
        width: 100%; /* Make button fill the container horizontally */
        padding: 10px; /* Add padding for spacing inside the button */
        background-color: lightg; /* Set button background color */
        color: white; /* Set text color */
        border: none; /* Remove default button border */
        border-radius: 5px; /* Add rounded corners */
        cursor: pointer; /* Show pointer cursor on hover */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    /* Style for button icon */
    .form-container button i {
        margin-left: 5px; /* Add margin to separate the icon from the button text */
    }

    /* Hover effect for button */
    .form-container button.order-btn:hover {
        background-color: #4CAF50; /* Change background color on hover */
    }
  #counter {
    margin: 0 15px;
    font-size: 24px;
    font-weight: bold;
  }
  /* Food Menu Section */
.food-menu-section {
    padding: 50px 0;
}

/* Food Menu Heading */
.food-menu-heading {
    font-size: 36px;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Food Menu Container */
.food-menu-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

/* Food Menu Item */
.food-menu-item {
    width: calc(33.33% - 40px);
    margin-bottom: 5px;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.food-menu-item:hover {
    transform: translateY(-1px);
}

/* Food Image */

/* Food Details */
.food-details {
    padding: 20px;
}

/* Food Title */
.food-title {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
}

/* Food Description */


/* Food Price */


/* Quantity Input */



/* Order Section */
.order-section {
    margin-top: 50px;
}

/* Special Instructions Input */
.input-field {
    margin-bottom: 20px;
}

.input-label {
    color: #333;
}

/* Order Button */
.order-btn {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.order-btn:hover {
    background-color: #388e3c;
}
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.9); /* Initially transparent */
    transition: background-color 0.3s ease;
    z-index: 1000; /* Ensure it's above other content */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow for better visibility */
}

.navbar.hidden {
    background-color: rgba(255, 255, 255, 0); /* Transparent when hidden */

}


</style>
</head>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var decreaseButtons = document.querySelectorAll('.decrease-btn');
    var increaseButtons = document.querySelectorAll('.increase-btn');

    // Add event listener to decrease buttons
    decreaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var quantityInput = this.nextElementSibling;
            var quantity = parseInt(quantityInput.value);
            if (quantity >= 1) {
                quantityInput.value = quantity - 1;
            }
        });
    });

    // Add event listener to increase buttons
    increaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var quantityInput = this.previousElementSibling;
            var quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });
    });
});
</script>
<style>

</style>


<!-- Hidden form for POST submission -->
<form id="cartForm" method="post" action="submit_page.php">
  <!-- Include your form fields here -->
  <!-- Example: <input type="hidden" name="key" value="value"> -->
</form>

<script>
document.getElementById("cartBtn").addEventListener("click", function() {
  document.getElementById("formValidate").submit();
});
</script>
