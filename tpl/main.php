<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery-ui-1.11.4/jquery-ui.css" />
	<script language="javascript" src="/vendor/bower_components/jquery/dist/jquery.js"></script>
	<script language="javascript" src="/js/jquery-ui-1.11.4/jquery-ui.js"></script>
	<title>test</title>
</head>
<body>
	<ul>
		<li><a href="/run/index">list img</a></li>
		<li><a href="/run/view">create img</a></li>
		<li><a href="/book/index">book</a></li>
		<li><a href="/run/type">type file</a></li>
	</ul>
	<?= $content ?>
	<script language="javascript" src="/css/bootstrap/dist/js/bootstrap.js"></script>
	<?php $this->registerCss(); ?>
	<?php $this->registerJs(); ?>
</body>
</html>
