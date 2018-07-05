<? 
	session_start(); 
	$table = "billdj";

   include "../lib/dbconn.php";

   $sql ="select * from billdj";
   $result = mysql_query($sql, $connect);
   $row = mysql_fetch_array($result);

   $total = $row[tag1] + $row[tag2] + $row[tag3] + $row[tag4]; 

   $tag1_percent = $row[tag1]/$total * 100;
   $tag2_percent = $row[tag2]/$total * 100;
   $tag3_percent = $row[tag3]/$total * 100;
   $tag4_percent = $row[tag4]/$total * 100;

   $tag1_percent = floor($tag1_percent);
   $tag2_percent = floor($tag2_percent);
   $tag3_percent = floor($tag3_percent);
   $tag4_percent = floor($tag4_percent);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
			<img src="../img/title_concert.gif">
		</div>
  <div>
  <script>
      function update()
      {
        var vote;
        var length = document.survey_form.composer.length; 

        for (var i=0; i<length; i++)
        {
           if (document.survey_form.composer[i].checked == true)
           {
                vote= document.survey_form.composer[i].value;
                break;
           }
        }

        if (i == length)
        {
           alert("문항을 선택하세요!");
           return;
        }

        window.open("update.php?composer="+vote , "", 
              "left=200, top=200, width=160, height=250, status=no, scrollbars=no");
    }

  	  function result()
    {
         window.open("result.php" , "", 
              "left=200, top=200, width=160, height=250, status=no, scrollbars=no");
    }
</script>
<form name=survey_form method=post > 
    <table border=0 cellspacing=0 cellpdding=0 width='200' align='center'>
      <input type=hidden name=kkk value=100>
        <tr height=40>;
          <td><img src="../img/bbs_poll.gif"></td>
        </tr>
        <tr height=1 bgcolor=#cccccc><td></td></tr>
       <tr height=7><td></td></tr>
       <tr><td><b> ♬ 가장 좋아하는 장르는?</b></td></tr>
       <tr><td><input type=radio name='composer' value='ans1' >1. 힙합</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans2' >2. R&B</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans3' >3. 클래식</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans4' >4. POP</td></tr>
       <tr height=7><td></td></tr>
       <tr height=1 bgcolor=#cccccc><td></td></tr>
       <tr>
       <tr height=7><td></td></tr>
       <tr>
         <td align=middle><img src="../img/b_vote.gif" border="0"  style='cursor:hand' 
            onclick=update()></a>
           <img src="../img/b_result.gif" border="0"  style='cursor:hand' 
               onclick=result()></a></td></tr>
</div>
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 추천음악이 있습니다.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='tag'>태그</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1"><img src="../img/list_title1.gif"></li>
				<li id="list_title2"><img src="../img/list_title2.gif"></li>
				<li id="list_title3"><img src="../img/list_title3.gif"></li>
				<li id="list_title4"><img src="../img/list_title4.gif"></li>
				<li id="list_title5"><img src="../img/list_title5.gif"></li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_album    = $row[album];
  	  $item_name    = $row[name];
	  $item_link    = $row[link];  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_album ?></a></div>
				<div id="list_item3"><?= $item_name ?></div>
				<div id="list_item4"><?= $item_link ?></div>
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
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/write.png"></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
