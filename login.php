<?php 
session_start();
$_SESSION['loginstatus']="";
function makeconnection()
{
	$cn=mysqli_connect("localhost","root","","db");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to mysqli:".mysqli_connect_error();
	}
	return $cn;
}
$cn=mysqli_connect("localhost","root","","db");
if(isset($_POST["submit"]))
{
	$cn=makeconnection();
	$s="select * from login_info where user_id='" . $_POST["t1"] . "' and password='" . $_POST["t2"] ."'";
	
	$q=mysqli_query($cn,$s);
$r=mysqli_num_rows($q);
   $data=mysqli_fetch_array($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["User_id"]= $_POST["t1"];
		$_SESSION["user"]=$data[2];
		$_SESSION['loginstatus']="yes";
        //echo ("<script>alert('". $_SESSION["user"]. "');</script>");
		header("location:newpage.html");
       
        
	}
	else
	{
	echo "<script>alert('Invalid User Name or Password');</script>";
    }
}
?>