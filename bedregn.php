
   <!DOCTYPE html>
	  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Management System</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/bedrestyle.css">
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<script>
	$(document).ready(function(){
		$("#type").on('change',function(){
			$(".data").hide();
			$('#' + $(this).val()).fadeIn(700);
		}).change();
		
	$('#ch').click(function(e){
				e.preventDefault();
				$.ajax({
					method:"post",
					url:"fetchdata.php",
					data:$('#disp').serialize(),
					dataType:"html",
					success:function(response){
						$('#h').html(response);
					}
				});
		});

	});
	</script>


</head>
<body>


	 <?php  	
									$host="localhost:3306";
									$user="root";
									$pass="Linga@349349";
									$db="sample";
	
									$conn=mysqli_connect($host,$user,$pass,$db);
									

				?>		
				
<div class="wrapper">
<h1>BED REGISTRATION FORM</h1>
	<div class="menu"> 
	

		<p><label>Hospital Type:</label>
                            <select name="type" id="type">
							<option>-------------------SELECT-------------------</option>
                           <option>Government</option>
						   <option>Private</option>
                            </select>
                            </p>
							</div>
							</div>
							
	<div class="content">
		<div class="data" id="Government">
			<form method="GET">
			<br>
			<br>
				<p><label>Hospital Name:</label>
                            <select name="bed">
							<option>-------------------------------------------SELECT-------------------------------------------</option>
                            <?php
							$s="SELECT hname FROM hospitals WHERE htype='GOV'";
									
								
									$res=mysqli_query($conn,$s);
									while($rows=mysqli_fetch_assoc($res))
									{
										$hname=$rows['hname'];
										
										echo"<option value='$hname'>$hname</option>";
									}
								?>
                            </select>
                            </p>
							
							<br>
							<br>
							<div id="disp">  </div>
							
							<p><label>Bed Type:</label>
                            <select name="bedtype">
							<option>--------SELECT---------</option>
                            <option>Regular Bed</option>
							 <option>Bed with Oxygen</option>
							  <option>Bed with Ventilator</option>
							   <option>ICU Bed</option>
                            </select>
                            </p>
							<br>
							<br>
							<label> Patient Name:</label>							
			<input type="text" name="pnames" class="ip1">
			<br>
			</br>
			<br>
					<label> Mobile:</label>					
			<input type="text" name="pmobs" class="ip2">
			</br>
			<br>
			<br>
					<label>Address:</label>							
			<input type="text" name="padds" class="ip3">
							<br>
							<br>
							<input type="submit" value="Submit" name="sub1">				
							
	</form>
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

$r1=rand(1,10000);
$rand="G-$r1";
    $conn=mysqli_connect($host,$user,$pass,$db);

if(isset($_GET['sub1'])){
	$pname=$_GET['pnames'];
	$pmob=$_GET['pmobs'];
	$padd=$_GET['padds'];
	$hn=$_GET['bed'];

	$sql="INSERT INTO bedregn (`pname`,`pmob`,`padd`,`hname`,`bedid`) VALUES ('$pname','$pmob','$padd','$hn','$rand')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Your BED-ID is $rand   Please keep this number for future reference')</script>";								
	
	}
}

	
	?>
</div>



				<div class="data" id="Private">
				<form method="GET">
				<br>
				<br>
				<p><label>Hospital Name:</label>
                            <select name="beds">
							<option>-------------------------------------------SELECT-------------------------------------------</option>
                            <?php
							$s2="SELECT hname FROM hospitals WHERE htype='PRI'";
									
								
									$res2=mysqli_query($conn,$s2);
									while($rows=mysqli_fetch_assoc($res2))
									{
										$hname=$rows['hname'];
										echo"<option value='$hname'>$hname</option>";
									}
								?>
                            </select>
							
                            </p>

							<br>
							<br>
							
							<div id="disp">  </div>
							
							<p><label>Bed Type:</label>
                            <select name="bedtype">
							<option>-----------SELECT------------</option>
                            <option>Regular Bed</option>
							 <option>Bed with Oxygen</option>
							  <option>Bed with Ventilator</option>
							   <option>ICU Bed</option>
                            </select>
                            </p>
							<br>
							<br>
		<label> Patient Name:</label>							
			<input type="text" name="pname" class="ip1">
			<br>
			</br>
			<br>
					<label> Mobile:</label>					
			<input type="text" name="pmob" class="ip2">
			<br>
			</br>
			
			<br>
					<label>Address:</label>							
			<input type="text" name="padd" class="ip3">

		</br>
		<br>
							<br>
							<input type="submit" value="Submit" name="sub2">	
									

								
		</form>		
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);

if(isset($_GET['sub2'])){
	$pname=$_GET['pname'];
	$pmob=$_GET['pmob'];
	$padd=$_GET['padd'];	
	$hn=$_GET['beds'];
$r1=rand(1,10000);
$rands="P-$r1";

	$sql="INSERT INTO bedregn (`pname`,`pmob`,`padd`,`hname`) VALUES ('$pname','$pmob','$padd','$hn')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid credentials!')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Your BED-ID is $rands. Please keep this number for future reference')</script>";								
	
	}
}

	
	?>		
	</div>
	</div>
	




	
	</body>
	</html>