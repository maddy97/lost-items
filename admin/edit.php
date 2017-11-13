<?php

require '../app/start.php';

if(!empty($_POST)){
	$id=$_POST['id'];
	$label=$_POST['label'];
	$title=$_POST['title'];
	$slug=$_POST['slug'];
	$body=$_POST['body'];

	$updateArticle=$db->prepare("
		UPDATE article
		SET
			label=:label,
			title=:title,
			slug=:slug,
			body=:body,
			updated=NOW()
		WHERE id=:id
		");

	$updateArticle->execute([
		'id'=>$id,
		'title'=>$title,
		'label'=>$label,
		'body'=>$body,
		'slug'=>$slug,
		]);
		
	header('Location: '.BASE_URL .'/admin/list.php');
}

if(!isset($_GET['id'])){
	header('Location:' .  BASE_URL .'/admin/list.php');
	die();
}
$page=$db->prepare("

SELECT id,title,label,body,slug
FROM article
WHERE id=:id
	");
$page->execute(['id'=>$_GET['id']]);
	$page=$page->fetch(PDO::FETCH_ASSOC);
	

require VIEW_ROOT . '/admin/edit.php';