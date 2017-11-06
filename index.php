<?php
require 'app/start.php';

$pages=$db->query("
	SELECT id,title, label ,slug
	FROM article
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/home.php';