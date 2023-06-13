<?php
include("../private/initialize.php");
include("../conn.php");

?>

<!DOCTYPE html>     <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/edit-menu.css">
    </head>
    <body>
        <div id = "header-container">
<?php
include("./navBar.php")
?>
            <div id = "menu-form">
                <form method="post">
                    <!-- <div>
                        <title >ማውጫ ማረሚያ ገጽ</title>              


                    </div> -->



                    <fieldset>
                        <label for="">ስም</label>
                        <input type="text" name="name" placeholder = "የምግብ/መጠጥ ስያ?"required>
                        <label for="">አይነት</label>
                        <select name="type" id="">
                            <option value="ምግብ" selected>ምግብ</option>
                            <option value="መጠጥ">መጠጥ</option>
                            <option value="leሎች">leሎች</option>
                        </select>
                        
                        <label for="">ዋጋ</label>
                        <input type="number" name="price" min="0" required>
                        <input type="submit" name="add" id = "add-menu-button" value="ጨምር">
                    </fieldset>
<?php
    if(isset($_POST['add']))
    {
        
        try{
    /////////////////you are stuck here!!!!!!!!!!!!!
        
            if(empty($_POST['name'])){
                throw new Exception("name is required!");
                
            }
            if(empty($_POST['price'])){
                throw new Exception("price is required!");
                
            }
            
          $sql = "INSERT INTO `food`(`name`, `unitPrice`, `type`) VALUES ('".$_POST['name']."','".$_POST['price']."','".$_POST['type']."')";
            $result = mysqli_query($conn,$sql);

            if($result == false){
                throw new Exception(mysqli_error($conn));
            }
            else{
                $sql = null;
                unset($_POST['name']);
                unset($_POST['price']);
                unset($_POST['type']);
                echo "added successfully";
            }
                
        }
        catch(Exception $e){
            $error_msg=$e->getMessage();
        }
    }
    ?>
        </form>
                        <div id ="#table-container">
                            <table>
                                <thead>
                                        <td>ስም</td>
                                        <td>አይነት</td>
                                        <td>ዋጋ</td>
                                        <td>አጥፋ</td>
                                </thead>
                                
                    <?php
                        $i=0;
 
                        $all_query = mysqli_query($conn,"select * from food");
 
                        while ($data = mysqli_fetch_array($all_query,MYSQLI_ASSOC)) {
                          $i++;
 
                        ?>
                                <tbody>
                                    <tr>
                                        <td><?php if (isset($data['name'])) {
                                                echo $data['name']; }?></td>                            
                                        <td><?php if (isset($data['type'])) {
                                                echo $data['type']; }?>  
                                        </td>     
                                        <td>
                                        <?php if (isset($data['unitPrice'])) {
                                                echo $data['unitPrice']; }?>
                                        </td>                                 
                                        <td>
                                        <button class="button" data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-name="<?php echo $data['name']; ?>" data-id="<?php echo $data['id']; ?>" data-type="<?php echo $data['type']; ?>" data-price="<?php echo $data['unitPrice']; ?>">Edit</button>

                                <button class="button" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                data-id="<?php 
                                                echo $data['id'];?>" 
                                         data-name="<?php 
                                            echo $data['name'];
                                        ?>"> Delete</button>
                                        </td>                         
                                    </tr><br>    
                                </tbody> 
                                <?php 
          }           
      ?>
                            </table>
                        </div>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>