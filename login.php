<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">  
</head>

<body>
    <div class="container">
 <h1>Welcome to our website</h1>
 <div class="form-section">
            <h2>Login</h2>
            <form action="#" method="post">
                <label for="login_email">Email:</label>
                <input type="text" id="login_username" name="login_username"><br>

                <label for="login_password">Password:</label>
                <input type="password" id="login_password" name="login_password"><br>

                <input type="submit" value="Login">
            </form>
        </div>
    </div>



<?php


<?php

$db = new mysqli('localhost', 'root', 'root', 'register_page'); 

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = mysqli_real_escape_string($db, $_POST["login_username"]);
    $login_password = mysqli_real_escape_string($db, $_POST["login_password"]);

    $output = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($output);
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];
        
        // Use password_verify() to check the entered password
        if (password_verify($login_password, $stored_password)) {
            echo "Login successful";
        } else {
            echo "Invalid username or password";
        }
    } else { 
        echo "Invalid username or password";
    }
    
    $stmt->close();
}

$db->close();
 
?>




//previous version

/*$db = new mysqli('localhost', 'root', 'root', 'register_page'); 

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error); 
}

$email = mysqli_real_escape_string($db, $_POST["login_email"]);
$entered_password = $_POST["login_password"];

$output = "SELECT password FROM users WHERE email = ?";
$stmt = $db->prepare($output);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($hashed_password);
$stmt->fetch();

if ($hashed_password && password_verify($entered_password, $hashed_password)) {
    echo "Login successful!";
} else {
    echo "Login failed!";
}

$stmt->close();*/






//$output = "SELECT * FROM users WHERE email = ?";
//$result = $db->query($output); 

//if ($result->num_rows > 0) { 
   // while ($row = $result->fetch_assoc()) {
       // echo $row["email"] . "<br>" . $row["password"]; 
    //}
//} else { 
  //  echo "0 results"; 
//}

$db->close();
 
?>

</body>
</html>
