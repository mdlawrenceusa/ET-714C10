<?php
//login.php
session_start();
if ($_SESSION["customer_id"] != "") header('Location: estore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nature's Source - Logging In</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="scripts/menu.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
  </head>
  <body>
    <div id="page">
      <?php
      include("common/banner.php");
      include("common/mainmenu.html");
      ?>
      <div id="content">
        <div id="textOnly" class="FeedbackForm">
          <h4>Login Form</h4>
          <p><a href="register.php" class="noDecoration">If you have not yet
            registered for our e-store, please click here to register.</a></p>
          <form method ="post" id="loginForm" name="loginForm" action="scripts/processLogin.php"
                onsubmit="return validateLoginForm();">
            <table summary="Login Form">
              <tr>
                <td>Username:</td>
                <td valign="top"><input name="customer_nm" type="text"
                id="customer_nm" size="20" /></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td valign="top"><input name="customer_pw" type="password"
                id="customer_pw" size="20" /></td>
              </tr>
              <tr>
                <td><input type="submit" value="Login" /></td>
                <td><input type="reset" value="Reset Form" /></td>
              </tr>
              <?php if ($retry == true) { ?>
              <tr>
                <td valign="top" colspan="2">There was an error in the login.<br />
                 Either username or password was incorrect.<br />
                 Please re-enter the correct login information.</td>
              </tr>
              <?php } ?>
            </table>
          </form>
        </div>
      </div>
      <?php include("common/footer.html"); ?>
    </div>
  </body>
</html>
