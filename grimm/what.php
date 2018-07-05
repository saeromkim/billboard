<!DOCTYPE html>
<head>
</head>
<body>
<img src="RapunzelPicture.jpg" height="400" width="600"> 
<h1>What is the Rapunzel's favorite food?</h1>

<?php

   $cookie_name="user";
   $cookie_value ="What_is_Rapunzel's_favorite_food?";

   setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

   if($_COOKIE[user]=="cookies"||$_COOKIE[user]=="Cookies") {
        echo("<script>location.replace('result.php');</script>"); 
   }

?>
</body>
</html>