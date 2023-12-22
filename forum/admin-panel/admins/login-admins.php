<?Php require "../layouts/header.php";?>
<?Php require "../../config/config.php";?>
<?php

if(isset($_SESSION['adminname'])){
  header('Location: '.ADMINURL.'');
}

if(isset($_POST['submit'])){

  if(empty($_POST['email']) OR empty($_POST['password'])){
    $error = 'All fields are required';
  }else{
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $login = $conn->query("SELECT * FROM admins WHERE email = '$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() > 0){
      if(password_verify($_POST['password'], $fetch['password'])){
        $_SESSION['adminname'] = $fetch['adminname'];
        $_SESSION['email'] = $fetch['email'];


        header('Location: '.ADMINURL.'');

      }else{
        echo "<script>alert('email or password is wrong');</script>";
      }

    }}}
    




?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="#">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
     <?Php require "../layouts/footer.php";?>