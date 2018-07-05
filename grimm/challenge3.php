<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
</head>
<body>

<?php
$inputbox=mb_convert_encoding($inputbox,"UTF-8"); 
header('X-XSS-Protection:0');

?>


<style>
ul{list-style:none;}
</style>


<div>
<div>
   <form name="input" action="c3result.php" method="post">
   <input id="inputbox" name="inputbox">
   <input id="button" type="submit" value="enter">
<?
  
  $inputbox=str_replace("aa","123",$inputbox);
  //$inputbox=strtolower($inputbox);
?>
</form>
<?
  if($inputbox)
  {
   echo("
	<script>
	location.href='c3reslut.php';
	</script>
	");
  }

?>

</div>
<h1>Alert Rapunzel!</h1>
</div>


</body>
</html>