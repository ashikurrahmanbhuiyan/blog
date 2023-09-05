<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <?php
                    include "config.php";
                    $limit = 3;
                    $page = $_GET['page'];
                    if(isset($page)){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    $sql = "select * from user order by user_id desc limit {$offset},{$limit}";
                    $result = mysqli_query($conn, $sql) or die("failed");
                    if (mysqli_num_rows($result) > 0) {

                    ?>
                        <thead>
                            <th>S.No.</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class='id'><?php echo $row['user_id'];  ?></td>
                                    <td><?php echo $row['first_name '] . " " . $row['last_name'];  ?></td>
                                    <td><?php echo $row['username']  ?></td>
                                    <td><?php if ($row['role'] == 1) {
                                            echo "admin";
                                        } else {
                                            echo "normal";
                                        }   ?></td>
                                    <td class='edit'><a href='update-user.php?id=<?php   echo$row["user_id"]; ?>' ><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?id=<?php   echo$row["user_id"]; ?>' ><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            <?php } ?>
            <ul class='pagination admin-pagination'>
            <?php
            $sql1 = "select * from user";
            $result1 = mysqli_query($conn,$sql1) or die("unsucces.");
            if(mysqli_num_rows($result1)>0){
                $t_records = mysqli_num_rows($result1);
                 $limit = 3;
                 $total_page = ceil($t_records/$limit)+1;
            if($page>1)
                echo '<li><a href = "users.php?page='.($page-1).'">previous</a></li>';
            for($i=1;$i<$total_page;$i++){
                if($i == $page)
                    $active = "active";
                else
                        $active = "";
            ?>
                <li class = "<?php echo $active ?>" ><a href = "users.php?page=<?php echo$i?>"><?php echo $i ?></a></li>
            <?php 
            }
            if($total_page>($page+1))
                echo '<li><a href = "users.php?page='.($page+1).'">Next</a></li>';
            } ?>
            </ul>
            </div>
        </div>
    </div>
</div>
<?php include "header.php"; ?>