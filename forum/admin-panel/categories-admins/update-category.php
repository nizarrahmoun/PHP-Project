<?php require "../layouts/header.php";?> 
<?php require "../../config/config.php";?> 

<?php

if(!isset($_SESSION['adminname'])){
	header('Location: '.ADMINURL.'/admins/login-admmins.php');
  }


  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $category = $conn->query("SELECT * FROM categories WHERE id='$id'");

    $category->execute();
  
    $singleCategory = $category->fetch(PDO::FETCH_OBJ);
  }

  if(isset($_POST['submit']) ) {
    if(empty($_POST['name'])){
      $error = 'All fields are required';
    }else{
      $name = $_POST['name'];
    
    
      $insert = $conn->prepare("UPDATE categories SET name = :name WHERE id='$id'");
    
      $insert->execute([
        ':name' => $name,
    ]);
    
      header('Location: show-categories.php');
    }
    
    
      }

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?id=<?php echo $id;  ?>">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $singleCategory->name;  ?>" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php require "layouts/footer.php";?>      