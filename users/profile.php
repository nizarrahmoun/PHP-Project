<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 
if(!isset($_SESSION['username'])){
	header('Location: '.APPURL.'');
  }

  
  if(isset($_GET['name'])){
    $name = $_GET['name'];

    $select = $conn->query("SELECT * FROM users WHERE username = '$name'");
    $select->execute();

    $user = $select->fetch(PDO::FETCH_OBJ);

    $nb_topics = $conn->query("SELECT COUNT(*) AS nb_topics FROM users WHERE username = '$name'");
    $nb_topics->execute();

    $all_nb_topics = $nb_topics->fetch(PDO::FETCH_OBJ);

    $nb_replies = $conn->query("SELECT COUNT(*) AS nb_replies FROM replies WHERE user_name = '$name'");
    $nb_replies->execute();

    $all_nb_replies = $nb_replies->fetch(PDO::FETCH_OBJ);

    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="main-col">
                <div class="block">
                    <h1 class="pull-left"><?php echo $user->name; ?></h1>
                    <h4 class="pull-right">A Simple Forum</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <ul id="topics">
                        <li id="main-topic" class="topic topic">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="user-info">
                                        <img class="avatar pull-left" src="../img/<?php echo $user->avatar; ?>">
                                        <ul>
                                            <li><strong><?php echo $user->username; ?></strong></li>
                                            <li><a href=" profile.php?name=<?php echo $user->username; ?>">Profile</a>
                                        </ul>
                                    </div>
                                </div>
                                    <div class="col-md-10">
                                        <div class="topic-content pull-right">
                                            <p><?php echo $user->about; ?></p>
                                        </div>
                                    </div>
                                    <a class="btn btn-success" href="" role="button">number of posts: <?php echo  $all_nb_topics->nb_topics;?></a>
                                    <a class="btn btn-primary" href="" role="button">number of replies: <?php echo  $all_nb_replies->nb_replies;?></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php require "../includes/footer.php"; ?>