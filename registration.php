<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="registration.css">
    <title>Account</title>
</head>
   
<body>    
    <div class="container" id ="signUp">
        <h1 class="form-title">Registration</h1>
        <form method="post" action="registration.php">
            <!-- creation of the warpper contating all inputs  -->
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="FirstName" placeholder="First Name" requried>
                <i class="fas fa-user"></i>
                <input type="text" name="LastName" placeholder="Last Name" requried><br>
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="johndoe@example.com" required>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" required maxlength="10"><br>   
                <i class="fas fa-map"></i>
                <input type="text" name="address" placeholder="mohrio" required>
                <i class="fas fa-building"></i>
                <input type="text" name="city" placeholder="City name" required><br>
                <i class="fas fa-phone"></i>
                <input type="tel" name="phonenum" placeholder="+230"required><br>
                <!-- button to submitthe form: -->
                <input type="submit" class="btn" value="Signup" name="signUp"><br>        
            </div>
        </form>    
        <a href="login.php">Already have an account?</a>
    </div>
</body>
</html>

<?php
    include ('connect.php');

    if(isset($_POST['signUp'])){
        $Fname=$_POST['FirstName'];
        $Lname=$_POST['LastName'];
        $email=$_POST['email'];
        $password=$_POST['password']; //unhashed 
        $city=$_POST['city'];
        $phoneNum=$_POST['phonenum'];        
        $HashedPass= hash('sha256',$password);       //<-hash password
    
    
        $sql = "SELECT * FROM users WHERE User_Email ='$email'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo "User Already exists";       
        }else{
            $var=$conn->prepare("INSERT INTO users(User_Password,User_Email,Fname,Lname) VALUES (?,?,?,?)");
            $var->bind_param("ssss",$HashedPass,$email,$Fname,$Lname);
            $var->execute();
            $var->close();                  
        }
               
    }
?>