<!DOCTYPE html>
<head>
</head>
<body>
<?
header("X-XSS-Protection: 0");
?>

<style>
ul{list-style:none;}
</style>
<form name="member_form" method="get">
<table align="center" >
<tr>
   <td><label>ID</label></td>
   <td><input type="text" name="id" class="login_input"></td>
</tr> 
<tr>
   <td><label>PW</label></td>
   <td><input type="password" name="pass" class="login_input"></td>
</tr>
<tr>
   <td colspan="2" align="right">
  <input type="submit" value="login">
  </td>
</tr>
</table>
<!--id is 7361646c6f6e656c796d616e-->
</form>

<?php
   @extract($_GET);
   $id=mysql_real_escape_string($id);
   $pass=mysql_real_escape_string($pass);
   echo "before: ".$id,$pass."<br>";

   $id=mb_convert_encoding($id,"UTF-8","EUC-KR");
   $pass=mb_convert_encoding($pass,"UTF-8","EUC-KR");
    echo "after: ".$id,$pass;
?>


</body>
</html>