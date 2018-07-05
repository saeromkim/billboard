<? 
	session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../css/common_new.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/greet.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
?>
<body>
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div>
	<div id="col2">
        
		<div id="title">
			<img src="../img/title_music.gif">
		</div>

		<div style="width:100%"><img src="../img/list_top_title.gif"></div>

		<div>
<?		
      $sql="select * from music";
      $result=mysql_query($sql);

      
      while($row = mysql_fetch_array($result))
	{      
	
      // 하나의 레코드 가져오기
	
	  $item_rank     = $row[rank];
	  $item_mname      = $row[mname];
	  $item_artist    = $row[artist];
  	  $item_img    = $row[img];
	  $item_link    = $row[link];
  	

?>
			 <div id="list_item">
				<ul>
				<li style="width:10%; height:200px" id="list_item1"><h2><?= $item_rank ?></h2></li>
				<li style="width:40%; height:200px" id="list_item2"><h2><?= $item_mname ?></h2></li>
				<li style="width:20%; height:200px"id="list_item3"><h2><?= $item_artist ?></h2></li>
				<li style="width:30%; height:200px"id="list_item4"><a href="<?= $item_link ?>"><img height=100 weight=100 src="<?= $item_img ?>"></a></li>
				</ul>
			</div>
<?
       }
?>	
        </div> <!-- end of list content -->

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
