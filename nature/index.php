<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- index.php for the home page of the current Nature's Source web site -->
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nature's Source - Canada's largest specialty vitamin store</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="refresh" content="60" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="scripts/rotate.js"></script>
    <script type="text/javascript" src="scripts/menu.js"></script>
  </head>
  <body onload="startRotation()">
    <div id="page">
      <?php
      include("common/banner.php");
      include("common/mainmenu.html");
      ?>
      <div id="content">
        <div id="textLeft">
          <h3>Welcome to Nature's Source: Protecting your health naturally!</h3>
          <p>Founded in 1998, Nature's Source was created to serve those who
          use alternative healing methods. Offering only the highest quality
          vitamins, minerals, supplements &amp; herbal remedies, Nature's
          Source takes great pride in helping people live healthier, happier
          lives.</p>
          <p>Many Companies that talk about Customer Service fail to deliver.
          Nature's Source exists to truly serve all the needs of their
          customers. Each location features dedicated on-site therapists
          along with knowledgeable staff who ensure that every customer
          receives the best quality information available. Continuing
          Education seminars are a regular event at Nature's Source.</p>
        </div>
        <div id="image">
          <img id="placeholder" src="" alt="Healthy Lifestyle"
          width="280px" height="160px" />
        </div>
      </div>
      <?php
      include("common/footer.html");
      ?>
    </div>
  </body>
</html>
