<?php require_once "config.php";

//for counting likes
if ($result = mysqli_query($link, "SELECT likes FROM post WHERE id = 1"))
{
while ($row = $result->fetch_assoc()) {
    $likes = $row['likes'];
} 
}
$likes = $likes + 1;
$res = mysqli_query($link, "UPDATE post SET likes = $likes where id = 1");

if ($res = mysqli_query($link, "SELECT likes FROM post WHERE id = 1"))
{
while ($row = $res->fetch_assoc()) {
    $likes = $row['likes'];
} 
}
header("Location: welcome.php");
exit();
?>
