<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiLєє - landscape</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <img src="imgs\Bg1-removebg-preview.png" class="bg1">
    <img src="imgs\Bg_2-removebg-preview.png" class="bg2">
    <img src="imgs\sparkle_1-removebg-preview.png" class="sp1">
    <img src="imgs\sparkle_2-removebg-preview.png" class="sp2">

    <div class="container" id="login-page">
        <h2>Hello Welcome To Our Website <br>
        <?php
       if (isset($_SESSION['semail'])) {
           $email = $_SESSION['semail'];
           $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
           if ($row = mysqli_fetch_assoc($query)) {
               echo htmlspecialchars($row['name']);
           }
        }
           ?>
        </h2>
        <a href="logout.php" style="color: red; font-weight: bold; text-decoration: none;">LOGOUT</a>
    </div>

    <script src="script.js"></script>
</body>

</html>
<?php /* 
       }*/ ?>