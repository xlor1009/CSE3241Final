
<form action="" method="post">
        Phone Number: <input type="text" name="PhoneNum"><br>
        Confirmation #: <input type="text" name="ConNum"><br>
        <input type="submit">
</form>
<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        if((isset($_POST["PhoneNum"]) && '{$_POST["PhoneNum"]}' != "") || (isset($_POST["ConNum"]) && '{$_POST["ConNum"]}' != "")) {
          include "sql.php";
          $user_id = "SELECT user_id,user_name from users where users.cellphone_number = '{$_POST["PhoneNum"]}'";
          $users_id = 0;
          $result = $conn->query($user_id);
          if ($result->num_rows >0) {
            while($row = $result->fetch_array()){
            $users_id = $row['user_id'];
            $user_name = $row['user_name'];
          }
        }
        if($user_id != NULL){
          $isreservation = "SELECT event_id,reservation_date,fee,is_cancelled,confirmation_number from reservations where user_id = ($users_id) or confirmation_number = '{$_POST["ConNum"]}'";
         
          $result = $conn->query($isreservation);
          
            if (!$result){
                die($conn->error);
                
            } 
            if ($result) {
              if ($result->num_rows >0) {
                ?>
                <table>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">date</th>
                    <th scope="col">fee</th>
                    <th scope="col">Cancelled(0 is False)</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>   
                <?php
                while($row = $result->fetch_array()) {
                  
                    ?>
                    <tr>
                    
                    <td><?php echo $row['event_id'];?></td>
                    <td><?php echo $row['reservation_date'];?></td> 
                    <td><?php echo $row['fee'];?></td>
                    <td><?php echo $row['is_cancelled'];?></td>
                    <?php if ($row['is_cancelled'] == FALSE) {
                       
                        ?>
                    <td> <form method="post"> 
                        <input type="hidden" name="zone_id" value="<?php echo $row['event_id']; ?>">
                        <input type="hidden" name="venue_id" value="<?php echo $row['reservation_date']; ?>">
                        <input type="hidden" name="event_id" value="<?php echo $row['fee']; ?>">
                        <input type="hidden" name="ConNum" value="<?php echo $row['confirmation_number']; ?>"></input>
                        <button type="submit" name="Cancel">Cancel</button></form>
                    </td>
                    <?php } ?>
                    </tr>
               
                  
             
                    <?php  
                    
                }
              }
              Else {
                echo "No reservations found";
              } 
            }
        }
            ?>
                </tbody>
              </table>
            <?php
          }
        }
        Else{
          echo "No reservations for this criteria";
        } 
    
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Cancel'])) { 
     ?><strong>Are you sure you want to cancel your reservation?</strong>
     <form action="" method="post">
        <input type="hidden" name="ConNum" value="<?php echo $_POST['ConNum']; ?>"></input>
        <button type="submit" name="Yes">Yes</button>
        <button type="submit" name="No">No</button>
     </form>
     <?php   
    }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo $_POST['ConNum'];
        if(isset($_POST['Yes'])) { 
           $sql= "UPDATE reservations SET is_cancelled = TRUE WHERE confirmation_number = '{$_POST['ConNum']}'";
           $result = $conn->query($sql);
        }
        }
?>  