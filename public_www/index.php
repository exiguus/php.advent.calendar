<?php
require_once('app/config.php');
// check auth via post
if(isset($_POST)) {
// check if redirected from an internal url
	if(isset($_POST['hash'])) {
		$hash = '#'.strstr($_POST['hash'],'/');
	}
	else
	{
		$hash = "";
	}
	// check user is authing and auth is ok
	if (isset($_POST['auth']) && md5($_POST['auth']) === $config['webauthPassword'])
	{
		// check if redirect was from internal url #/auth else redirect to internal url
		if ($hash == '#/auth') {
			$targetUrl = $config['url'];
		}
		else {
			$targetUrl = $config['url'].$hash;
		}
		// redirect
		header('Location: '.$targetUrl);
		setcookie('cat',$config['webauthPassword'],time() + (86400 * 24 * 30)); // 86400 = 1 day
	}
}
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
?>
<!DOCTYPE html>
<html lang="<?php echo $config['lang']; ?>">
<head>
	<?php include('app/view/head.php'); ?>
</head>
<body id="presentation" class="impress-not-supported">
	<header>
		<?php include('app/view/header.php'); ?>
	</header>
	<main>
		<!-- start impress -->
		<div class="content" id="impress">
<?php
// if user auth successfull or has authed before
if (isset($_COOKIE['cat']) && $_COOKIE['cat'] === $config['webauthPassword'] && !isset($_POST['auth']))
{
	// welcome teaser
	include('app/view/welcome.php');
	// advent items
	include('app/view/items.php');
	// overview teaser
	include('app/view/overview.php');
}
// not authenticated
else
{
	include('app/view/auth.php');
}
?>
		</div>
		<!-- end #impress -->
	</main>
	<footer>
		<?php require_once('app/view/footer.php'); ?>
	</footer>
</body>
</html>
