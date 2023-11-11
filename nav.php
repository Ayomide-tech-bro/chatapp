<?php  require_once('header.php');?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark d-flex justify-content-between align-center px-2 rounded-3 border border-primary  mt-2" aria-label="Third navbar example">
    <div class="container-fluid w-100">
      <a class="navbar-brand" href="dashboard.php">ChatApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    
      </div> 
       <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">


<!-- <?php
$usr_typ = $_SESSION['usr_type'];
if ($usr_typ==='admin') {
  echo '
  <li class="nav-item">
      <a class="nav-link" href="admin_board.php">Admin </a>
    </li>';
}
?> -->




        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">My Account</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php"><?php echo $_SESSION['first_name'] ?></a></li> <hr>
              <li><a class="dropdown-item" href="#"> 
                <form action="" method="POST">
                  <button class="btn btn-danger w-100" name="btn_signout">Logout</button>      
                </form>
              </a></li>
            </ul>
          </li>

        </ul>
       
    </div>
  </nav>
  

  






































































































































  