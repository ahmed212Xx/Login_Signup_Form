<?php
include 'connect.php'; // Make sure 'connect.php' contains code to establish a valid database connection.

// Check if the form is submitted and the required fields are filled.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Assuming your table has columns 'id', 'name', 'email', 'password', 'timestamp'.
    $register = "INSERT INTO `register` (`name`, `password`, `email`, `timestamp`) VALUES ('$username', '$password', '$email', current_timestamp())";

    $sql = mysqli_query($con, $register);

    if ($sql) {
       header("location:login_gpt.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <div class="container">
    <form action="register.php" method="post">
      <h2>Register</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">REGISTER</button>
    </form>
    <br>
    <a href="login_gpt.php"><button type="submit">LOGIN</button></a>
  </div>
</body>
</html>
