<?php
$sever="localhost";
$user="root";
$pass="";
$database="db";
$conn=mysqli_connect($sever,$user,$pass,$database);

if (!$conn) {
    die("conetion is fail".mysqli_connet_error());
}else{
    echo"con is pass";
}
if (isset($_POST["email"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];

    $insert="insert into ins(id,Email,Password) values('','$email','$password')";
    $builder=mysqli_query($conn,$insert);
    if ($builder) {
        echo "inserted";
        header("location:insert.php");
    }else{
        echo "insert nahi howa";
    }
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1>Data Insert Karen</h1>
    <form action="insert.php" method="POST">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="Enter Your Password">
</div>
<button type="submit" class="btn btn-success">submit</button>
</form>
</div>
<div class="insert">
  <h1>Insert ka Data</h1>
<table class="table table-striped">
  <thead>
   
    <tr>
      <th scope="col"> ID </th>
      <th scope="col">Email</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $selectshow="select * from ins";
  $result=mysqli_query($conn,$selectshow);
   
  
  $counter=1;
  while ($item=mysqli_fetch_assoc($result) ) {
    
  
  echo"<tr>";
  echo"<th scope='row'>".$counter++."</th>";
  echo"<td>".$item["Email"]."</td>";
  echo"<td>".$item["Password"]."</td>";
  echo"<td><div class='button'>
<button type='submit' class='btn btn-success edit' id=".$item["id"].">update</button>
<button type='submit' class='btn btn-danger delete' id=".$item ["id"].">delete</button>
</div>
</td>";
  

  echo"  </tr>";
}

?>

</tbody>
</table>
</div>


</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>