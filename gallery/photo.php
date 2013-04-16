<?php 
include_once 'config.inc.php';
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$f = new phpFlickr(Config::$FLICKRKEY,Config::$FLICKRSEC,true);
	$f->setToken(Config::$FILCKRTOKEN);
	$f->enableCache("fs", "FlickrCache",120);
	$photoUrlArray=($f->photos_getSizes($id));
	$totalCount=count($photoUrlArray)-1;
	$photoUrl=$photoUrlArray[$totalCount]['source'];
}
else 
{
	exit(-1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Hello Wind Gallery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.gritter.css" />
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="js/jquery.gritter.js"></script>
		
        <style type="text/css">
			h1{
				font-size:50px;
				margin:50px;
				color:#333;
			}
			h1 a{
				text-transform:uppercase;
				text-decoration:none;
			}
			span.reference{
				font-family:Arial;
				position:fixed;
				right:10px;
				top:10px;
				font-size:15px;
			}
			span.reference a{
				color:#fff;
				text-transform:uppercase;
				text-decoration:none;
			}
		</style>
    </head>

    <body>
		<h1><a href="/gallery.php">Take Me Home</a></h1>
        <div>
            <span class="reference">
                <a href="#" id="sendBlabla">点这里发表吐槽</a>
            </span>
           
		</div>

        <!-- The JavaScript -->
		
        <script type="text/javascript">
       		
            $(function() {
            
				
				var gritterArray =new Array();
				var currentImageUrl="<?php echo $photoUrl;?>";
				var currentImageId="<?php echo $id;?>";
                setupBackGround(currentImageUrl);
				showCommentById(currentImageId);
				//Function to control background
				function setupBackGround(photoUrl)
				{
					$.backstretch(photoUrl);
				}
				
				//Bind the send blablabla
				$("#sendBlabla").click(function(){
					if(currentImageId==-1)
					{
						return false;
					}
					var resultSentence=prompt("有什么要吐槽啊?", "桂英好漂亮，嘉琪好帅");
					if(resultSentence==undefined||resultSentence==null||resultSentence=='')
					{
						return false;
					}
					$.post("comment.php",{id:currentImageId,text:resultSentence}, function(result)
					 {
					 	
						if(result['success']==1)
						{
							$.gritter.add({
								title: "吐槽成功鸟!",
								text: "吐槽值达到255",
								time: '5000'
							});
							$.gritter.add({
								title: "吐槽名句!",
								text: resultSentence,
								time: '60000'
							});
						}
						else
						{
							$.gritter.add({
								title: "吐槽失败!",
								text: "哇靠，找嘉琪解决问题",
								time: '5000'
							});
						}

						
					 });
					
				});
				
				//Remove all comment
				function removeComment()
				{
					var _tlength=gritterArray.length;
					var _t=0;
					for(_t=0;_t<_tlength;_t++)
					{
						var _u=gritterArray.pop();
						$.gritter.remove(_u, {
							fade: true,
							speed: 'slow'
						});
						
					}
				}
				//Show the comment
				function showCommentById(pid)
				{
				     removeComment();
					 $.get("comment.php",{id:pid}, function(result)
					 {
					 	
						for(commentkey in result)
						{
							var commentText=(result[commentkey]["_content"]);
							
							var commentTime=(result[commentkey]["datecreate"]);
							var commentTimeText='吐槽于:'+new Date(commentTime*1000).toLocaleString();
							var uId=$.gritter.add({
								title: commentTimeText,
								text: commentText,
								time: '60000'
							});
							gritterArray.push(uId);

						}
					 });
				}
				
				
					
						

            });
        </script>
    </body>
</html>