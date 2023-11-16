
<form action="welcome.php" method="post">
        Phone Number: <input type="text" name="username"><br>
        Confirmation #: <input type="text" name="password"><br>
        <input type="submit">
</form>
<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if( $_POST['Phone Number'] ){
            if($_POST['Confirmation #']){
                // find all reservations and print out here
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