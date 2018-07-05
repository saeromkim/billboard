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
<form name="member" method="post" action="memberinsert.php">
<div>
 <ul>
 <li>아이디<input type="text" name="id"></li>
 <li>비밀번호<input type="password" name="pass"></li>
 <li>이름<input type="text" name="name"></li>
 </ul>
<div>
</form>
<div><a href="#" onclick="ckeck_input()">회원가입</a></div>
</body>
</html>