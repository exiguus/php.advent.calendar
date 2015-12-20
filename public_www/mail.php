<?php
require_once('app/config.php');
header("Content-Type:text/plain");
// for http access
if (isset($_GET['auth']))
{
	$auth = (int)$_GET['auth'];
}
else
{
	$auth = "";
}
// for shell access
if (!isset($_SERVER['HTTP_HOST']) OR $_SERVER['HTTP_HOST'] == 'localhost')
{
	$auth = $mail['mailauth'];
}
if ($auth === $mail['mailauth'])
{
	if(mail($mail['toAddress'], $mail['subject'], $mail['message'], $mail['mime'].$mail['content-type']." \r\nFrom: ".$mail['fromAddress']))
	{
		echo "Success: Mail sent";
	}
	else
	{
		echo "Error: Mail send failure - message not sent";
	}
}
else
{
	echo "Error: Mail send failure - auth error";
}
?>
