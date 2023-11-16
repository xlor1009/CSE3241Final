<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Wonderland</title>
  </head>
  <body>
    <form action="" method="post">
        Enter Date: <input type="date" name="Selectdate"><br>
    </form>
    <?php 
        include "header.php"; 
        include "sql.php";
        $sql = "SELECT ZoneID,ParkingSpace,Rate FROM Zones";
        if($_SERVER["REQUEST_METHOD"] == "POST") {   
            $sql1 = "SELECT ZoneID,count(ZoneID) as numOftaken FROM reservation WHERE date = {$_POST['Selectdate']} Group By ZoneID";
        }
    ?>
