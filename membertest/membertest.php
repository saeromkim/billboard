<?
 session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN“
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta charset="utf-8">
<script>
function check_input()
{
 document.membertest.submit();
}
</script>
</head>
<body>

<div>
<form name="membertest" method="post" action="memberinsert.php">
<div>
 <ul>
 <li>아이디<input type="text" name="id"></li>
 <li>비밀번호<input type="password" name="pass"></li>
 <li>이름<input type="text" name="name"></li>
 </ul>
</div>
<? echo "$id,$password,$name"; ?>
<div><a href="#"><img src="../img/button_save.gif"
onclick="check_input()"></a></div>
</form></div>
<? echo "$id,$password,$name"; ?>
</body>
</html>