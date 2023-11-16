<div>
  <h1>Reserve</h1>
</div>
<form action="" method="post">
  Enter Date: <input type="date" name="Selectdate"><br>
</form>
<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST") {   
      include "sql.php";
      $sql1 = "SELECT ZoneID,count(ZoneID) as numOfZones FROM reservation WHERE date = {$_POST['Selectdate']} Group By ZoneID";
      $sql = "SELECT ZoneID,Rate from Zones join {$sql1} as num on Zones.ZoneID=num.ZoneID where parkingSpace>num.numOfZones";
    }
    
?>