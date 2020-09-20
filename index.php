<html>
<head>
  <link rel="stylesheet" href="style.css">
  <script src="main.js"></script>
</head>

<body>

<div class="top-bar">
<div class="dropdown">
  <button class="dropbtn">Account</button>
  <div class="dropdown-content">
    <p>Welcome to Biblio!</p>
    <div class="buttons">
		<button name="submit" class="join-btn" type="submit" value="Save" onclick="joinFunction()">Join</button>
		<button name="submit" class="login-btn" type="submit" value="Cancel" onclick="loginFunction()">Log in</button>
		<p id="saved"></p>
</div>
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
</div>
</div>

<?php 

  $errors = array(
    1=>"Invalid user name or password, Try again",
    2=>"Please login to access this area"
  );

  $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

  if ($error_id == 1) {
    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
  }elseif ($error_id == 2) {
    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
  }

?> 

<div class="form-popup" id="joinForm">
  <form action="user_register.php" class="form-container">
  <h1>Login<h1>
  
  <label for="email"><b>Email</b></label>
  <input type="text" placeholder="Enter Email" name="email" required>

  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>

  <button type="submit" class="btn">Login</button>
  
</form>
  <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

</div>

</div>
</body>
</html>