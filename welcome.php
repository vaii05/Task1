<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

//for counting likes
if ($result = mysqli_query($link, "SELECT likes FROM post WHERE id = 1"))
{
while ($row = $result->fetch_assoc()) {
    $likes = $row['likes'];
} 
}

//for dislikes
if ($result = mysqli_query($link, "SELECT dislikes FROM post WHERE id = 1"))
{
while ($row = $result->fetch_assoc()) {
    $dislikes = $row['dislikes'];
} 
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
div {
  width: 300px;
  height: 240px;
  padding: 50px;
  border-style: groove;
border-radius : 5px;
border-width: thick;
margin-left:50px;
}
.tab2{
margin-left: 300px;
}
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<form action="addc.php" method="POST">
<table align="center">
<tr>
    <td><h4 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h4>
    </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p></td>
</tr>
</table>
<hr>
<table class="tab2"><tr><td align="center" margin-left="500">
<img src = "Paintings/1.jpg" alt = "Test Image" width = "280" height = "320"/><br><br>
<?php
echo "$likes";
?>&nbsp;
<input type ="image" formaction="l1.php" src="imgs/like.png" alt="Submit" width="30" height="30" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
echo "$dislikes";
?>&nbsp;
<input type="image" formaction="l2.php" src="imgs/dislike.jpg" alt="Submit" width="30" height="30">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="image" formaction="addc.php" src="imgs/com.png" alt="Submit" width="30" height="30">

<br>
<label font-size="14px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
Add a Comment</label>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="text" width="800" name="cmm">
<input type="submit" Value=">" alt="Submit" width="24" height="24">
</td>
<td><h6>All comments...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><div>
<?php
if ($result = mysqli_query($link, "SELECT comts FROM comm WHERE id = 1"))
{
while ($row = $result->fetch_array()) {
    $a1 = $row['comts'];
	echo $a1."<br>";
} }
?>
</div></td>
<tr>
</table>
<br>

</form>
</body>
</html>

