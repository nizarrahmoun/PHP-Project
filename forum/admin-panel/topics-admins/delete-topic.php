<?php require "layouts/header.php";?> 
<?php require "../config/config.php";?> 


<?php 
if(!isset($_SESSION['adminname'])){
	header('Location: '.ADMINURL.'/admins/login-admins.php');
  }


    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $delete = $conn->query("DELETE FROM topics WHERE id='$id'");
        $delete->execute();

        header('Location: '.ADMINURL.'/topics-admins/show-topics.php');
    }

?>