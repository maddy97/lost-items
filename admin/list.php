<?php

require '../app/start.php';
$pages =$db->query("
	SELECT id,label,title,slug
	FROM article
	ORDER BY created DESC
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/list.php';