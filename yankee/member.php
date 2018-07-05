<?
 session_start();
?>
<html>
<head>
<meta charset="utf-8">
</head>

<script>
function check_input()
{
 if(!document.mem_form.id.value)
 {
  alert('아이디입력하세요');
  return;
  }
  else
  {
  document.mem_form.submit;
  }
}
</script>
<body>
<form name="mem_form" method="post" action="insert.php"> 
 <div>
 <div>*아이디<input type="text" name="id"></div>
 <div>*비밀번호<input type="password" name="pass"></div>
 </div>
 <div><a href="#"><img src="../img/ok.png" onclick="check_input()"></a></div>
</form>

</body>
</html>