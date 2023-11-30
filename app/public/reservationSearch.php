
<form action="" method="post">
        Phone Number: <input type="text" name="PhoneNum"><br>
        Confirmation #: <input type="text" name="ConNum"><br>
        <input type="submit">
</form>
<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        if((isset($_POST["PhoneNum"]) && '{$_POST["PhoneNum"]}' != "") || (isset($_POST["ConNum"]) && '{$_POST["ConNum"]}' != "")) {
          include "sql.php";
          $conNum = $_POST["ConNum"];
          $user_sql = "SELECT user_id,user_name from users where users.cellphone_number = '{$_POST["PhoneNum"]}'";
          $user_id = 0;
          $result = $conn->query($user_sql);
          if ($result->num_rows >0) {
            while($row = $result->fetch_array()){
            $user_id = $row['user_id'];
            
            $user_name = $row['user_name'];
          }
        }

        if($user_id != NULL){
          $isreservation = "SELECT event_id,reservation_date,fee,is_cancelled,confirmation_number from reservations where user_id = ($user_id) ";
          $result = $conn->query($isreservation);
        }
        else if($conNum != NULL){
          $isreservation = "SELECT event_id,reservation_date,fee,is_cancelled,confirmation_number from reservations where confirmation_number = ($conNum)";
          $result = $conn->query($isreservation);
        }
        
          
          
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
                  $event_id = $row['event_id'];
                  $reservation_date = $row['reservation_date'];
                  $fee = $row['fee'];
                  $is_cancelled = $row['is_cancelled'];
                  $confirmation_number = $row['confirmation_number'];
                  $event_sql = "SELECT event_name from events where event_id = ($event_id)";
                  $result2 = $conn->query($event_sql);
                  $event_name = '';
                 
                  if ($result2->num_rows >0) {
                    $row = $result2->fetch_array();
                    $event_name = $row['event_name'];
                  }
                    ?>
                    <tr>
                    
                    <td><?php echo $event_name;?></td>
                    <td><?php echo $reservation_date ;?></td> 
                    <td><?php echo $fee;?></td>
                    <td><?php echo $is_cancelled;?></td>
                    <?php if ($is_cancelled == FALSE) {
                      
                        ?>
                    <td> <form method="post"> 
                        <input type="hidden" name="zone_id" value="<?php echo $event_id; ?>">
                        <input type="hidden" name="reservation_date" value="<?php echo  $reservation_date; ?>">
                        <input type="hidden" name="fee" value="<?php echo $fee; ?>">
                        <input type="hidden" name="ConNum" value="<?php echo $confirmation_number; ?>"></input>
                        <button type="submit" name="Cancel">Cancel</button></form>
                    </td>
                    <?php }
                    else{  ?>
                    <td>
                      Cancelled
                    </td>
                    <?php } ?>
                    </tr>
               
                  
             
                    <?php  
                    
                }
              }
              
            }
            else if($result->num_rows ==0){
              echo "No reservations found";
            } 
        }
        Else{
          echo "No reservations for this criteria";
        } 
            ?>
                </tbody>
              </table>
            <?php
          }
        
        
    
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Cancel'])) { 
      if(date('Y-m-d', strtotime('+3 days'))<= $_POST['reservation_date']){
     ?><strong>Are you sure you want to cancel your reservation?</strong>
     <form action="" method="post">
        <input type="hidden" name="ConNum" value="<?php echo $_POST['ConNum']; ?>"></input>
        <button type="submit" name="Yes">Yes</button>
        <button type="submit" name="No">No</button>
     </form>
     <?php 
      }
      else{
        echo "Cannot Cancel less than 3 days till reservation date.";
      }  
    }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['Yes'])) { 
     
          $sql= "UPDATE reservations SET is_cancelled = TRUE WHERE confirmation_number = '{$_POST['ConNum']}'";
          $result = $conn->query($sql);
          echo 'Success!';
        }
           
        }
      
?>  