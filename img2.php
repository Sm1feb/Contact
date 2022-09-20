<?php   //file uploading 
$connect=mysqli_connect("localhost","root","","sanju2") or die("connection failed"); 
	//print_r($_POST);
	//print_r($_FILES);

 if(!empty($_POST['save']))
	{
        $name=$_POST['name'];
        $email=$_REQUEST['email'];
        $mobile=$_REQUEST['mobile'];
		$filename=$_FILES['f']['name'];
		$filepath=$_FILES['f']['tmp_name'];
		$imagename=explode(".",$filename);
		$ext=$imagename[1];
		//print_r($imagename);
		//echo $ext;
		$query="show table  status like 'san3'";
		$result=mysqli_query($connect,$query);
		$row=(mysqli_fetch_assoc($result)); 
		//print_r($row);
		$id=$row['Auto_increment'];
		//echo "$id";
		$newfilename=$id.".".$ext;
    if(!empty($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $query="update san3 set name='$name',email='$email',mobile='$mobile',image='$newfilename' where id=$id";
    }
		
        else{
		$query="insert into san3 (name,email,mobile,image) values('$name','$email','$mobile','$newfilename')";
        }
		if(mysqli_query($connect,$query)) 
		{
			
		   if(move_uploaded_file($filepath,"uploadimg/".$newfilename))
           {
             echo "
                  <script>
                  alert ('Contact Saved');
                  window.location.href='display.php';
                  </script>
                  ";

           }
		}
		else 
		{
			echo "record not inserted";
		}	
	}
	if(!empty($_REQUEST['eid']))
{
    
    $id=$_REQUEST['eid'];
    $query="select * from san3 where id=$id";
    $result=mysqli_query($connect,$query);
    $ro=mysqli_fetch_assoc($result);
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title> New Contact</title>
    <style>
      #uploadbtn{
        font-size:20px;
        color:grey;
        
      }
      #photo{
       height:50px;
        width:50px;
        border-radius:50%;
        border:1px;
        
      }
      .h1{
        margin:auto;
        margin-top:90px;
      }
      body{
        background-size:cover;
       background-image:url('contact.png');
      }
      form{
        margin-top:15px;
        border:none;
      }
      label{
        color:blue;
        text-decoration-line:underline;
        border:none;
      }
      input{
         border:none;
      }
      .container{
        border:none;
      }
      .form-control{
        border:none;
        outline:none;
        
        color:#fff;
        border-bottom:1px solid gray;
      }
      .hello{
        background-color:blue;
        color:white;
        width:70px;
      }
      .main{
        margin:auto;
        margin-left:350px;
      }
      .back{
    background-color:pink;
    color:white;
        }
        .additional li a{
            text-decoration:none;
        }
        .additional{
            list-style:none;
             margin-left:300px;
        }
        .additional li ul{
            list-style:none;
        }
      </style>
      
       <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <a href="display.php">  <input type="button" value="back" class="back"></a>
    <div class="main my-5">
   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSDPTH45IMOu72NyhIy9lJQFCeuGcn0eOad1EWKrHYlUiXvDNpfrv6jSmsOXHiQrzN854&usqp=CAU" class="photo">
<form method="post" enctype="multipart/form-data"> 

	 upload file<input type="file" name="f"/><br/><br/>
    <div class="mb-3 my-5">
          <label  class="form-label">Name</label>
   
          <input type="text" class="form-control"  placeholder="Enter  New Contact's Name" name="name" value ="<?php if(!empty($ro['name']))  echo $ro['name']?>"required> 
          
        </div>
        <div class="field my-5">
          <label  class="form-label">Email</label></span>
          <input type="text"  id="email" class="form-control"  placeholder="Enter New Contact's  Email" name="email" value ="<?php  if(!empty($ro['email'])) echo $ro ['email']?>">
          
    
          
        </div>
        <div class="mb-3 my-5">
          <label  class="form-label">Phone No.</label>
          <input type="text" class="form-control"   placeholder="Enter New Contact's Phone No." name="mobile"  value ="<?php  if(!empty($ro['mobile'])) echo $ro ['mobile']?>"required>
          
        </div>
          
   
	<input type="submit" class="hello" name="save" value="save"/>
   
</form>

    </div>

</body>
</html>