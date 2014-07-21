<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
setcookie("SessionID", time()+3600*24);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<title>Search result:</title>
<style type="text/css">
<!--
body,td,th {
color: #FFFFFF;
}
body {
background-color: #000000;
}
-->
</style></head>
<body>
<span>Search result  :</span>&nbsp;<strong><?php echo $_REQUEST['search_text']; ?></strong>&nbsp;
</body>
</html>
