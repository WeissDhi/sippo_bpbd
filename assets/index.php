<!DOCTYPE html>
<html>

<head>
	<title>403 Forbidden</title>
</head>

<body>
	<?php
	/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '404';
	//header('Location: http://'.$host.$uri.'/'.$extra);
	echo "<script type='text/javascript'>window.location.href = 'https://".$host.$uri."/".$extra."'</script>";
	exit;
	?>
</body>

</html>