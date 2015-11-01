<! DOCTYPE HTML>
<?php
if(isset($_POST['abc']))
echo $_POST['abc'];
echo "<br>";
if(isset($_POST['ord']))
echo $_POST['ord'];
?>
<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<label> Abscissa</label><br>
<input type="text" name="abc"/><br>  
<label> Ordinate</label><br>
<input type="text" name="ord"><br><br>
<button>GO</button>
</form>
</body>

</html>


