<?php
include_once 'config.inc.php';
include_once 'mailsender.php';
header("Content-type: application/json; charset=utf-8");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$f = new phpFlickr(Config::$FLICKRKEY,Config::$FLICKRSEC,true);
	$f->setToken(Config::$FILCKRTOKEN);
	$f->enableCache("fs", "FlickrCache",120);
	$commentData=$f->photos_comments_getList($id,null,null,1,500,null);

		$commentDataArray=$commentData['comments'];
		$commentInlineDataArray=$commentDataArray['comment'];
		if(isset($commentInlineDataArray))
		{
			echo json_encode($commentInlineDataArray);
		}
}
else if(isset($_POST['id'])&&isset($_POST['text']))
{
	$id=$_POST['id'];
	$text=$_POST['text'];
	$f = new phpFlickr(Config::$FLICKRKEY,Config::$FLICKRSEC,true);
	$f->setToken(Config::$FILCKRTOKEN);
	$photoUrlArray=($f->photos_getSizes($id));
	$photoUrl=$photoUrlArray[0]['source'];
	if($f->photos_comments_addComment($id, $text))
	{
		$r=array('success'=>1);
		echo json_encode($r);
		$title="主人，您有一个吐槽";
		$content="桂英主人，嘉琪小弟：\n您好,您有一个吐槽,请查收。\n\n".$text."\n\n 地址:".Config::$WEBSITEADDRESS."photo.php?id=".$id;
		MailSender::sendPhotoCommentMail(Config::$MAILOFWEN,$title,$content,$photoUrl);
		MailSender::sendPhotoCommentMail(Config::$MAILOFYING,$title,$content,$photoUrl);
	}
	else
	{
		$r=array('success'=>0);
		echo json_encode($r);
	}
}
else 
{
	echo "fail";
}

