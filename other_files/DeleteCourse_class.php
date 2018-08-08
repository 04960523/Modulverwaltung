<?php
require("dbConnect.php");
session_start();
class DeleteCourse extends DbConnection
{
	
	protected $C_ID=array();
	
	
	function __construct()
	{
		
		parent::__construct();
		
	}
	
	function f_DeleteCourse()
	{
		parent::conn();
	
		foreach ($_POST['Course'] as $Courses)
		{		
		$sql= "DELETE FROM courses WHERE COURSE_ID=('$Courses')";
		
		if($result = mysqli_query($this->con,$sql)){
			header("Location:DeleteCourse.php");
		}
			else {echo "Error In Query";}
		
		
		}
	}
	
	
}
$DeleteObject = new DeleteCourse();
$DeleteObject-> f_DeleteCourse();


?>