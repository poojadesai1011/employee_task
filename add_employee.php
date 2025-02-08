<?php include 'conn.php';?>

<!DOCTYPE html>
<html>
<head>
	
    <!-- basic -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    
      <title>Employee Add </title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
    
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		.errormsg
		{
		  color: #FF0000;
		}
</style>
</head>
<body>
	
<form id="empForm" align="center" enctype="multipart/form-data">
	<table border="1" align="center" style="margin-top: 50px;">
	<tr>
		<tr>
			<td colspan="2" align="center" style="background-color: #a8674d;">
				<h3>Employee Add </h3>
			</td>
		</tr>
		<tr>
			<th>
				<label>First Name:</label>
			</th>
			<td  align="center">
				<input type="Text" class="form-control" name="fname" id="fname" style="margin-top: 20px;">
				
			</td>
		</tr>

		<tr>
			<th>
				<label>Last Name:</label>
			</th>
			<td  align="center">
            <input type="Text" name="lname" class="form-control" id="lname" style="margin-top: 20px;">
           
			</td>
		</tr>

        <tr>
			<th>
				<label>Joining Date:</label>
			</th>
			<td  align="center">
				<input type="date" name="doj" class="form-control" id="doj" style="margin-top: 20px;">
				
			</td>
		</tr>

		<tr>
			<th>
				<label>Profile Image:</label>
			</th>
			<td  align="center">
			<input type="file" class="form-control" name="profile" id="profile" style="margin-top: 20px;">
			<span id="message"></span>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center" style="background-color: #a8674d;">
            <button type="submit" class="btn btn-success">Submit</button>
           
			</td>
		</tr>
    </tr>
    </table>
</form>


<script>
        $(document).ready(function() {
            // Form submission using AJAX
            $("#empForm").on("submit", function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                
                $.ajax({
                    url: "emp_insert.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response);
						window.location.href = "emp_list.php"; 
                      
                    }
                });
            });
        });
    </script>
</body>
</html>
