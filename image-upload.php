<input type="file" name="image"> 
<?php 
	$image = $_FILES['image']['name'];
	$arr = explode('.', $image);
	$extention = end($arr);
	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	if (in_array($extention, $format)) {
		if ($_FILES['image']['size'] > 9000000 ) {
			echo "not allow";
		}else{
			$img_name = strtolower(str_replace(' ', '-', $name));
			$image_name = $id.'.'.$img_name.'.'.$extention;
			
		$scount = "SELECT * FROM users WHERE id = $id";
	    $sq = mysqli_query($conn, $scount);
	    $assoc = mysqli_fetch_assoc($sq);
	    if (file_exists('upload/'.assoc['photo'])) {
	    	unlink('upload/'.assoc['photo']);
	    }
			$uploadFolder = 'upload/'.$image_name;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
			$update = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', ocapation = '$ocapation', image = '$image_name' ";
			$uq = mysqli_query($conn, $update);
			if ($uq) {
				header('location:profile.php');
			}else{
				echo "Unsuccessfull";
			}

		}
	}
