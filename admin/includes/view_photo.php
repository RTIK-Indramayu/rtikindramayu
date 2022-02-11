<div class="text-center">
    <h2>ALL POSTED PHOTO</h2>
    <hr>

    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
              <th scope="col">S.No.</th>
              <th scope="col">IMAGE</th>
              <th scope="col">CAPTION</th>
              <th scope="col">ACTION</th>
            
            </tr>
        </thead>
        <tbody>



        <?php
            $serial=0;
            $query = "SELECT * FROM photo";
            $select_all_posts_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
               $id_photo = $row['id_photo'];
               $photo = $row['photo'];
               $title_photo = $row['title_photo'];
               

              echo "<tr>";
              $serial=$serial+1;
              echo "<th scope='row'>$serial</th>";

              $image = imagePlaceholder($photo);
              echo "<td><img width='100' class='img-fluid' src='../photo/$image' alt='imgs'></td>";

              echo "<td>$title_photo</td>";

              echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$id_photo}'>Delete</a></td>";
 
                            
             echo "</tr>";
            }
        ?>

        </tbody>
    </table>
</div>


