<?php
session_start();
require_once('dbConnect.php');
class S_login extends DbConnection {
public $LoginId;
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
$sql = "SELECT * FROM students WHERE ID=('$this->LoginId')&& PASSWORD=('$this->LoginPassword')";
	
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
			header("Location:Student_Module.html");
	}
	else { 
	
echo" Please Enter Valid ID and Password <br> "."<a href=login.html>Click here </a>"." to Login Again";
	}
}
}
// http://download.oracle.com/otn/linux/oracle11g/xe/oracle-xe-11.2.0-1.0.x86_64.rpm.zip
$login = new S_login();
$login->callData();
$_SESSION['CurrentID']=$login->LoginId;
//header("Location:Student_Module.html");

?>