<?php
    //db.php
    $db_location = "aadwchboqagb7n.cxyxeo3ohdep.us-east-1.rds.amazonaws.com";
    $db_username = "mdlawrence";
    $db_password = "mdl75757";
    $db_database = "webbook";
    $db_connection = mysql_connect("$db_location","$db_username","$db_password")
        or die ("Error - Could not connect to MySQL Server");
    $db = mysql_select_db($db_database,$db_connection)
        or die ("Error - Could not open database");
?>
