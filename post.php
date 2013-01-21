<?php
require_once("twitteroauth.php");

/*--------- Settings ---------*/

// Directory
$dir = "./img/";

// OAuth keys
$consumer_key = "";
$consumer_secret = "";
$access_token = "";
$access_token_secret = "";

/*----------------------------*/


/* directory */
$files = scandir($dir);
$img_file = $files[mt_rand(0, count($files)-1)];

/* image */
$img_path = "$dir$img_file"; 
$img_bin = fread(fopen($img_path, "r"), filesize($img_path));
$img_str = base64_encode($img_bin);

/* update */
$to = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
$req = $to->OAuthRequest("http://api.twitter.com/1.1/account/update_profile_image.json", "POST", array("image"=>$img_str));

/* result */
echo $req."\n";

?>

