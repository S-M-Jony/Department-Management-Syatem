<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
<?php
    if(isset($_GET['delete'])){
        $teacher_id_delete = $_GET['delete'];
        $query = "DELETE FROM teacher WHERE teacher_id = {$teacher_id_delete}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: all_teacher.php");
    }
?>

<section class="all_teacher">
    <div class="container">
        <h1 class="text-center">All Teacher</h1>
        <hr>
        <?php

            $query = "SELECT * FROM teacher";
            $select_user_query = mysqli_query($connection,$query); 

            while($row = mysqli_fetch_assoc($select_user_query)){

            $teacher_id = $row['teacher_id'];
            $teacher_name = $row['teacher_name'];
            $teacher_designation = $row['teacher_designation'];
            $teacher_email = $row['teacher_email'];
            $teacher_password = $row['teacher_password'];
            $teacher_image = $row['teacher_image'];
            $teacher_mobile = $row['teacher_mobile'];
            ?>
            <div class="col-md-4">
                <div class="teacher">
                    <img src="../teacher/images/<?php echo $teacher_image;?>" alt="teacher_image" class="img-responsive">
                    <h3 class="text-capitalize"><?php echo $teacher_name;?></h3>
                    <p class="text-capitalize">Designation: <?php echo $teacher_designation;?></p>
                    <p>Email: <?php echo $teacher_email;?></p>
                    <p>Contact: <?php echo $teacher_mobile;?></p>
                    <?php echo "<td><a href='all_teacher.php?delete={$teacher_id}' class='btn btn-danger'>Delete</a></td>"?>
                </div>
            </div>
            <?php }

            if(!$select_user_query){
            die("Query Failed" . mysqli_error($connection));
            }
        ?>
            
    </div>

</section>




<!-- footer part include here -->
<?php include"admin_footer.php"?>