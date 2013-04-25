<?php
//processPurchase.php
///////////////// main begins /////////////////////
$prod = stripslashes($prod);
$items = getExistingOrder($customer_id);
$numRecords = mysql_num_rows($items);
if ($numRecords == 0 && $prod == "view")
{
    echo "<p><strong>Your shopping cart is empty.</strong></p>
        <p><a class='noDecoration' 
        href='estore.php'><strong>Please click here
        to continue shopping ...</strong></a></p>";
}
else
{
    displayHeader();
    $grandTotal = 0;
    if ($numRecords == 0)
    {
        createOrder($customer_id);
    }
    else //There are existing items to display
    {
        for ($i = 0; $i < $numRecords; $i++)
        {
            $grandTotal += displayExistingItem($items);
        }
    }

    if ($prod != "view") //Display entry row for new item
    {
        if ($retry)
        {
            echo "<tr><td colspan='7' align='center'>
                <strong>Please re-enter a product
                quantity not exceeding the inventory
                level.</strong></td></tr>";
        }
        displayNewItem($prod);
    }
    displayFooter($grandTotal);
}

///////////////// main ends functions begin /////////////////////

function getExistingOrder($customer_id)
{
    $query = "SELECT
        Orders.order_id,
        Orders.customer_id,
        Orders.order_status_code,
        Order_Items.*
        FROM Order_Items, Orders WHERE
        Orders.order_id=Order_Items.order_id and
        Orders.order_status_code='IP' and
        Orders.customer_id = $customer_id;";
    $items = mysql_query($query)
        or die(mysql_error());
    return $items;
}

function createOrder($customer_id)
{
    $query = "INSERT INTO Orders
    (
        customer_id,
        order_status_code,
        date_order_placed,
        order_details
    )
    VALUES
    (
        '$customer_id',
        'IP',
        CURDATE( ),
        NULL
    );";
    mysql_query($query)
        or die(mysql_error());
}

function displayHeader()
{
    echo "<form id='orderForm' onsubmit='return validateOrderForm();'
        action='scripts/addItem.php'>";
    echo "<table border='1px'>";
    echo "<tr>
        <td align='center'><strong>Product Image</strong></td>
        <td align='center'><strong>Product Name</strong></td>
        <td align='center'><strong>Price</strong></td>
        <td align='center'><strong>Inventory</strong></td>
        <td align='center'><strong>Quantity</strong></td>
        <td align='center'><strong>Total</strong></td>
        <td align='center'><strong>Action</strong></td>
        </tr>";
}

function displayFooter($grandTotal)
{
    echo "<tr><td colspan='5'><strong>Grand Total</strong></td>";
    printf("<td align='right'>\$%.2f</td>", $grandTotal);
    echo "<td align='center'><a href = 'payment.php?nodisplay=true'>
        <input type='button' value='Proceed to checkout' /></a>
        </td></table></form>";
}

function displayFirstFourColumns($prod)
{
    $prod = stripslashes($prod);
    $query = "SELECT * FROM Products WHERE product_id = $prod;";
    $product = mysql_query($query)
        or die(mysql_error());
    $row = mysql_fetch_array($product);
    echo "<tr>\n";
    echo "<td align = center>";
    echo  "<img height='70' width='70'
        src = \"".$row[product_image_url]."\" />";
    echo "</td><td>";
    echo $row[product_name];
    echo "</td><td align='center'>";
    printf("$%.2f\n",$row[product_price]);
    echo "</td><td align='center'>";
    echo $row[product_inventory];
    echo "</td>";
}

function displayExistingItem($items)
{
    $row = mysql_fetch_array($items);
    $prod = $row[product_id];
    displayFirstFourColumns($prod);
    echo "<td align='center'>";
    echo $row[order_item_quantity];
    echo "</td><td align='right'>";
    $total = $row[order_item_quantity]*$row[order_item_price];
    printf("$%.2f", $total);
    echo "</td><td align='center'>";
    echo "<p><a href='scripts/deleteItem.php?order_item=".
        $row[order_item_id]."&order_id=".$row[order_id]."'>
        <input type='button' value='Delete from cart' /></a></p>
        <p><a href='department.php'>
        <input type='button' value='Continue shopping' />
        </a></p></td></tr>";
    return $total;
}

function displayNewItem($prod)
{
    displayFirstFourColumns($prod);
    echo "<td align='center'>";
    echo "<input type='hidden' id='prod'
          name='prod' value=\"$prod\">";
    echo "<input type='text' id='quantity'
          name='quantity' size='3'>";
    echo "</td><td align='center'>";
    echo "TBA";
    echo "</td><td align='center'>";
    echo "<p><input type='submit' value='Add to cart' /></p>
        <p><a href='department.php'>
        <input type='button' value='Continue shopping' /></a></p>
        </td></tr>";
}
?>
