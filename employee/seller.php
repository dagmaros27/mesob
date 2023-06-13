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
        <link rel="stylesheet" href="../styles/selling-page.css">
    </head>
    <body>
        <div id = "header-container">

            <div id = "nav-bar">
                <div id = "first-nav" class="nav-ul-container">
                    <img id = "logo-img" src="./imgs/logo.png" alt="cafe-logo">
                    <h1 id = "cafe-name">መዓድ</h1>
                </div>
            </div>
            <p id = "selling-title">መሸጫ ገፅ</p>
            <div class = "tables">
                <form action=""  method="POST" >
                    <table>
                        <caption>የምግብ/መጠጥ ዝርዝር</caption>
                        <thead>
                            <tr>
                                <th>የምግብ/መጠጥ ስም</th>
                                <th>ዋጋ</th>
                                <th>ብዛት</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr>
                                <td>
                                    <select name="" id="foods" onchange="loadPrice()" required>
                                    <option value="">None</option>
                                    <?php
                        $i=0;
                        $totalAmount =0;
                        $totalPrice = 0;
                        $date = date('Y-m-d');
                        $all_query = mysqli_query($conn,"select * from food");
 
                        while ($data = mysqli_fetch_array($all_query,MYSQLI_ASSOC)) {
                          $i++;
                        ?>
                                        <option value="<?php echo $data['name']?>"><?php echo $data['name']?></option>  
                                        <?php 
          }           
      ?>
                                    </select>
                                </td>
                                <td id="price" name="price">
                                
                                </td>
                                <td><input type="number" min="1" name="amount" required></td>
                                <td><button type="button" onclick="addFood()">add</button></td>
                            </tr>
                        </tbody>
                 
                    </table>                    
                </form>
            </div>
            <div class = "tables">
            <form method="post">
                <table>
                    <caption>ትዕዛዝ</caption>
                    <thead>
                        <td></td>
                        <td>የምግብ/መጠጥ ስም</td>
                        <td>የትዕዛዝ ብዛት</td>
                        <td>አጠቃላይ ዋጋ</td>
                    </thead>
                    <tbody id="orderedList">
                        
                    </tbody>
                    <tfoot id="tableFooter">
                      </tfoot>
                </table>
                <input type="submit" name="order" value="እዘዝ" />
            </form>
            </div>
    
            </div>
        </div>
        <script src="../js/functions.js"></script>
    </body>
</html>