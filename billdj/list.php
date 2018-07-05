<? 
	session_start(); 
	$table = "billdj";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../css/common_new.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%'";
		
	}
	elseif($mode=="hiphop")
	{
		$sql = "select * from $table where tag='hiphop'";
	}
	elseif($mode=="rnb")
	{
		$sql = "select * from $table where tag='rnb'";
	}
	elseif($mode=="pop")
	{
		$sql = "select * from $table where tag='pop'";
	}
	elseif($mode=="balad")
	{
		$sql = "select * from $table where tag='balad'";
	}
	else
	{
		$sql = "select * from $table";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;

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
			<img src="../img/title_billdj.gif">
		</div>
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 추천음악이 있습니다.</div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3">
		         <select name="find">
                           <option value='mname'>곡이름</option>
                           <option value='artist'>아티스트</option>
		         </select></div><!--end of list_search3-->
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
		</div>
		</form>
		<div class="clear"></div>

<div>
 <a href="list.php?mode=hiphop" padding="20px"><img src="../img/tag1.jpg"></a>
 <a href="list.php?mode=rnb"><img src="../img/tag2.jpg"></a>
 <a href="list.php?mode=pop"><img src="../img/tag3.jpg"></a>
 <a href="list.php?mode=balad"><img src="../img/tag4.jpg"></a>

</div><!--태그 이미지&form 태그-->
		

	<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
	echo ("$artist");
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	  $item_tag     = $row[tag];
	  $item_img    = $row[img];
  	  $item_link    = $row[link];
	  $item_mname     = $row[mname];
	  $item_artist    = $row[artist];  
?>
			<div style="float:left"><!--list item-->
				<div style="margin:15px"><a href="<?= $item_link ?>"><img width="100px" height="100px" src="<?= $item_img ?>"></a></div>
				<div align="center"><strong><?= $item_mname ?></strong></div>
				<div align="center"><?= $item_artist ?></div>
			</div>
			
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>


				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
