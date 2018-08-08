<?php
require('dbConnect.php');

class S_login extends DbConnection {

protected $LoginId;
protected $LoginPassword;
protected $Logid;
protected $Logpwd;

public function __construct(){
	
	$this->LoginId = $_POST['id'];
	$this->LoginPassword = $_POST['pwd'];
	parent::__construct();
	
}





public function callData(){
	
	parent::conn();
	if(isset ($this->LoginId) && ($this->LoginPassword)){
$sql = "SELECT * FROM admin WHERE ID=('$this->LoginId')&& PASSWORD=('$this->LoginPassword')";
	
$result = mysqli_query($this->con,$sql);

if($result === FALSE) { 
  echo "error in query";  die(mysql_error()); // TODO: better error handling
}

while($row = mysqli_fetch_array($result))
{
	$this->Logid = $row['ID'];
	$this->Logpwd = $row['PASSWORD'];
	
	echo $this->Logid."<br>";
}
if ($this->LoginId == $this->Logid &&  $this->LoginPassword == $this->Logpwd){
	//		header("Location:Admin_module.html");
	}
	else { 
	
echo" Please Enter Valid ID and Password <br> "."<a href=A_login.html>Click here </a>"." to Login Again";
	}

	}
	else
		echo" Please Enter Valid ID and Password <br> "."<a href=A_login.html>Click here </a>"." to Login Again";

}



}



$login = new S_login();
$login->callData();
header("Location:Admin_module.html");
?>