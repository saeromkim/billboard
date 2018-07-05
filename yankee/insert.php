<?
 session_start();


 $connect=mysql_connect("localhost","root","apmsetup");
 mysql_select_db(mysql,$connect);

 $sql="select * from yankeemem where id=$id;"
 $result=mysql_query($sql,$connect);
 $exist_id=mysql_num_rows($result);

 if($exist_id)
 {
  echo("
  <script>
  window.alert('해당아이디가 이미존재')
  history.go(-1)
  </script>
  ");
  exit;
  }
  else
  {
  $sql="insert into yankeemem (id,pass) values ('$id','$pass')";
  mysql_query($sql,$connect);
  }

 mysql_close();
 echo("
  <script>
  location.href='./loginform.php';
  </script>
 ");

?>
