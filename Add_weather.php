<?php
$host="localhost";
$uname="root";
$upass="";
$db="weather_journal";
$con=mysqli_connect($host,$uname,$upass,$db);

$date = "";
    $time = "";
    $condition = "";
    $temp ="";
    $location = "";
    $notes = "Enter Addtional Notes";

//Creating
if (isset($_POST["btnSub"])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
	$condition = $_POST['condition'];
    $temp = $_POST['temperature'];
    $location = $_POST['location'];
    $notes = $_POST['notes'];
    $res = mysqli_query($con, "insert into journal (date,time,weather_condition,temperature,location,notes) values('$date','$time','$condition','$temp','$location','$notes')");
    if ($res) {
//	echo("<script> alert('inserted')</script>");
		echo("Inserted");
        header("location:weathers_list.php");
    } else {
        echo("not inserted");
    }
}
//Updation
if (!empty($_GET["UID"])) {
	$_display="visible";
	$_display2="hidden";
    $Uid = $_GET["UID"];
    $res = mysqli_query($con, "select * from journal where id='$Uid'");
    $r = mysqli_fetch_row($res);
    $date = $r[1];
    $time = $r[2];
    $condition = $r[3];
    $temp = $r[4];
    $location = $r[5];
    $notes = $r[6];

  
}
else{
	$_display="hidden";
	$_display2="visible";
}
//
if (isset($_POST['btnUpdate'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
	$condition = $_POST['condition'];
    $temp = $_POST['temperature'];
    $location = $_POST['location'];
    $notes = $_POST['notes'];
    $up = mysqli_query($con, "Update journal set date='$date',time='$time',weather_condition='$condition',temperature='$temp',location='$location',notes='$notes' where id='$Uid'");
    if ($up) {
        header("location:weathers_list.php");
    } else {
        echo(mysqli_error($con));
    }
}


?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Weather Journal</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
		 <hr class="sidebar-divider my-0">
			<li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">
               Weather Journal
            </div>
			 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-people-carry"></i>
                    <span>Journal</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      
                        <a class="collapse-item" href="Add_weather.php">Add weather</a>
                        <a class="collapse-item" href="weathers_list.php">Weathers list</a>
                    </div>
                </div>
            </li>

			

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content bg-dark" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
				<h2 style="margin-left: 400px; color: black;font-weight: bold">Weather Journal</h2>

                 

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid  " >

              
        

                    <!-- Content Row -->
                    <div class="row ">
                    <div class="col-lg-2 "></div>
                    <div class="col-lg-7 bg-gradient-light" style="border: 5px double black;" >
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="border-bottom: 5px double black">Add Weather</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<label style="color: black;font-weight: bold"> Date</label>
                                        <input type="date" class="form-control form-control-user" 
                                           name="date" value="<?php echo($date)?>">
                                    </div>
                                    <div class="col-sm-6">
										<label style="color: black;font-weight: bold"> Time</label>
                                       
                                        <input type="time" class="form-control form-control-user" 
                                            name="time" value="<?php echo($time)?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<label style="color: black;font-weight: bold"> Weather condition</label>
                                       
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Enter weather codition" name="condition" value="<?php echo($condition)?>">
                                    </div>
                                    <div class="col-sm-6">
										<label style="color: black;font-weight: bold"> Temperature </label>
                                       
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Enter Temperature in Celcius" name="temperature" value="<?php echo($temp)?>">
                                    </div>
                                </div>  
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<label style="color: black;font-weight: bold"> Location </label>
                                        <input type="text" class="form-control form-control-user"
                                             placeholder="Enter city" name="location" value="<?php echo($location)?>">
                                    </div>
                                   
                                </div>
								<div class="form-group">
									      <label style="color: black;font-weight: bold"> Notes </label>
                                       
                               <textarea class="form-control form-control-user" placeholder="Additional Notes" name="notes"> <?php echo($notes)?></textarea>
                                </div>
								<button type="submit" name="btnSub" class="btn btn-primary btn-user btn-block" style="visibility: <?php echo($_display2)?>" >Save</button>
								<button type="submit" name="btnUpdate" class="btn btn-success btn-user btn-block" style="visibility: <?php echo($_display)?>">Update</button>
                                
                                
                            </form>
                           
                        </div>
                    </div>
                </div>

                    <!-- Content Row -->
			

                </div>
                <!-- /.container-fluid -->
				
                                
                                   
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>