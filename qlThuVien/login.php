<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
	#container{
		width:250px;
		height:220px;
		padding-left:10px;
		border:solid 1px black
	}
</style>
<div id="container">
	<h4>Login</h4>
    <form action="checkLogin.php" method="post">
    	Username: </br>
        <input type="text" name="txID" value="<?php if(isset($_GET["txID"])) echo $_GET["txID"]; ?>" required> </br>
        Password: </br>
        <input type="password" name="txPass" value="<?php if(isset($_GET["txPass"])) echo $_GET["txPass"]; ?>" required>
        <div style="margin-top:20px"> 
            <button type="submit" class="btn btn-info">Login</button>
        </div>
    </form>
</div>
<script>
	var check=<?php if(isset($_SESSION["loginFail"])) echo $_SESSION["loginFail"]; else echo 0; ?>;
	if(check==1)
		alert("Nhap sai password");
	else if(check==2)
		alert("Ten dang nhap khong ton tai");
	else if (check==3)
		alert("Tai khoan dang bi khoa");
</script>