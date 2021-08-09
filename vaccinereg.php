<html>
<section class="cases" id="cases">
    <title>Vaccines</title>
	
    <style media="screen">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap');
	*{
    font-family: 'Poppins',sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    text-decoration: none;
    outline: none;
    border:none;
    text-transform: capitalize;
    transition: all .3s cubic-bezier(.38,1.15,.7,1.12);
}

  table{
			border-collapse:collapse;
			width:1000px;
			margin-left:260px;
			margin-top:10px;
			overflow:hidden;
			border-radius:5px 5px;
			box-shadow:0 0 20px rgba(0,0,0,0.15);
        }
        th{
			font-size:20px;
			font-weight:bold;
			color:white;
			padding:4px;
			background-color:mediumaquamarine;
        }
		td{
			 text-align:center;
			 font-size:18px;
			 border-bottom:2px solid #dddddd;
			
		}
	
		tr:nth-of-type(even){
			background-color:lightcyan;
		}
		tr:last-of-type{
			border-bottom:2px solid #009879;
		}
		h1{
			font-size:30px;
			text-align:center;
			padding-top:1rem;
		}
		
		body{
			background:url(../images/background-img.jpg) no-repeat;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
		}
		th,
		td{
			padding:18px 24px;
		}
		.adm{
			margin:18px 0 0 5px;
			text-decoration:underline;
			
		}
		
		.bed input[type="submit"]{
			margin-left:1200px;
			margin-top:5px;
			height:45px;
			width:15%;
			outline:none;
			
			background:skyblue;
			font-size:23px;
			font-family:arial sans-serif;
			font-weight:bold;
			color:indigo;
			cursor:pointer;
		}
		input[type="submit"]:hover{
	
	border:8px solid skyblue;
}
.sea{
	margin-left:66%;
	padding:3px;
	font-size:15px;
}
.sea input[type="text"]{
	height:24px;
	width:20%;
	position:absolute;
	

}
.sea2{
	margin-left:66%;
	padding:3px;
	font-size:15px;
}
.sea2 input[type="text"]{
	height:24px;
	width:20%;
	position:absolute;
}
    </style>    
<body>


<div class="bed">
<input type="submit" name="btn" value="BOOK VACCINE" onclick="location.href='vaccine.php'">
</div>


<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);
	
?>  
<h1>VAACINE INFORMATION</h1>
	

	<div class="sea">
	Search:	
	<input type="text" name="search" id="search" >
</div>
	

    <table id="myTable">
        <th>Centre</th>
		<th>Vaccine Name</th>
		<th>Available Vaccines</th>
		<th>Dose</th>
		<th>Age</th>
		
		<?php
		$sql="SELECT * FROM vaccine";
		$query=mysqli_query($conn,$sql);
		
		
		while($res=mysqli_fetch_array($query)){
		?>
			<tr>
			 <td><?php echo $res['cname']; ?></td>
			 <td><?php echo $res['vname']; ?></td>
			 <td><?php echo $res['vavail']; ?></td>
			 <td><?php echo $res['dose']; ?></td>
			 <td><?php echo $res['age']; ?></td>
			 </tr>
			<?php
		}
	  ?>
    </table>




</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
$(document).ready(function(){
	$('.sea2 #search').on('keyup',function(){
		var value=$(this).val().toLowerCase();
	$('#myTable2 tr').filter(function(){
			$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
		
	});
	});
});

</script>

<script>
$(document).ready(function(){
	$('.sea #search').on('keyup',function(){
		var value=$(this).val().toLowerCase();
	$('#myTable tr').filter(function(){
			$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
		
	});
	});
});

</script>


</section>

</html>adfgjmjytrjkuy