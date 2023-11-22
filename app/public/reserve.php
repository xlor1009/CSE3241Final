<div>
  <h1>Reserve</h1>
</div>
<form action="" method="post">
  Enter Date: <input type="date" name="Selectdate"><br>
  <input type="submit">
</form>
<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Selectdate"] != "") { 
      
        include "sql.php";
        $isevent = "SELECT event_id from events where event_date = '{$_POST["Selectdate"]}'";
        $result = $conn->query($isevent);
        if ($result->num_rows >0) {
          if($_POST["Selectdate"] > date('Y-m-d')) {
            $sql1 = "SELECT zone_id,count(zone_id) as numOfZones FROM reservations WHERE reservation_date = '{$_POST["Selectdate"]}' Group By zone_id";
            $sql = "SELECT zones.zone_id,rate,numOfZones,total_spots from zones left join ($sql1) as num on zones.zone_id=num.zone_id where (total_spots>num.numOfZones and total_spots>0) or (num.numOfZones is NULL and total_spots>0)";
            $result = $conn->query($sql);
            if (!$result) die($conn->error);
            if ($result) {
            if ($result->num_rows >0) {
              ?>
              <table>
              <thead>
                <tr>
                  <th scope="col">Zone ID</th>
                  <th scope="col">Avalible Spots</th>
                  <th scope="col">Rate</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                
            <?php
            while($row = $result->fetch_array()) {
              ?>
              <tr>
              <td><?php echo $row['zone_id'];?></td>
              <td><?php echo $row['total_spots']-$row['numOfZones'];?></td>
              <td><?php echo $row['rate'];?></td>
              <td><button class="black" data-target="reserve-modal" 
                  onClick="toggleModal(event)">Reserve</button></td>
            </tr>
              <?php    
          }
          }
            Else {
              echo "No records found";
            } 
          }
          ?>
              </tbody>
            </table>
          <?php
          }
        Else {
          echo "Must be a day in advance";
        } 
        }
      Else{
        echo "No Event This Day";
      } 
  }
?>