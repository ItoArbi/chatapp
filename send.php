<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="talk-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <a href="php/images/<?php echo $row['img']; ?>" width="100%" target="_blank"><img src="php/images/<?php echo $row['img']; ?>" alt=""></a>
        <div class="details">
          <a style="color:black;" href="user_info.php?id=<?php echo $row['unique_id']; ?>"><?php echo $row['fname']. " " . $row['lname'] ?></a>
          <p style="font-size: small;"><?php echo $row['status']; ?></p>
        </div>
        <div style="padding-left: 120px;" class="details">
          <a href="php/clear_talk.php?id=<?php echo $row['unique_id'] ?>" onclick="return  confirm('Do you want to delete Y/N')" class="logout">Clear Chat</a>
        </div>
        </header>
      <div class="talk-box">

      </div>
      <form action="#" class="typing-area">
        <label for="file-upload" class="attachment"><i class="fab fa-telegram-plane"></i></label>
        
      </form>
    </section>
  </div>

  <script src="javascript/talk.js"></script>

</body>
</html>
