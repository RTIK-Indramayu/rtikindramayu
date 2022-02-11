<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

  <!-- Page Content -->


<?php

  $query = "SELECT * FROM photo";
  $result = mysqli_query($connection,$query);
  $rowcount = mysqli_num_rows($result); 

?>


  <div class="container">

    <div class="row">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
          <div class="carousel-inner">

            <?php
                 for($i=1;$i<=$rowcount;$i++)
                 {
                     $row = mysqli_fetch_array($result);
                 
                    if($i==1){
                
                
            ?>

            <div class="carousel-item active">
              <img class="d-block w-100" src="photo/<?php echo $row['photo'];?>">
              <div class="carousel-caption">
                <h5><?php echo $row['title_photo']; ?></h5>
              </div>
            </div>

            <?php }else{
            ?>

            <div class="carousel-item">
              <img class="d-block w-100" src="photo/<?php echo $row['photo'];?>">
              <div class="carousel-caption">
                <h5><?php echo $row['title_photo']; ?></h5>
              </div>
            </div>

            <?php } ?>
            <?php }  ?>


          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>


    

      <div class="container">
        <div class="row">
          <div class="justify center col-sm-6 m-5 " style="color: #626262;">
            <h2>ABOUT US</h2><br>
            <span align="justify ">

              <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </span>
            
          </div>

            
          <div class="row container-fluid col-sm-4 align-self-center justify-content-center" >
            <span  style="margin-left:50px;"><img src="asset/logortik.png" ></span>
          </div>

        </div>
      </div>


      <div class="container" style="color: #626262;">
           <h2>SUSUNAN ORGANISASI</h2><br>
        <br>
        <img src="asset/bagan.png" class="mx-auto d-block" style="width:100%"> 
      </div>

      <!-- Blog Entries Column -->
      <div class="col-md-8">
      
      <?php
        $per_page =4;

        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = "";
        }

        if($page == 1 || $page == ""){
          $page_1 = 0;
        }else{
          $page_1 = ($page * $per_page) -$per_page;
        }

        $post_query_count = "SELECT * FROM posts";
        $find_count = mysqli_query($connection,$post_query_count);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count/$per_page);
         
        $query = "SELECT * FROM posts ORDER BY `post_id` DESC LIMIT $page_1 ,$per_page ";
        $select_all_posts_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
      ?>

        
        <h2> 
          <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
            <?php
            $query = "SELECT * FROM users WHERE username = '$post_user' ";
            $select_user_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_user_query)){
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
            }
            $name = $user_firstname.' '.$user_lastname;
            ?>
            by <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $name; ?></a>
        </p>
        <p> <i class="far fa-clock"></i> <?php echo $post_date; ?></p>
        <hr>
        <a href="post.php?p_id='<?php echo $post_id; ?>'">
        <img class="img-fluid" src="images/<?php echo imagePlaceholder($post_image);?>" alt="img">
        </a>
        <hr>  
        <p><?php echo $post_content; ?></p>
          <a href="post.php?p_id='<?php echo $post_id; ?>'" class="btn btn-primary">Read More &rarr;</a>
        <hr>  
              
        <?php } ?>
 

      </div>

<!-- Sidebar Widgets Column -->
<?php  include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php
      if(isset($_GET['page'])){
        $pagination = $_GET['page'];
        
        if($pagination!=1){
          $pre = $pagination-1;
          echo "<li class='page-item'><a class='page-link' href='index.php?page={$pre}'>Previous</a></li>";
        }
      }

      for($i=1;$i<=$count;$i++){
        if($i == $page){
          echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
        }else{
          echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
        }
      }

      if(empty($_GET['page'])){
        echo "<li class='page-item'><a class='page-link' href='index.php?page=2'>Next</a></li>";
      }

      if(isset($_GET['page'])){
        $pagination = $_GET['page'];

        if($pagination!=$count){
          $next = $pagination+1;
          echo "<li class='page-item'><a class='page-link' href='index.php?page={$next}'>Next</a></li>";
        }
      }

    ?>
  </ul>
</nav>

<?php  include "includes/footer.php"; ?>