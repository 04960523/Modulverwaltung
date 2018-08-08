<?php
session_start(); ?>
<html>
	<head>

			<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

			<!-- Bootstrap theme -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

			<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<script> document.getElementById("Add Course").onclick = function () { alert('hello!'); }; </script>	
	<title> Module Anmelden | Modulverwaltung </title>

	</head>

<body>

			<!--Header-->

<div class="container">
<?php 

	
	?>
						<div class="page-header" style="  margin-top:-02px; margin-bottom:-10px; ">
						<div class="img-responsive "  ><img class="icon-bar" src="images/usa.jpg"</div>
						<h2>Modulverwaltung </h2><br>
						<h3 style="color:Indigo ;">TU Bergakademie Freiberg </h3>

						</div>



<!--Header-end-->


<!--Nav Bar-->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://www.tu-freiberg.de">TUBAF</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="login.html">Student</a></li>
        <li><a href="A_login.html">Staff</a></li>

      </ul>
    </div>
  </div>
</nav>

<!--Nav Bar End-->



		<div class="well">
			<?php 
	
 
	echo " Sie sind jetzt angemeldet als ";
	echo  "Student ID " .$_SESSION['CurrentID']. "<br>"	;
	
	?>
		</div>




						<div class="well">
						<h3>Bitte ankreuzen und Button klicken </h3>
						</div>

								<div class="jumbotron" >

								<table class="table table-hover" style="font-size:18px;">
									<thead>
										<tr>
											<th><b>Modul ID</b></th>
											<th><b>Modul Name</b></th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<!--Php code for Database Retrieval -->
										<form action="EnrollCourse.php"  method="post">
											
								<input type="submit" value="Anmelden" name="buton" style="width:30%;" onclick="return confirm('Wollen Sie sich daran anmelden ?');">
							</div>
									<?php
									include_once("dbConnect.php");
									
									class refactored extends DbConnection {
										
								
									function callData()
									{
									parent::conn();
									
										$sql = "SELECT * FROM courses";
										$result = mysqli_query($this->con,$sql);
										
									while($row = mysqli_fetch_array($result))
									{
									echo "<td>    <input type='checkbox' name='Course[]'  value='". $row['COURSE_ID']."'> "  .$row['COURSE_ID']."<br>";
									echo "<td>".$row['COURSE_NAME']."<br>"; echo "<tr>";
									
									};
									
									}
									function addData(){
									//	 print_r($_POST);
                                     // 	 print_r($_REQUEST);
							     	$wert= $_SESSION['CurrentID'];
											
						    		   if(isset($_POST["buton"]))
                                      {
	 //   $value1=$_POST["buton"];
	//	  echo "value of button submit is  $value1";	
										   if(isset($_POST['Course']))  // 10087 should be a variable
										 {	//	   $SQL2 = "INSERT INTO sc_relation  VALUES (2017,10090)";
											 $checkbox1=$_POST['Course'];  
											 $chk="";  
                                             foreach($checkbox1 as $chk1)  
                                               {  
												    $chk = $chk1;  
											        $SQL2= "INSERT IGNORE INTO sc_relation VALUES ($wert, $chk)";  
                                                    $result2 = mysqli_query($this->con,$SQL2);
                                               }  
											// echo "$chk" ;
										//	 echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#ff0000'> Movie List for $key 2013</div>";
										      echo " <div style ='font:15px/25px Arial,tahoma,sans-serif;color:#ff0000'> Sie sind jetzt angemeldet in den angekreuzten Modulen,                                                  bitte zurueck zum Menueauswahl  </div>";// Neue Module werden hinzugefueget.
                                    //         $SQL2= "INSERT INTO sc_relation VALUES ($wert, $checkbox1)";  
                                     //        $result2 = mysqli_query($this->con,$SQL2);
										 }
		                                  if(!$result2)				 
										  {	  
											  throw new exception ('insert failed');
										  
										  }
                                          
                                       }
								}
									
									}
									
									$object1 = new refactored();
									$object1->callData();
                                    $object1->addData();
					     		//	session_destroy();
									?>
										
										</tr>
								
								</table>
									<a href="Student_Module.html" class="btn btn-info" role="button">Zurück zum Hauptmenü</a>
								
											</form>
								</div>

		


						
						

		</div>

		</body>

		</html>
