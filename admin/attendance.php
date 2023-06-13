<?php
include("../private/initialize.php");
include("../conn.php");

    try{
      
    if(isset($_POST['add'])){

      foreach ($_POST['status'] as $i => $status) {
        $fname = $_POST['fname'][$i];
        $id = $_POST['id'][$i];
        $date = date('Y-m-d');
        
        $result = mysqli_query($conn,"insert into attendance(worker_id,fname,presence,date) values('$id','$fname','$status','$date')");
        if($result == false){
            throw new Exception(mysqli_error($conn));
        }
      }
      if(mysqli_error($conn) == null){
            echo "success";
    }
  }
}
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>
<!DOCTYPE html>     <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/workers-attendence.css">
    </head>

    <body>
        <div id = "header-container">

        <?php
include("./navBar.php")
?>
            <div id = "menu-form">
                <form method="post">
                    <div>
                        <caption>የሰራተኞች መቆጣጠሪያ</captions>
                    </div>

                    <fieldset>
                        <div id ="#table-container">
                            <table>
                                <thead>
                                        <td>መለያ ቁጥር</td>
                                        <td>ስም</td>
                                        <td>is present</td>
                                </thead>
                                <?php
                                    $i=0;
                                    $radio = 0;
                                    $all_query = mysqli_query($conn,"select * from employee");
                                        
                                    while ($data = mysqli_fetch_array($all_query,MYSQLI_ASSOC)) {
                                    $i++;
                                    ?>
                                <tbody>
                                <tr>
                                        <td><?php echo $data['id']; ?>  <input type="hidden" name="id[]" value="<?php echo $data['id']; ?>"></td>
                                          <td><?php echo $data['fname'] ." " . $data['lname'] ; ?>
                                          <input type="hidden" name="fname[]" value="<?php echo $data['fname']; ?>">
                                        </td>
                                          <td>
                                             <label>yes</label>
                                             <input type="radio" name="status[<?php echo $radio; ?>]" value="Present" >
                                             <label>no </label>
                                             <input type="radio" name="status[<?php echo $radio; ?>]" value="Absent" checked>
                                        </td>
                                         </tr>
                                  
                                </tbody> 
                                <?php

                            $radio++;
                            } 
                            ?>
                            </table>
                        </div>
                        <div class = "make-center">
                            <input type="submit" id = "edit-menu-button" name="add" value = "መዝግብ">
                        </div>
                    </fieldset>



                </form>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>