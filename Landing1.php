<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-left: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

.hero {
  background-image: url('background.jpg');
  background-size: cover;
  height: 500px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.hero-content {
  color: #fff;
}

.about {
  background-color: #f4f4f4;
  padding: 50px 0;
  text-align: center;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
}

        </style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food Ordering</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
  <h1>Delicious Food</h1>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Menu</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

</header>

<section class="hero">
  <div class="hero-content">
    <h2>Order Your Favorite Food</h2>
    <p>Explore our delicious menu and enjoy doorstep delivery!</p>
    <a href="#" class="btn">Order Now</a>
  </div>
</section>

<section class="about">
  <div class="about-content">
    <h2>About Us</h2>
    <p>We are passionate about serving you the best quality food made from fresh ingredients sourced locally. Our mission is to make every meal a delightful experience for you.</p>
  </div>
</section>

<footer>
  <p>&copy; 2024 Delicious Food. All rights reserved.</p>
</footer>

</body>
</html>
