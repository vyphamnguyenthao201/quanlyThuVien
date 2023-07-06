<?php
	session_start();
	if(isset($_POST["txID"]) && isset($_POST["txPass"])){
		include("./connection.php");
		$conn=new Database();
		$conn=$conn->conn;
		$id=$_POST["txID"];
		$pass=$_POST["txPass"];
		$query=mysqli_query($conn, "Select * From nhanvien");
		while($row=mysqli_fetch_assoc($query))
			$list[]=$row;
		$rowcount=mysqli_num_rows($query);
		for($i=0;$i<$rowcount;$i++)
			if($list[$i]["TenDangNhap"]==$id){
				if($list[$i]["MatKhau"]==$pass){
					if($list[$i]["TrangThai"]==1){
						$_SESSION['curUser']=$list[$i]["MaNhanVien"];
						$_SESSION['Fullname']=$list[$i]["HoTen"];
						$_SESSION['Permission']=$list[$i]["ChucVu"];
						header('Location: ./index.php');
						return;
					}
					else{
						$_SESSION["loginFail"]=3;	//Tai khoan bi khoa
						header("Location: ./login.php?txID=$id&txPass=$pass");
						return;
					}
				}
				else{
					$_SESSION["loginFail"]=1;	//Sai mat khau
					header("Location: ./login.php?txID=$id&txPass=$pass");
					return;
				}
			}
		$_SESSION["loginFail"]=2;	//Tai khoan khong ton tai
		header("Location: ./login.php?txID=$id&txPass=$pass");
	}
?>