<?php
require "../connection.php";

$sql = "SELECT profile.firstName, profile.lastName, login.username, login.level, login.status FROM login INNER JOIN profile ON login.loginId = profile.loginId ";
if($result = $conn->query($sql)){
    if($result->num_rows >= 1){
        while($row = $result->fetch_assoc()){  ?>
            <tr>
                <td><?= $row["firstName"]?></td>
                <td><?= $row["lastName"]?></td>
                <td><?= $row["username"]?></td>
                <td>
                    <?php 
                        if ($row["level"] == "0"){
                            echo "admin";
                        }
                        else if($row["level"] == "1"){
                            echo "superadmin";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($row["status"] == "active"){
                            echo "<button type='button' class='btn btn-success p-2 m-0 col-md-4' data-bs-toggle='modal' data-bs-target='#editStatus'><small>Active</small></button>";
                        }
                        else if($row["status"] == "inactive"){
                            echo "<button type='button' class='btn btn-danger p-2 m-0 col-md-4' data-bs-toggle='modal' data-bs-target='#editStatus'><small>Inactive</small></button>";
                        }
                    ?>
                </td>
                <td class="text-center">
                    <button type="button" class="btn tooltip-test" title="EDIT" data-bs-toggle="modal" data-bs-target="#editProfile">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
<?php
        }
    }
    else{
        echo "No result found.";
    }
}
?>