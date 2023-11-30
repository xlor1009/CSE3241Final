<form action="" method="post">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <input type="submit">
</form>

<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["username"]) &&isset($_POST["password"])){
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
}
?>