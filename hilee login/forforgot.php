<?php 
include("connect.php");

session_start();

if(isset($_POST['femail'])){
    $email = $_POST['Email'];

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION["efound"] = true;
        header("Location: forgot.php");
        exit;
    } else {
        $_SESSION['wemail'] = true;
        header("Location: forgot.php");
        exit;
    }

}


if(isset($_POST["reset"])){
    $email = $_POST['Email'];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users set password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashedPassword, $email);
    
    if($stmt->execute()){
        $_SESSION['sreset'] = true;
        header("Location: forgot.php");
        exit;
    }


}
?>