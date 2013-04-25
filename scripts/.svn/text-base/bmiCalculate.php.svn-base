<!-- bmiCalculate.php -->

<?php
function simpleMessage($height, $heightUnit, $weight, $weightUnit)
{
   $bmi = sprintf("%.2lf", calculate($height, $heightUnit, $weight, $weightUnit));
   $text =
       "<h1>BMI Report</h1>".
       "<h3>Your BMI is ".$bmi.".</h3>";
   return $text;
}

function detailedMessage($height, $heightUnit, $weight, $weightUnit)
{
   $bmi = sprintf("%.2lf", calculateBMI($height, $heightUnit, $weight, $weightUnit));
   $text = "<p> "."<img src = ".
           " http://cs.smu.ca/~webbook/cdrom/web08/nature/images/naturelogo.gif ".
           " alt = 'Nature's Source Logo' />"."</p>".
           "<h1>BMI Report</h1>".
           "<h3>Your height: ".$height." ".$heightUnit."<br />".
           "Your weight: ".$weight." ".$weightUnit."<br />".
           "Your BMI: ".$bmi."</h3>";
   if ($bmi < 18.5)
       $text .= "<h2>Your BMI suggests that you are underweight.</h2>";
   else if ($bmi < 25)
       $text .= "<h2>Your BMI suggests that you have a reasonable weight.</h2>";
   else if ($bmi < 29)
       $text .= "<h2>Your BMI suggests that you are overweight.</h2>";
   else
       $text .= "<h2>Your BMI suggests that you may be obese.</h2>";
   return $text;
}

function inchesToCentimetres($height) { return $height*2.54; }
function poundsToKilograms($weight) { return $weight/2.2; }

function calculateBMI($height, $heightUnit, $weight, $weightUnit)
{

   if ($heightUnit == "inches") $height = inchesToCentimetres($height);
   if ($weightUnit == "pounds") $weight = poundsToKilograms($weight);
   $height /= 100; //Convert height from centimeters to meters
   $bmi = $weight/($height*$height);
   return $bmi;
}

function mailBMI($email, $message)
{
    $header  = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= "From: webbook@cs.smu.ca\r\n";
    mail($email, "BMI report from Nature's Source", $message, $header);
}
?>
