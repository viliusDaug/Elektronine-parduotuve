<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php
        $get_users="Select * from `user_table`";
        $result=mysqli_query($con, $get_users);
        $row_count=mysqli_num_rows($result);
        

            if($row_count==0){
                echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
            }else{
                echo " <tr>
                        <th class='bg-info'>Sl no</th>
                        <th class='bg-info'>Username</th>
                        <th class='bg-info'>User email</th>
                        <th class='bg-info'>User image</th>
                        <th class='bg-info'>User address</th>
                        <th class='bg-info'>User mobile</th>
                        <th class='bg-info'>Delete</th>
                       </tr>
                    </thead>
                    <tbody>";

                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $user_id=$row_data['user_id'];
                    $username=$row_data['username'];
                    $user_email=$row_data['user_email'];
                    $user_image=$row_data['user_image'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];
                    $number++;
                    echo "<tr>
                            <td class='bg-secondary text-light'>$number</td>
                            <td class='bg-secondary text-light'>$username</td>
                            <td class='bg-secondary text-light'>$user_email</td>
                            <td class='bg-secondary text-light'><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'/></td>
                            <td class='bg-secondary text-light'>$user_address</td>
                            <td class='bg-secondary text-light'>$user_mobile</td>
                            <td class='bg-secondary text-light'><a href='' class='text-light'> <i class='fa-solid fa-trash'></i></a></td>
                         </tr>";
                }
            }
    ?>
       
        
    </tbody>
</table>