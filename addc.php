<?php 
require_once "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    // collect value of input field
    $c1 = $_REQUEST['cmm'];
  
    if (empty($c1)) {
        echo "write a comment !!!";
    } else {
        echo $c1;
    }

$sql="INSERT INTO comm (id,comts)values (1,'$c1')";
if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
header("Location: welcome.php");
exit();

mysqli_close($link);

} ?>