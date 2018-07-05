<?
 include "../lib/dbconn.php";

 $sql="delete from mtalk_ripple where num=$ripple_num";
 mysql_query($sql,$connect);
 mysql_close();

 echo("
	<script>
	location.href='view.php?table=$table&num=$num';
	</script>
	");
?>
