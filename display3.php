<?php
include ('add2.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>CRUD</title>
    <style>
.back{
    background-color:pink;
    color:white;
}
        </style>
</head>
<body>
  <a href="display.php">  <input type="button" value="back" class="back"></a>
    <div class="container my-5" >
      
           <table class="table table-success table-striped">
            <thead>
            <tr>
            
           <th scope="col">Name</th>
           <th scope="col">Email</th>
           <th scope="col">Mobile No.</th>
           <th scope="col">Image</th>
          
           <tbody>



</tbody>
          
</tr>
</thead>
<?php
if(!empty($_REQUEST['did'])){
    $id = $_REQUEST['did'];
    $query="Select * from san3 where id=$id";
    $result=mysqli_query($connection,$query);

}
if($result){
    while($row=mysqli_fetch_assoc($result)){
        ?>



    <table class="table table-success table-striped">
  	<tr>
      <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['mobile']?></td>
  		<td><img src="./uploadimg/<?php echo $row['image']  ?>" width="100"></td>
  		
  	</tr>
  	<?php 
  }
}
  ?>
</tr>
</table>
    </div>
</body>
</html>