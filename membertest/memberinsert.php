<meta charset="euc-kr">
<? 
 $ip=$REMOTE_ADDR;

 include "../lib/dbconn.php";

 $sql="select * from membertest where id=$id'";
 $result=mysql_query($sql,$connect);
 $exist_id=mysql_num_rows($result);

 if($exist_id)
 {
 echo("
 	<script>
	window.alert('해당 아이디가 존재함')
	history.go(-1)
	</script>
	");
 exit;
 }
 else
 {
 $sql="insert into membertest(id,pass,name)";
 $sql.="values ('$id','$pass','$name')";
 mysql_query($sql,$connect);
 }
 echo "$id,$name";
 mysql_close();
?>
 