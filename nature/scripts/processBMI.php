<!-- processBMI.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Your BMI</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  </head>
  <body>
    <p>
    <?php
    include 'bmiCalculate.php';
    if ($_POST['details'])
        $message = detailedMessage($_POST['height'], $_POST['heightUnit'],
                                   $_POST['weight'], $_POST['weightUnit']);
    else
        $message = simpleMessage($_POST['height'], $_POST['heightUnit'],
                                 $_POST['weight'], $_POST['weightUnit']);
    echo $message;
    if ($_POST['wantMail'])
    {
        mailBMI($_POST['email'], $message);
        echo "<h2>The report has also been sent to you via e-mail.</h2>";
    }
    ?>
    </p>
  </body>
</html>
