<?php
include 'db_connect.php';

// Check if the form has been submitted
if(isset($_POST['id'])){
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $manager_id = $_POST['manager_id'];
    $user_ids = implode(',', $_POST['user_ids']); // Convert array to comma-separated string
    $description = $_POST['description'];

    // Update the project in the database
    $conn->query("UPDATE project_list SET name = '$name', status = '$status', start_date = '$start_date', end_date = '$end_date', manager_id = '$manager_id', user_ids = '$user_ids', description = '$description' WHERE id = $id");

    // Redirect to the project list page
    header("location: index.php?page=project_list");
    exit;
}

// Fetch project details from the database
$qry = $conn->query("SELECT * FROM project_list WHERE id = ".$_GET['id'])->fetch_array();

// Assign fetched data to variables
foreach($qry as $k => $v){
    $$k = $v;
}

// Include the new_project.php file
include 'new_project.php';
?>
