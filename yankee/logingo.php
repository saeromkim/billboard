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
  window.alert('��ϵ��� ���� ���̵�');
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
    window.alert('��� Ʋ��')
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

