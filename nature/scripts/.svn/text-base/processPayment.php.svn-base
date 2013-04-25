<?php
///////////////// main begins //////////////////
session_start();
include "receipt.php";
displayReceipt($customer_id);
$order_id = orderPaid($customer_id);
orderItemPaid($order_id);
////////////// main ends functions begin //////////////

function orderPaid($customer_id)
{
    $query = "SELECT * FROM Orders WHERE
        Orders.order_status_code = 'IP' and
        Orders.customer_id = '$customer_id';";
    $order = mysql_query($query)
        or die(mysql_error());
    $row = mysql_fetch_array($order);
    $query2 = "REPLACE INTO Orders
    (
        order_id,
        customer_id,
        order_status_code,
        date_order_placed,
        order_details
    )
    VALUES
    (
        '"
        .$row[order_id]."','"
        .$row[customer_id]."',
        'PD',
        CURDATE(),
        NULL"
        .");";
    mysql_query($query2)
        or die(mysql_error());
    return $row[order_id];
}

function orderItemPaid($order_id)
{
    $query = "SELECT *
        FROM Order_Items WHERE
        order_id = '$order_id';";
    $orderItems = mysql_query($query)
        or die(mysql_error());
    $numRecords = mysql_num_rows($orderItems);
    for($i = 0; $i < $numRecords; $i++)
    {
        $row = mysql_fetch_array($orderItems);
        $query2 = "REPLACE INTO Order_Items
        (
            order_item_id,
            order_item_status_code,
            order_id,
            product_id,
            order_item_quantity,
            order_item_price,
            other_order_item_details
        )
        VALUES
        ('"
            .$row[order_item_id]."',
            'PD','"
            .$row[order_id]."','"
            .$row[product_id]."','"
            .$row[order_item_quantity]."','"
            .$row[order_item_price]."',
            NULL".
        ");";
        mysql_query($query2)
            or die(mysql_error());
        reduceInventory($row[product_id], $row[order_item_quantity]);
    }
}

function reduceInventory($prod, $quantity)
{
    $query = "SELECT * FROM Products WHERE product_id=$prod;";
    $product = mysql_query($query)
        or die(mysql_error());
    $row = mysql_fetch_array($product);
    $row[product_inventory] -= $quantity;
    $query = "REPLACE INTO Products
        (
            product_id,
            product_category_code,
            product_name,
            product_price,
            product_inventory,
            product_color,
            product_size,
            product_description,
            product_image_url,
            other_product_details
        )
        VALUES
        ('"
            .$row[product_id]."','"
            .$row[product_category_code]."','"
            .$row[product_name]."','"
            .$row[product_price]."','"
            .$row[product_inventory]."','"
            .$row[product_color]."','"
            .$row[product_size]."','"
            .$row[product_description]."','"
            .$row[product_image_url]."','"
            .$row[other_product_details].
         "');";
    mysql_query($query)
        or die(mysql_error());
}
?>
