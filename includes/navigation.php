<style>
html {
    scroll-behavior: smooth;
}

body {
    position: relative;
    overflow-y: auto;
    padding-top: 65px; /* padding for fixed navbar */


    /*content-inner margin-top: -30px !important;*/
}

/* optional style active link */
.navbar-light .navbar-nav .nav-link.active {
    background-color: magenta;
}




/* hidden spacer before sections for proper offset */
main h3:before {
    height: 65px;
    content: "";
    display:block;
}


/*Untuk Hide Navbar*/
#navbar {
  
  transition: top 1.1s; /* Transition effect when sliding down (and up) */
}


</style>


<div style="padding-bottom:60px;">


<nav id="navbar" class="navbar navbar-inverse navbar-expand-lg navbar-light bg-light fixed-top shadow p-3 mb-5 rounded">
  
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="asset/rtik_logo_add.png" height="46">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
          <?php 
          // $query = "SELECT * FROM categories";
          // $select_all_categories_query = mysqli_query($connection,$query);

          // while($row = mysqli_fetch_assoc($select_all_categories_query)){
          //     $cat_title = $row['cat_title'];
          //     echo "<li class='nav-item'>
          //     <a class='nav-link' href='#'>{$cat_title}</a></li>";
          // }        
          ?> 
           
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link " href="#about">About us
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="#member">Member
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="#news">News
                </a>
              </li>






              <?php
              if(isset($_SESSION['user_role'])){
                echo '<li class="nav-item "><a class="nav-link" href="includes/userverify.php"> Dashbord</a></li>';
              }
              ?>

              <?php
              if(!isset($_SESSION['user_role'])){
                echo '<li class="nav-item "><a class="nav-link" href="#login">Login</a></li>';
              }
              ?> 

             <!--  <li class="nav-item ">
                <a class="nav-link" href="registration.php">Registration
                </a>
              </li>  -->
              
              <li class="nav-item ">
                <a class="nav-link" href="contact.php">Contact us
                </a>
              </li> 
                        

          </ul>
        </div>
      </div>
  </nav> 
</div>


