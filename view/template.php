<?php /* -*- mode: html; -*- */ ?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/style.css" type="text/css" />
<?php echo select('head/*', "\t"); ?>
</head>
<body>
	<div id="header">
		<h1>MVC test</h1>
	</div>

	<div id="menu">
		<ul>
			<li><a href="/main/sample/Hello/World">Sample 1</a></li>
			<li><a href="/main/sample/Herp/Derp/Blorp">Sample 2</a></li>
			<li><a href="/main/description">Description</a></li>
			<li><a href="#">Fred</a></li>
			<li><a href="#">Barney</a></li>
			<li><a href="#">Wilma</a></li>
		</ul>
		<hr>
		<ul>
			<li><a href="/src/index.phps">index.php</a></li>
			<li><a href="/src/controller.phps">controller.php</a></li>
			<li><a href="/src/main.phps">main.php</a></li>
			<li><a href="/src/template.phps">template.php</a></li>
			<li><a href="/src/foo.phps">foo.php</a></li>
			<li><a href="/src/description.phps">description.php</a></li>
		</ul>
	</div>

	<div id="content">
<?php echo select('body/*', "\t\t"); ?>
	</div>

	<div id="footer">
		<p>derp</p>
	</div>
</body>
</html>
