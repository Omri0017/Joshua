<?php
session_start();
include 'connect.php';

if (isset($_POST['Signup'])) {
   
    $email = $_POST['Email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION["VEmail"] = true;
        header("Location: index.php");

    } else {
        $stmt = $conn->prepare("INSERT INTO users(name, email, password) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        if ($stmt->execute()) {
            $_SESSION["Sreg"] = true;
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signin'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['semail'] = $row['email'];
            header("Location: homepage.php");
            exit();
        } else {
            $_SESSION["icreds"] = true;
            header("Location: index.php");

        }
    } else {
        $_SESSION["icreds"] = true;
        header("Location: index.php");

    }
}
?>