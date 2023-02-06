<?php
  session_start();
?>

<style>
  #banner {
    background-color: lightblue;
    padding: 10px;
    text-align: center;
    font-weight: bold;
    color: white;
  }
  .logout-btn {

    background-color: red;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    text-decoration: none;
    cursor: pointer;
    font-size: smaller;
    
  }
  .homepage-btn {
    background-color: green;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    text-decoration: none;
    cursor: pointer;
    font-size: smaller;
  }
</style>

<div id="banner">
<a href="index.php" class="homepage-btn">Homepage</a> || 


  <?php if (isset($_SESSION['logged_in'])): ?>
    Welcome, 
    <?php echo $_SESSION['username'] . " || "; ?></span>
    <a href="/logout.php" class="logout-btn">Logout</a>
  <?php else: ?>
    Not logged in
  <?php endif; ?>
  
  
</div>
