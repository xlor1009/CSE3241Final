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
    <?php include "header.php"; ?>
  </head>
  <h1>Add Event</h1>
  <body>
   <?php
    
        
        include "sql.php";
        ?>

<form action="" method="post">
        Enter:<input type ="text" name="name" placeholder="Event Name">
        Enter:<input type ="Date" name="date" placeholder="Event date">
        Enter:<input type ="text" name="venue" placeholder="Venue Name">
        <input type="submit">
        </form>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {  
            $sql_venue = "SELECT venue_id from venues where venue_name = '{$_POST["venue"]}'";
            $result = $conn->query($sql_venue);
            if ($result->num_rows >0) {
              $row = $result->fetch_array();
              $venue_id = $row['venue_id'];
              $sql = "INSERT INTO events VALUES (0,'{$_POST["name"]}','{$_POST["date"]}',($venue_id))";
              $result = $conn->query($sql);
              if ($result !== NULL) {
                echo "Zone added successfully";
              } else {
                echo "Error adding Zone: " . $conn->error;
              }
              header("location: admin.php");
            }
            else{
              echo "Error: Venue does not exist.";
            }
        }
        ?>