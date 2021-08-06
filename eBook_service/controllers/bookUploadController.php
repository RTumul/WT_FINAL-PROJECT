<?php
    session_start();
	$_SESSION['message'] = "";
	require_once "db_connect.php";
	$bname="";
	$err_bname="";
	$wname = "";
	$err_wname="";
	$pri="";
	$err_pri="";
	$email="";
	$err_email="";
	
	$number="";
	$err_number="";
	$address="";
	$err_address="";
	
	$image = "";
	$pperror = "";
	$uname = "";
	$err_uname="";
	$usname = $_SESSION['uname'];
	
	
	$hasError = true;
	
	//Insert User Function
    function insertBook($bname,$wname,$pri,$email,$phone,$uname,$address,$image)
    {
        $query = "insert into books_info values(NULL,'$bname','$wname','$pri','$email','$phone','$uname','$address','$image')";
		//echo $query;
        $result = execute($query);
		return $result;
    }
	
	
	
	//if($_SERVER["REQUEST_METHOD"] == "POST")
	if(isset($_POST["Register"]))
	{
		if(empty($_POST["bname"]))
         {
             $err_bname="[Name Requires]";
			 $hasError=false;
         }
         else
         {
             $bname=htmlspecialchars($_POST["bname"]);
         }
		 if(empty($_POST["wname"]))
		 {
			 $err_wname="[Writer Required]";
			 $hasError=false;
		 }
		 
		 else
		 {
			 $wname=htmlspecialchars($_POST["wname"]);
		 }
		if(empty($_POST["pri"]))
		 {
			 $err_pri="[price Required]";
			 $hasError=false;
		 }
         elseif(!is_numeric($_POST["pri"]))
         {
             $err_number="[number should only contain neumeric value]";
			 $hasError=false;
         }		
		else{
			 $pri=htmlspecialchars($_POST["pri"]);
		 }
		
       
		if(empty($_POST["email"]))
        {
            $err_email="[email required]";
			$hasError=false;

        }
        elseif(!strpos($_POST["email"],"@"))
        {
            $err_email="[email must contain '@' sign]";
			$hasError=false;
        }
        else
        {
            $pos_at  = strpos($_POST["email"],"@");
            if(!strpos($_POST["email"],".",$pos_at))
            {
                $err_email="[at least one dot needed after '@' sign]";
				$hasError=false;
            }
            else
            {
                $email=htmlspecialchars($_POST["email"]);
            }
             
         }
		if(empty($_POST["number"]))
         {
             $err_number="[Number Requires]";
			 $hasError=false;
         }
         elseif(!is_numeric($_POST["number"]))
         {
             $err_number="[number should only contain neumeric value]";
			 $hasError=false;
         }
         else
         {
             $number=htmlspecialchars($_POST["number"]);
         }
		
		if(empty($_POST["address"]))
         {
             $err_address="[Address Requires]";
			 $hasError=false;
         }
         else
         {
             $address=htmlspecialchars($_POST["address"]);
         }
         
		$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allow = array('jpg','jpeg','png');
	if(!empty($fileName)){
	if (in_array($fileActualExt, $allow)) {
		if($fileError ===0){
			if($fileSize < 4194304){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDes = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDes);
				$ppm = "Image sucessfully uploaded";
				$image = $fileDes;
			}
			else{
				$pperror = "File size too large (Maximum file size- 4MB)";
			}
		}
		else{
			$pperror = "There was an error uploading your file!";
		}
	}
	else{
		$pperror = "Only images are allowed (jpeg, jpg, png)";
	}
}
	else{
		$pperror = "Please Select an image";
	}
		
		 
		
		
		
		 //if(!$hasError) 
	if(empty($err_bnumber) && empty($err_email) && empty($err_pri)&& empty($err_wname) && empty($err_name) && empty($err_address))
        {
            
            if(isset($_POST["Register"]))
            {
                $result = insertBook($bname,$wname,$pri,$email,$number,$usname,$address,$image);
				
				if($result){
					$_SESSION['message'] = "Successfully Uploaded!";
				}else{
					$_SESSION['message'] = "Failed to upload!";
				}
                
            }
        }else{
			$_SESSION['message'] = "There are one or many error!";
		}
		
		
		
		
	
		
		// echo "Name: ". $_POST["name"]."<br>";
		// echo "User Name: ". $_POST["wname"]."<br>";
		// echo "priword: ". $_POST["pri"]."<br>";
		// echo "Confirmed priword: ". $_POST["conpri"]."<br>";
		// echo "Email: ". $_POST["email"]."<br>";
		// echo "Number: ". $_POST["number"]."<br>";
		// echo "Gender: ". $gender."<br>";
		// echo "Date of Birth: ". $birthday."<br>";
		
		
	}
	
	

?>