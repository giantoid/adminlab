<?php
// Program to display URL of current page. 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $current_url = "https"; 
}else{
    $current_url = "http";
} 
  
// Here append the common URL characters. 
$current_url .= "://"; 
  
// Append the host(domain name, ip) to the URL. 
$current_url .= $_SERVER['HTTP_HOST']; 
  
// Append the requested resource location to the URL 
$current_url .= $_SERVER['REQUEST_URI']; 
      
// Print the link 
// echo $current_url; 

?>