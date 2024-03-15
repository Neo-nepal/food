<?php 
include 'includes/connect.php'; 
include 'includes/wallet.php'; 
if($_SESSION['customer_sid']==session_id()) {
?>
<head>
 
</head>
<body>
<?php include 'header.php'; ?>
<section class="showcase-area" id="showcase">
    <div class="showcase-container">
        <h1 class="main-title" id="home">Eat Right Food</h1>
        <p>Eat Healthy, it's good for your health.</p>
        <a href="#food-menu" class="btn btn-primary">ORDER</a>
    </div>
</section>
<style type="text/css">
   .bg-food{
        background-color: #f5f5f7;
    } 
</style>

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
                    <div class="food-img col-sm-2">
                        <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt="" />
                    </div>
                    <div class="food-description col-sm-6">
                        <?php echo $row["name"]; ?>
                        Natural framing carry from frame Sarbati White;
                        <br/>
                        Price: &#8377; <?php echo $row["price"]; ?>
                    </div>

                        <!-- Quantity input with increase and decrease buttons -->
                        <div class="quantity-input col-sm-4">
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
            <button class="btn cyan waves-effect waves-light order-btn" type="submit" id="submit-btn" name="action"> Order
                <i class="mdi-content-send right"></i>
            </button>
        </div>
    </form>
</section>
</div>
<hr>
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

            <div class="form-container">
                <h2>Contact Us</h2>
                <input type="text" placeholder="Your Name" />
                <input type="email" placeholder="E-Mail" />
                <textarea cols="30" rows="6" placeholder="Type Your Message"></textarea>
                <a href="#" class="btn btn-primary">Submit</a>
            </div>
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

document.getElementById("cartBtn").addEventListener("click", function() {
  document.getElementById("formValidate").submit();
});
</script>
