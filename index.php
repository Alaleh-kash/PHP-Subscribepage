<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Final project Alaleh Kashani</title>
   <link rel="stylesheet"  href="style.css">   
      
</head>
<body>
  <div class="container">
    <h2>Create Account</h2>
      <div class="form-section">
        <form action="#" method="post">
          <label for="user_name">User name</label>
          <input type="text" id="user_name" name="user_name"><br>
          <label for="email">Email</label>
          <input type="text" id="email" name="email" ><br>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" ><br>
          <input type="submit" value="Submit" onclick="onClickEvent()">
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
      </div>
    </div>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new mysqli('localhost', 'root', 'root', 'register_page');

  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  $user_name = mysqli_real_escape_string($db, $_POST["user_name"]);
  $email = mysqli_real_escape_string($db, $_POST["email"]);
  //$password = mysqli_real_escape_string($db, $_POST["password"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


  $sql = "INSERT INTO users (user_name, password, email) VALUES ('$user_name', '$password', '$email')";

  if ($db->query($sql) === true) {
    echo "<i>Welcome! New record created successfully</i>";
  } else {
    echo "Error: " . $sql . "<br/>" . $db->error;
  }

  $db->close();
}
?>
   <script>
        function onClickEvent() {
            alert("Welcome! Now you can go to the login page.");
        }
    </script>

</body>
</html>



