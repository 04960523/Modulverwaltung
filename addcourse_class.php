<?php
session_start();
require_once("dbConnect.php");


class AddCourse extends DbConnection
{
	
	protected $CourseID;
	protected $CourseName;

	
	public function __construct()
	{
		if(isset ($_POST['Course_id']) && isset($_POST['Course_name']))
		{
		$this->CourseID = $_POST['Course_id'];
		$this->CourseName=$_POST['Course_name'];
		$this->script = "success";
		parent::__construct();
		}	
		
		else
		{
			parent::__construct();
			 
			
		}
	}
	

public function addData() 
	{
		
		parent::conn();
		if($this->CourseID && $this->CourseName != null){
		$sql = "INSERT into courses (COURSE_ID,COURSE_NAME)
			VALUES('$this->CourseID','$this->CourseName')";
			
		if(mysqli_query($this->con,$sql))
		
		{
			
		 
			header ("Location:addcourse.php");
		
			
			
		}
			else 
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
				}		
										}
	}
			
			
}

$addCourse = new AddCourse();
//$addCourse->callData();
$addCourse->addData();





?>