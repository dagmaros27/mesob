<?php
include("../private/initialize.php");
include("../conn.php");
include("../private/functions.php");

               if(isset($_POST['res'])){
                $selected = $_POST['res'];
                $result = mysqli_query($conn,"select unitPrice from food where name = '$selected'");
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $unitPrice = $row['unitPrice'];
                    echo $unitPrice;
                }
               }

               if (isset($_POST['order'])) {
                $selected = json_decode($_POST['order'], true);
                storeFoodList($selected, $conn);
            }
            function storeFoodList($foodList, $conn)
{
    $totalPrice = 0;
    $totalAmount = 0;
    $foods = "";
    $date = date("Y-m-d");
    $waiterId = "";

    foreach ($foodList as $food) {
        $name = $food['name'];
        $amount = $food['amount'];
        $price = $food['price'];

        $totalPrice += $price * $amount;
        $totalAmount += $amount;
        $foods .= ", " . $name;
    }

    $sql = "INSERT INTO `orders` (`food`, `amount`, `totalPrice`, `date`) VALUES ('$foods', '$totalAmount', '$totalPrice', '$date')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

                ?>