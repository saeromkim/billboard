<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>WELCOME:::BILLBOARDTALK</title>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/common_new.css?ver=1">
</head>

<body>
<EMBED src="Olly Murs- Can't Say No.mp3" autostart="true" loop="true" hidden="false" width="100" height="30">
<div id="wrap">
<div id="header">
  <?  include "./lib/top_login1.php"; ?>
</div> <!-- end of header -->

<div id="menu">
 <? include "./lib/top_menu1.php"; ?>
</div> <!-- end of menu --> 

<div id="content">
<div id="main_img"><img src="./img/mainimg.jpg"></div>

</div> <!-- end of wrap -->

<!--최근 글 불러오기 시작-->
<? include "./lib/func.php"; ?>

<div id="latest">
<div id="latest1">
<div id="title_latest1"><img src="./img/title_news.gif"></div>
<div class="latest_box">
 <? latest_article("news",10,30); ?>
</div>
</div>
<div id="latest2">
<div id="title_latest2"><img src="./img/title_mtalk.gif"></div>
<div class="latest_box">
 <? latest_article("mtalk",10,30); ?>
</div>



</div>
</div>

</div>
</div>

</body>
</html>




