<meta charset="euc-kr">
<?
 $hp=$hp1."-".$hp2."-".$hp3;
 $email=$email1."@".$email2;

 $regist_Day=date("Y-M-D(H:i)");
 $ip=$REMOTE_ADDR;

 include "../lib/dbconn.php";

 $sql="select * from member where id='$id'";
 $result=mysql_query($sql,$connect);
 $exist_id=mysql_num_rows($result);

 if($exist_id)
 {
  echo("
   <script>
	window.alert('해당 아이디가 존재합니다.')
	history.go(-1)
   </script>
  ");
  exit;
 }
 else
 {
  $sql="insert into member(id,pass,name,nick,hp,email)";
  $sql.="values('$id','$pass','$name','$nick','$hp','$email')";
  mysql_query($sql,$connect);
 }

 mysql_close();
 echo ("
  <script>
   location.href='../index.php';
  </script>
 ");

?>
  