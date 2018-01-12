<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>20171122</title>
	</head>
	<body>
		<form method="post" action="upload.php" enctype="multipart/form-data">
			height:<input type="text" name="height" />m<br />
			weight:<input type="text" name="weight" />kg<br />
			<input type="file" name="file" value="file" /><br />
			<input type="submit" value="提交" />
		</form>
	</body>
</html>
<?php
	extract($_POST);
	if(empty($weight)||empty($height))
		echo "please type in all information";
	else{
		$BMI=$weight/$height*$height;
	    echo "height=$height</br>weight=$weight</br>BMI:$BMI</br>";
	    if($_FILES["file"]["error"]>0){
		   echo "empty file";
	    }
	    else {
		    $mimetype = exif_imagetype($_FILES["file"]["tmp_name"]);
		    if ($mimetype == IMAGETYPE_GIF || $mimetype == IMAGETYPE_JPEG || $mimetype == IMAGETYPE_PNG || $mimetype == IMAGETYPE_BMP){
			    move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
			    echo '<img src="upload/'.$_FILES["file"]["name"].'">';
		    }else{
				echo "Wrong file type";
		    }
        }
	}
?>