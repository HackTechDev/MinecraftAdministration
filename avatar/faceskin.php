<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["username"])) {
     $username = "";
   } else {
     $username = test_input($_POST["username"]);
  }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Avatar name:<br/>
  <input name="username" cols="40">
   <br><br>
   <input type="submit" name="submit" value="Show the avatar">
</form>

Face:<br/>
<br/>
	<img src='/wp-content/plugins/MinecraftAdministration/avatar/face.php?u=<?php echo $username; ?>&s=96&v=f' />&nbsp;
	<img src='/wp-content/plugins/MinecraftAdministration/avatar/face.php?u=<?php echo $username; ?>&s=96&v=r' />&nbsp;
	<img src='/wp-content/plugins/MinecraftAdministration/avatar/face.php?u=<?php echo $username; ?>&s=96&v=b' />&nbsp;
	<img src='/wp-content/plugins/MinecraftAdministration/avatar/face.php?u=<?php echo $username; ?>&s=96&v=l' />&nbsp;
<br/><br/>
Skin:<br/>
	<img src='/wp-content/plugins/MinecraftAdministration/avatar/skin.php?u=<?php echo $username; ?>&s=500' />

