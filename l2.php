<?php require_once "config.php";

//for counting likes
if ($result = mysqli_query($link, "SELECT dislikes FROM post WHERE id = 1"))
{
while ($row = $result->fetch_assoc()) {
    $dislikes= $row['dislikes'];
} 
}
$dislikes= $dislikes + 1;
$res = mysqli_query($link, "UPDATE post SET dislikes= $dislikes where id = 1");

if ($res = mysqli_query($link, "SELECT dislikes FROM post WHERE id = 1"))
{
while ($row = $res->fetch_assoc()) {
    $dislikes= $row['dislikes'];
} 
}
header("Location: welcome.php");
exit();
?>
