<?php
    include "database-config.php";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="main.js"></script>
</head>

<body onload="slideshow_js()">

<div class="top-bar">
  <button name="submit" class="admin-btn" id="adminPanelBtn" type="submit">Admin Panel</button>
  <div class="dropdown">
    <button class="dropbtn">Account</button>
    <div class="dropdown-content">
      <p>Welcome to Biblio!</p>
      <div class="buttons">
		    <button name="submit" class="join-btn" type="submit" value="join" onclick="joinFunction()">Join</button>
		    <button name="submit" class="login-btn" type="submit" value="signin" onclick="loginFunction()">Log in</button>
      </div>
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
</div>

<?php
    if (isset($_POST['btn-register'])) {
        $email    = trim($_POST['email']);
        $password = trim($_POST['psw']);

        $isValid = true;

        $stmt = $con->prepare("SELECT * FROM users where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if($result->num_rows > 0){
          $isValid = false;
          $error_message = "This Email already exists";
        }
        
      if($isValid){
      
        $stmt = $con->prepare("INSERT INTO users(email,password,role) VALUES(?,?,'admin')");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $stmt->close();

        $success_message = "Joined Successfully!";
        echo $success_message;
      }
    }else if(isset($_POST['btn-signin'])){
      $isValid = 'true';
      $message="";
      if(count($_POST)>0) {
	      $result = mysqli_query($con,"SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["psw"]."'");
        $count  = mysqli_num_rows($result);
	      if($count==0) {
		      $message = "Invalid Username or Password!";
	      } else {
          $message = "You are successfully authenticated!";
          while($row = mysqli_fetch_array($result)){
            if($row["role"] == 'admin'){
              echo '<script type="text/javascript">',
              'adminButtonFunction();',
              '</script>';
            }
          }
	      }
      }
    }
?>

<div class="form-popup" id="joinForm">
  
  <form method='post' id="join" class="form-container">
  <h1 class="title">Biblio<h1>

  <div class="tabs">
    <button class="tab-link active" onclick="openAction(event, 'join')">REGISTER</button>
    <button class="tab-link" onclick="openAction(event, 'login')">SIGN IN</button>
  </div>
  
  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" required>

  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>

  <div id="register" class="tabcontent">
  <button type="submit" name="btn-register" class="btn">CREATE ACCOUNT</button>
  </div>

  <div id="signin" class="tabcontent">
  <button type="submit" name="btn-signin" class="btn">SIGN IN</button>
  </div>
  
  </form>
  <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

</div>

<div class="header">
  <div class="logo-container">
  </div>
  <input type="text" placeholder="Your next read is here.."><i class="fa fa-search fa-lg" style="margin-left: 6px; color: #335d2d; cursor: pointer;"></i>

  <div class="cart">
  <img class="cart-logo" src="images/cart.png">
  </div>
</div>

<div class="slideshow-container">
  <div class="slides fade">
    <img src="images/show1.jpg">
  </div>

  <div class="slides fade">
    <img src="images/show2.jpg">
  </div>

  <div class="slides fade">
    <img src="images/show3.jpg">
  </div>
</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<div class="sidebar">
  <b>Genres</b>
  <div class="sidebar-contents">
    <ul>
      <li>Fiction</li>
      <li>Non-fiction</li>
      <li>Romance</li>
      <li>Comedy</li>
      <li>Poetry</li>
      <li>Feminism</li>
      <li>Kids</li>
      <li>Philosophy</li>
      <li>Travel</li>
      <li>Photography</li>
      <li>Art</li>
    </ul>
  </div>
</div>

<div class="book-of-the-month">
  <h4>BOOK OF THE MONTH</h4>
  <img src="images/books/9781501145254.jpg">
  <div class="details">
    <p>My Own Words<br>by<br>Ruth Bader Ginsburg</p>
  </div>
</div>

<div class="offer-container">
  <h2>Get your LKR Rs.2000 coupon here.</h2>
  <div class="gift-logo"><img src="images/gift.png"></div>
</div>

<div class="book-display">
  <h2>New arrivals at Biblio</h2>
  <div class="book-grid">
    <ul class="image-list-small">
      <li>
        <a href="#" style="background-image: url('images/books/8045417_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/517BC0Vee-L._SY346_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/17859876_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/41_a4QkbtGL._SX329_BO1_204_203_200_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/40740914._SY475_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/51ulPHHJVSL._SY346_360x.jpg');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/811ml6rmcXL_360x.webp');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/51H9PwqKhWL._SX321_BO1_204_203_200_360x.webp');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/3090348_360x.webp');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>

      <li>
        <a href="#" style="background-image: url('images/books/513wwIJOo8L._SX323_BO1_204_203_200_360x.webp');"></a>
        <div class="details">
          <h3>details</h3>
          <p class="image-author">Matt Stone</p>
        </div>
      </li>
    </ul>
  </div>
</div>

</body>
</html>