<?php include 'conn.php';?>

<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $doj = $_POST['doj'];
    if ($_FILES['profile']['size'] > 2 * 1024 * 1024) {
        echo "Error: Profile image must be less than 2MB.";
        exit;
    }
    
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $profile_image = basename($_FILES["profile"]["name"]);
    $target_file = $target_dir . time() . "_" . $profile_image;
    move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
    
     $sql = "INSERT INTO employee (fname, lname, joining_date, profile_image) VALUES ('$fname', '$lname', '$doj', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        header("Location: emp_list.php");
    }     
        
}
?>
