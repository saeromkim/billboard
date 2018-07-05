<?
 session_start();
?>
<?php
header("X-XSS-Protection: 0");
 if(!$id)
 {
  echo("
  <script>
  window.alert('Please input ID.')
  history.go(-1)
  </script>
  ");
  exit;
 }
 if(!$pass)
 {
  echo("
  <script>
  window.alert('Please input Password.')
  history.go(-1)
  </script>
  ");
  exit;
  }

    $connect=mysql_connect( "localhost", "root", "apmsetup") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("c2",$connect);   

   $id=mysql_real_escape_string($id);
   $pass=mysql_real_escape_string($pass);

   $id=mb_convert_encoding($id,"UTF-8","EUC-KR");
   $pass=mb_convert_encoding($pass,"UTF-8","EUC-KR");
   echo "$pass";

   $sql="select * from member where id='$id' and pass='$pass'"; 
   $result=mysql_query($sql, $connect);
   $numrows=mysql_num_rows($result);

  if($numrows)
 {
  echo("
    <script>
    location.href='result.php';
    </script>
   ");
  }//else

 
?>




