<?php include 'conn.php';?>
<!DOCTYPE html>
<html>
<head>

<title>Employee List</title>
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


</head>
<?php


$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$limit = 10; // Number of records per page
if (isset($_GET["page"])) {    
  $page  = $_GET["page"];    
}    
else {    
  $page=1;    
}   
$offset = ($page - 1) * $limit;

 $query = "SELECT * FROM employee WHERE 1";

if (!empty($start_date) && !empty($end_date)) {
    $query .= " AND joining_date BETWEEN '$start_date' AND '$end_date'";
}
$query .= " ORDER BY employee_code DESC LIMIT $limit OFFSET $offset";
//echo $query;
$result =mysqli_query($conn, $query); 
$row_cnt = mysqli_num_rows($result);


$count_query = "SELECT COUNT(*) as total FROM employee WHERE 1";
if (!empty($start_date) && !empty($end_date)) {
    $count_query .= " AND joining_date BETWEEN '$start_date' AND '$end_date'";
}

$total_result = $conn->query($count_query);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);


?>


<table border='1' align='center'>

<tr>

<tr>
  <td colspan='4'>
    <h3 style="text-align: center;">Employee List</h3> 
  </td>
</tr>
<tr>
  <form method="POST">
  <td>Start Date:<input type="date" name="start_date" id="start_date" value="<?php echo $start_date; ?>" class="form-control"></td>
  <td>Last Date:<input type="date" name="end_date" id="end_date" value="<?php echo $end_date; ?>" class="form-control"></td>
  <td>
  <button type="submit" class="btn btnsearch">Search</button>
  </td>
  </form>
  <td>
    <a href="add_employee.php"><input type='button' class="btn btnsearch" value='Add' style="height: 40px;width: 60px;margin-left:30%;"></a>
  </td>
</tr>

<th>Employee Code</th>
<th>Full Name</th>
<th>Joining Date</th>
<th>Profile Image</th>

</tr>

 <?php
if($row_cnt > 0) 
{
  while($row = $result->fetch_assoc())
  { ?>
    <tr> 
    <td> <?php echo "EMP_".$row['employee_code']; ?></td>
    <td> <?php echo $row['fname'].' '.$row['lname']; ?></td>
    <td> <?php echo $row['joining_date']; ?> </td>
    <td> <img src="<?php echo $row['profile_image']?> " width="10%"> </td>
    </tr>
  <?php  } ?>
  <?php  } else{ ?>
<tr>
  <td colspan="4">
    No Record Data Found
  </td>
</tr>
<?php } ?>

 
<!-- Pagination Links -->
  <tr>
    <td>Total</td>
    <td colspan="3">
      <nav aria-label="Page navigation example" style="margin-left: 83%;;">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="javascript:void(0);" class="pagination-link" data-page="<?php echo $i; ?>">
                  <li class="page-item"><a class="page-link" href="emp_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                </a>
            <?php } ?>
          </ul>
      </nav>
    </td>
  </tr>
</table>

</body>
</html>