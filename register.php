<?php

include "connect.php";

if (isset($_POST["signup"])) {
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $POST["password"];
    $password = md5($password); //encryption

    $checkEmail = "SELECT*from users where email='$email";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "ISNERT INTO users(firstName, lastName, password) 
        VALUES('$firstName','$lastName', '$email','$password')";

        if ($conn->query($insertQuery) == TRUE) {
            header("Location: Index.php");
        } else {
            echo "Error" . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['signIn'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT*FROM users WHERE email='$email' and password='password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location:index.php");
        exit();
    } else {
        echo "Incorrect Email or Password";
    }
}