<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
$script = "pillar.py";
$scriptName = "/home/minecraft/MINECRAFT/MCPI/mcdev/pillar.py";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["script"])) {
     $script = "";
   } else {
     $script = test_input($_POST["script"]);
	$param1 = "first";
	$param2 = "second";
	$param3 = "third";


	echo "<br/>" . $script . "<br/>";

	$command = "python " . $scriptName;
	$command .= " $param1 $param2 $param3 2>&1";


	$pid = popen( $command,"r");

	while( !feof( $pid ) ) {
	 echo fread($pid, 256);
	 flush();
	 ob_flush();
	 usleep(100000);
	}
	pclose($pid);

   }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Python script form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Script: <?php echo $scriptName; ?> <br/>
  <textarea name="script" rows="5" cols="40"><?php echo $script;?></textarea>
   <br><br>
   <input type="submit" name="submit" value="Execute the code">
</form>

<?php
echo "<h2>Result:</h2>";
echo "<br>";
echo $script;
echo "<br>";
?>

</body>
</html>
