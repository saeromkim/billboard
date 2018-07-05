<?
 session_start();

 $connect=mysql_connect("localhost","root","apmsetup");
 mysql_select_db("mysql",$connect);

 $sql="select * from yankeemem";
 $result=mysql_query($sql,$connect);
 $num_match=mysql_num_rows($result);

 if(!$num_match)
 {
  echo("
  <script>
  window.alert('등록되지 않은 아이디');
  history.go(-1)
  <script>
  ");
  }
  else
  {
   $row=mysql_fetch_array($result);
   $db_pass=$row[pass];

   if($pass!=$db_pass)
   {
   echo("
   <script>
    window.alert('비번 틀림')
    history.go(-1)
   </script>
   ");
   exit;
   }
   else
  {
  $userid=$row[id];
  $userpass=$row[pass];
  
  $_session['userid']=$userid;
  $_session['pass']=$pass;

 echo "$id,$pass";
 }
}

 echo ("
 <script>
 location.href='./member.php';
 </script>
  ");
?> 

