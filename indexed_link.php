<?php 
//global variable 
$alexa_backlink=0; 
$alexa_reach=0; 
$techno_inblogs=0; 
$techno_inlinks=0; 
$techno_update=''; 


//get google indexed page 
function google_indexed($uri) 
{ 
  $uri = trim(preg_replace('/(http:\/\/)/', '', $uri)); //Delete "http" before string
	 $uri = trim(preg_replace('/http/i', '', $uri)); 
    $url = 'http://www.google.com/search?hl=en&lr=&ie=UTF-8&q=site:'.$uri.'&filter=0'; 
    $v = file_get_contents_curl($url);

$findme   = 'did not match any documents';	
$pos = strpos($v, $findme);
	
	
	if ($pos) {
  return  "Congratulative!!!! This link didn't indexed";
} //else {
  //  return "This link is indexed";
   //  " and exists at position $pos";
//}
   /* preg_match('/of about \<b\>(.*?)\<\/b\>/si',$v,$r); 
    preg_match('/of \<b\>(.*?)\<\/b\>/si',$v,$s); 
if ($s[1]!=0) { 
        return $s[1]; 
    } else { 
        return ($r[1]) ? $r[1] : '0'; 
    } */
	//return $v;

} 


function file_get_contents_curl($url) { 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser. 
    curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); 
    $data = curl_exec($ch); 
    curl_close($ch); 

    return $data; 
} 
?>




