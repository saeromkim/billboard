<html>
<head>
<? header('X-XSS-Protection:0'); ?>
</head>
<body><h1>
<?
   $search="<script>alert('')</script>";

   $connect=mysql_connect( "localhost", "root", "apmsetup") or  
        die( "SQL server에 연결할 수 없습니다."); 

   mysql_select_db("c2",$connect); 
  
   $sql=("select * from flag"); 
   $result=mysql_query($sql,$connect);
   $num_match=mysql_fetch_array($result);
    

 if(strpos($inputbox,$search)!==false)
 {
  echo("$inputbox The flag is $num_match[0]");
 }
 else{
  echo("Sorry, she can't wake up with $inputbox Try again.");
 }

?>
</script>
</h1>
</body>
</html>