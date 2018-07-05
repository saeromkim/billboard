<?
 session_start();
?>
<meta charset="utf-8">
<html>
<head></head>
<body>

<form name="logintest" method="post" action="logingo.php">
<div>
 <ul>
 <li><input type="text" name="id"></li>
 <li><input type="password" name="pass"></li>
 </ul>
</div>
<div><input type="image" src="../img/login_button.gif"></a></div>
</form>
<? echo "$id,$pass"; ?>
</body>
</html>