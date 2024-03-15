<?php

include 'includes/wallet.php';
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> VegShree </title>
    
    <link rel="stylesheet" href="css/custom/style.css" />
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style type="text/css">
        /* CSS styles */
    </style>
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
            position: absolute;
            /* Add absolute positioning */
            z-index: 1000;
            /* Ensure it's above other content */
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        /* Adjust position of dropdown content for mobile view */
        @media screen and (max-width: 768px) {
            .dropdown-content {
                position: fixed;
                /* Change position to fixed for mobile */
                top: 80px;
                /* Adjust top position as needed */
                left: 0;
                /* Align with the left edge */
                width: 100%;
                /* Take full width */
                background-color: #f9f9f9;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                /* Ensure it's above other content */
            }
        }

        .navbar {
            position: relative;
            /* Make it relative so that it doesn't stick */
            transition: opacity 0.3s ease;
            /* Add transition for smooth fade */
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            /* Increase the height as needed */
            background-color: rgba(255, 255, 255, 0.9);
            transition: background-color 0.3s ease;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .btn {
            background-color: #60b246;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: center;
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
                <li><a href="http://localhost/Food/index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li id="hide-in-mobile"><a href="#food">Category</a></li>
                <li><a href="#food-menu">Menu</a></li>
                <li id="cartBtn" class="cart-button"><a href="#food-menu">Cart</a></li>
                <li id="hide-in-mobile"><a href="#testimonials">Testimonial</a></li>
                <li class="dropdown"><a href="#food-menu">Order
                        <div class="dropdown-content">
                            <?php $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
                            while ($row = mysqli_fetch_array($sql)) {
                                echo '<a href="orders.php?status=' . $row['status'] . '">' . $row['status'] . '</a>';
                            } ?>
                            <a href="orders.php">All Order</a>
                        </div>
                </li>
                <li class="dropdown"><a href="#contact">
                        <?php echo $name; ?>
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
    </a>
    </li>
    </a>
    </li>
    </ul>
    </div>
    </nav>
</body>