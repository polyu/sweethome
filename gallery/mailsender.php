
<?php 
include_once "config.inc.php";
class MailSender
{
	static function sendPhotoCommentMail($mailto, $subject, $message,$filename) 
	{
	    $content = chunk_split(base64_encode(file_get_contents($filename)));
	    $uid = md5(uniqid(time()));
	    $header = "From: ".Config::$MAILNAME." <".Config::$LOCALMAIL.">\r\n";
	    $header .= "Reply-To: ".Config::$LOCALMAIL."\r\n";
	    $header .= "MIME-Version: 1.0\r\n";
	    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	    $header .= "This is a multi-part message in MIME format.\r\n";
	    $header .= "--".$uid."\r\n";
	    $header .= "Content-type:text/plain; charset=utf-8\r\n";
	    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	    $header .= $message."\r\n\r\n";
	    $header .= "--".$uid."\r\n";
	    $header .= "Content-Type: application/octet-stream; name=\"".'beautiful.jpg'."\"\r\n"; // use different content types here
	    $header .= "Content-Transfer-Encoding: base64\r\n";
	    $header .= "Content-Disposition: attachment; filename=\"".'beautiful.jpg'."\"\r\n\r\n";
	    $header .= $content."\r\n\r\n";
	    $header .= "--".$uid."--";
	    mail($mailto, $subject, "", $header);
	}
	static function sendPlainMail($mailto, $subject, $message)
	{
		$uid = md5(uniqid(time()));
		$header = "From: ".Config::$MAILNAME." <".Config::$LOCALMAIL.">\r\n";
	    $header .= "Reply-To: ".Config::$LOCALMAIL."\r\n";
	    $header .= "MIME-Version: 1.0\r\n";
	    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	    $header .= "This is a multi-part message in MIME format.\r\n";
	    $header .= "--".$uid."\r\n";
	    $header .= "Content-type:text/plain; charset=utf-8\r\n";
	    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	    $header .= $message."\r\n\r\n";
	    $header .= "--".$uid."--";
	    mail($mailto, $subject, "", $header);
	}
}


	
