<form action="" method="post">
        username: <input type="text" name="username"><br>
        password: <input type="text" name="password"><br>
        <input type="submit">
</form>

<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if( $_POST['username'] == "admin"){
            if($_POST['password']== "admin123"){
                header("location: admin.php");
                exit();
            }
            else{
                $error = "Your Password is invalid";
                }
       }
       else{
        $error = "Your Login Name or Password is invalid";
       }
    }
?>