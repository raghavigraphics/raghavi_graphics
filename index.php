<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RAGHAVI GRAPHICS</title>
    <link rel="stylesheet" href="login.css">
    
</head>

<body>
    <form action="file:///C:/xampp/htdocs/kishan/main%20paig.php" method="post">
        <section>
            <div class="signin">
                <div class="content">
                    <h2>Sign In</h2>
                    <div class="form">
                        <div class="inputBox">
                            <input type="text" name="insta" required>
                            <i>mo.no</i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pass" required>
                            <i>Password</i>
                        </div>
                        <div class="links">
                            <a href="#">Forgot Password</a>
                            <a href="#">Signup</a>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login" name="login">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['login'])) {
        $id = $_POST['insta'];
        $pass = $_POST['pass'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `user` (`insta`, `pass`) VALUES (?, ?)");
        $stmt->bind_param("ss", $id, $pass);

        if ($stmt->execute()) {
            echo "New record added";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>

</html>