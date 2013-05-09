<?php
//addItem.php
///////////////// main begins //////////////////
session_start();
include "db.php";
$customer_id = $_SESSION["customer_id"];
$order_id = getOrderID($customer_id);
$prod = stripslashes($_REQUEST['prod']);
$query = "SELECT * FROM Products WHERE product_id=$prod;";
$product = mysql_query($_REQUEST['query'])
    or die(mysql_error());
$row = mysql_fetch_array($product);
$product_inventory = $row['product_inventory'];
if ($product_inventory < $_REQUEST['quantity'])
{
    header("Location: ../purchase.php?prod=$prod&retry=true");
}
else
{
    $product_price = $row['product_price'];
    $query = "INSERT INTO Order_Items
    (
        order_item_status_code,
        order_id,
        product_id,
        order_item_quantity,
        order_item_price,
        other_order_item_details
    )
    VALUES
    (
        'IP',
        $order_id,
        $prod,
        $quantity,
        $product_price,
        NULL
    );";
    mysql_query($query)
        or die(mysql_error());
    header('Location: ../purchase.php?prod=view');
}
////////////// main ends functions begin //////////////
function getOrderID($customer_id)
{
    $query = "SELECT
            Orders.order_id,Orders.order_status_code,
            Orders.customer_id
        FROM Orders WHERE
            Orders.order_status_code = 'IP' and
            Orders.customer_id = '$customer_id';";
    $order = mysql_query($query)
        or die(mysql_error());
    $row = mysql_fetch_array($order);
    return $row[order_id];
}
?>
