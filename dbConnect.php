
<?php

class DbConnection {
	
	protected $ServerName;
	protected $Username;
	protected $Password;
	protected $DbName;
	protected $con;
	
	
	public function __construct(){
		
		$this->ServerName = "localhost";
		$this->Username = "root";
		$this->Password= "491001";
		$this->DbName= "myDB";
		
		
	}
	
public function conn(){
 
 
 $this->con= mysqli_connect($this->ServerName,$this->Username,$this->Password,$this->DbName);
	

if(mysqli_connect_errno($this->con))
{
	
	echo "DataBase Not Connected Successfully";
	
}
else {
//echo "data";
}


}


}
/*
$connection = new DbConnection();
$connection->conn();
*/
?>


