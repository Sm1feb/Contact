<?php
include ('add2.php');


if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
        
		$query="delete from san3 where id=$id";
		
		if(mysqli_query($connection,$query))
		{
			echo "
                  <script>
                  alert ('Contact Deleted');
                 
                  </script>
                  ";
		}
		else
		{
			echo "record not deleted";
		}
	}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
    a{
        text-decoration:none;
        color:red;
        
    }
    th{
        
    }
        </style>
    <title>CRUD</title>
</head>
<body>
    <div class="container my-5 ">
        <button class="btn btn-primary my-5"><a href="img2.php" class="text-light"> Add New Contact</a>
           </button>
           <table class="table table-success table-striped">
            <thead>
            <tr>
            
           <th scope="col">Name</th>
           <td>Images</td>
		   <td>Delete</td>
          <td> Edit</td>
</tr>
</thead>

<?php 
$connect=mysqli_connect("localhost","root","","sanju2") or die("connection failed"); 
	$query="select * from san3";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result))
		{		
?>
    <table class="table table-success table-striped">
  	<tr>
      <td><a href="display3.php?did=<?php echo $row['id'] ?>"><?php echo $row['name']?></a></td>
  		<td><img src="./uploadimg/<?php echo $row['image']  ?>" width="100"></td>
  		<td><a href="display.php?did=<?php echo $row['id'] ?>">delete</td>
  		<td><a href="img2.php?eid=<?php echo $row['id'] ?>">edit</td>
  	</tr>
  	<?php 
  }
  ?>
  </table>
  </table>
</table>
    </div>
</body>
</html>