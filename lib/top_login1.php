<div id="logo"><a href="index.php"><img src="./img/logomusic.gif" border="0"></a></div>
<div id="top_login">
<?
    if(!$userid)
	{
?>
         <a href="./login/login_form.php">LOGIN</a> | <a href="./member/member_form.php">JOIN</a>
<?
	}
	else
	{
?>
		<?=$usernick?> (level:<?=$userlevel?>) | 
		<a href="./login/logout.php">LOGOUT</a> | <a href="./login/member_form_modify.php">SETTING</a>
<?
	}
?>
	 </div>





