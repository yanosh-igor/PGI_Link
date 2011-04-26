<?php 
require_once("indexed_link.php"); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<LINK href="style.css" rel="stylesheet" type="text/css">
<title>Parser lib test page</title> 
<script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<script src="jquery.loader.js"></script>
		<link href="jquery.loader.css" rel="stylesheet" />
			<script>
			$(function(){
				$(window).keypress(function(ev){
					if(ev.charCode == 99)
					{
						$.loader('close');
					}
				});
			
			
				
				$('#submit').click(function(){
					$.loader({
						className:"blue-with-image-2",
						content:''
					});
				});
			});
		</script>
</head> 
<body> 

	
	

<form id="form1" name="form1" method="get" action="index.php"> 
 <h1>Enter URL : </h1>
  <div id="centr"><input name="url" type="text" id="url" value="" />
  <input type="submit"  value="Submit" id="submit" name="Submit"/> <div>
  
</form> 

<?php 
if ((isset($_REQUEST['Submit'])) && ($_REQUEST['url']!='')) {
echo $url=$_REQUEST['url']."/sitemap.xml";  
?> 
<fieldset> 
<legend>Query result</legend> 




<?

$content = file_get_contents_curl($url);
preg_match_all("/<loc>(.*)<\/loc>/isU", $content, $matches, PREG_PATTERN_ORDER);
 echo 'Number of references: '.count($matches[1]).'<br>';
 
 $n=1;
for ($i =  0; $i < count($matches[1]); $i++)
{
    echo "Google indexed = ".google_indexed($matches[1][$i])."<br />";
	//echo $matches[1][$i]."<br>";
	echo $n++."\n";
	//google_indexed($matches[1][$i]);
    //flush();
	file_get_contents_curl($matches[1][$i]);
  
}


?>

</fieldset> 
<?php 

}; 
?> 


</body> 
</html>