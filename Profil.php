<?php 
		session_start();		
	?>
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
	<title> Profil Bearbeiten | Modulverwaltung </title>

	</head>

<body>

			<!--Header-->

<div class="container">

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
						<h3>Ihre Information:  </h3>
						</div>

								<div class="jumbotron" >

								<table class="table table-hover" style="font-size:18px;">
									<thead>
										<tr>
											<th><b>Vorname</b></th>
											<th><b>Nachname</b></th>
											<th><b>Studiengang</b></th>
											<th><b>Semesteranzahl</b></th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<!--Php code for Database Retrieval -->
										
									<?php
									
									
									 include 'dbConnect.php';
									class refactored extends DbConnection {
										
								
									function callData()
									{
									parent::conn();
								/*	
										$sql = "SELECT * FROM sc_relation";									
										$result = mysqli_query($this->con,$sql);
									while($row = mysqli_fetch_array($result))
									{
				if ($row['ID']==$_SESSION['CurrentID']	)
				{
				echo "<td> " 
					 .$row['COURSE_ID'].
					 "<br>";					
		    	echo "<td>"
					.$row['ID'].
					"<br>";
				}			*/
										
							//		$sql = "select students.FIRSTNAME, students.LASTNAME, students.SEMESTERANZAHL,students.STUDIENGANG
                            //                from students ;";		
											$sql = "select *
                                            from students ;";	
								 $result = mysqli_query($this->con,$sql);
									while($row = mysqli_fetch_array($result))
									{
				if ($row['ID']==$_SESSION['CurrentID']	)
				{
				echo "<td> " 
					 .$row['FIRSTNAME'].
					 "<br>";					
		    	echo "<td>"
					.$row['LASTNAME'].
					"<br>";
						echo "<td> " 
					 .$row['STUDIENGANG'].
					 "<br>";					
		    	echo "<td>"
					.$row['SEMESTERANZAHL'].
					"<br>";
				}			
										
										
									echo "<tr>";
									
									};
									
									}
									
									}
									
									$object1 = new refactored();
									$object1->callData();
								
							
									?>
										
										</tr>
								
								</table>
							
							
								</div>




						
						

		</div>

		</body>

		</html>
