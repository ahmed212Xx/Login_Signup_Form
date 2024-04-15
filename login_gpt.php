<?php
session_start(); // Start the PHP session (if not already started)

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form input data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have a database connection in 'connect.php'
    include 'connect.php';

    // Prepare and execute the query to check if the user exists
    $query = "SELECT * FROM REGISTER WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) {
        // If the user exists, redirect to the dashboard page or any other page you desire
        $_SESSION['username'] = $username; // Store the username in the session for future use
        header("Location: dashboard.php"); // Replace 'dashboard.php' with the actual destination page
        exit();
    } else {
        // If the user doesn't exist, display an error message
        $errorMessage = "Invalid username or password. Please try again.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="login_gpt.css">
</head>

<body>
    <div class="container">
        <form action="login_gpt.php" method="post">
            <h2>Sign In</h2>
            <?php if (isset($errorMessage)) { ?>
                <p class="error"><?php echo $errorMessage; ?></p>
            <?php } ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">SIGN IN</button>
            <br><br>
            
            
        </form>
        <a href="register.php"><button type="submit">REGISTER</button></a>
    </div>
</body>

</html>
