<?php
// Config 
$username = "myusername";
$password = "mypassword";
$url = "http://127.0.0.1:8080/cgi-bin/video.jpg";

// Use curl to auth and fetch the contents
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

// Rewrite the content type of the script, so that the browser will expect
// an image, instead of a text file
header("Content-Type: image/jpeg");

// Display the contents that we fetched earlier
echo($output);
