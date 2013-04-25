<?php
//processRegistration.php
///////////////////// main begins ///////////////////////
if ($gender == "Female") $gender = "F";
else if ($gender == "Male") $gender = "M";
else $gender = "O";
if (emailExists($email))
{
    echo "<h3 class=\"margin10\">Sorry, but your e-mail address is already 
        registered.</h3>";
    echo "<h3 class=\"margin10\">[Exercise: Implement mailing  
        username and password to the e-mail address.]</h3>";
}
else
{
    $unique_login = getUniqueID($loginName);
    if ($unique_login != $loginName)
    {
        echo "<h3 class=\"margin10\">Your preferred login name exists.<br />
            So ... we have assigned $unique_login as your login name.</h3>";
    }

    $query = "INSERT INTO Customers (
        customer_id, salutation, customer_first_name, customer_middle_initial,
        customer_last_name, gender, email_address, login_name,
        login_password, phone_number, address, town_city, county, country
    )
    VALUES (
        NULL, '$salute', '$firstName', '$middleInitial', '$lastName', '$gender',
        '$email', '$unique_login', '$loginPassword', '$phone', '$address',
        '$city', '$state', '$country'
    );";
    $customers = mysql_query($query)
        or die(mysql_error());
    echo "<h3 class=\"margin10\">Thank you for registering with our e-store.</h3>";
    echo "<h3 class=\"margin10\"><a class=\"noDecoration\" href = \"login.php\">
        Please click here to login and start shopping.</a></h3>";
}
///////////////////// main ends functions begin ///////////////////////
function emailExists($email)
{
    $query = "SELECT * FROM Customers WHERE email_address = '$email'";
    $customers = mysql_query($query)
        or die(mysql_error());
    $numRecords = mysql_num_rows($customers);
    if ($numRecords > 0)
        return true;
    else
        return false;
}

function getUniqueID($loginName)
{
    $unique_login = $loginName;
    $query = "SELECT * FROM Customers WHERE login_name = '$unique_login'";
    $customers = mysql_query($query)
        or die(mysql_error());
    $numRecords = mysql_num_rows($customers);
    for ($i = 0; $numRecords > 0; $i++)
    {
        $unique_login = $loginName.$i;
        $query = "SELECT * FROM Customers WHERE login_name = '$unique_login'";
        $customers = mysql_query($query)
            or die(mysql_error());
        $numRecords = mysql_num_rows($customers);
    }
    return $unique_login;
}
?>
